<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Player extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
     public function club(): \Illuminate\Database\Eloquent\Relations\BelongsTo
     {
         return $this->belongsTo(Club::class, 'club_id');
     }
}
