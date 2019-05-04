<?php

namespace App;

use App\Events\DeliverableCreated;
use App\Events\DeliverableDeadlineUpdated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Webpatser\Uuid\Uuid;

/**
 * Class Deliverable
 * @property string uuid
 * @property string name
 * @property string status
 * @property \DateTime concept_deadline
 * @property \DateTime publication_deadline
 * @property Influencer[]|Collection influencers
 * @property Campaign campaign
 * @package App
 */
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
        'id',
        'campaign_id',
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
