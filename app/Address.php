<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $street
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property float $longitude
 * @property float $latitude
 * @property float $addressable_id
 * @property float $addressable_type
 * @property string $created_at
 * @property string $updated_at
 * @property UserProfile $userProfile
 */
class Address extends Model
{
    /**
     * @var string
     **/
     protected $table = 'addresses';

    /**
     * @var array
     */
    protected $fillable = ['street', 'city', 'state', 'zip', 'longitude', 'latitude', 'addressable_id', 'addressable_type', 'created_at', 'updated_at'];

    public function addressable() {
        return $this->morphTo();
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userProfile()
    {
        return $this->belongsTo('App\UserProfile');
    }
}
