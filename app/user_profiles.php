<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $birthdate
 * @property string $phone
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property UserAddress[] $userAddresses
 */
class user_profiles extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'birthdate', 'phone', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userAddresses()
    {
        return $this->hasMany('App\UserAddress');
    }
}
