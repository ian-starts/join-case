<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Webpatser\Uuid\Uuid;

/**
 * Class Influencer
 * @property string                   uuid
 * @property string                   name
 * @property string                   email
 * @property Deliverable[]|Collection deliverables
 * @package App
 */
class Influencer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email,'
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
    public function deliverables(): BelongsToMany
    {
        return $this->belongsToMany(Deliverable::class);
    }

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();
        self::creating(
            function ($model) {
                $model->uuid = (string)Uuid::generate(4);
            }
        );
    }
}
