<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_profile_id
 * @property string $street
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property float $longitude
 * @property float $latitude
 * @property string $created_at
 * @property string $updated_at
 * @property UserProfile $userProfile
 */
class user_addresses extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_profile_id', 'street', 'city', 'state', 'zip', 'longitude', 'latitude', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userProfile()
    {
        return $this->belongsTo('App\UserProfile');
    }
}
