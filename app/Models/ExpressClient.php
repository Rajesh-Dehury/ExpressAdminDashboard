<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ExpressClient extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'express_client';


    function expressUsers(): HasMany
    {
        return $this->hasMany(ExpressUser::class, 'omr_client_id', 'slug');
    }
}
