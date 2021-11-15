<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Club extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function players(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Player::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function coach(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Coach::class);
    }
}
