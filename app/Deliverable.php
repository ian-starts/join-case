<?php

namespace App;

use App\Events\DeliverableCreated;
use App\Events\DeliverableDeadlineUpdated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Webpatser\Uuid\Uuid;

class Deliverable extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
        'concept_deadline',
        'publication_deadline',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'concept_deadline'     => 'datetime',
        'publication_deadline' => 'datetime',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function influencers(): BelongsToMany
    {
        return $this->belongsToMany(Influencer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();
        self::creating(
            function (Deliverable $model) {
                $model->uuid = (string)Uuid::generate(4);
            }
        );
        self::created(
            function (Deliverable $model) {
                event(new DeliverableCreated($model));
            }
        );
        self::updated(
            function (Deliverable $model) {
                if ($model->concept_deadline != $model->getOriginal('concept_deadline') ||
                    $model->publication_deadline != $model->getOriginal('publication_deadline')) {
                    event(new DeliverableDeadlineUpdated($model));
                }
            }
        );
    }
}
