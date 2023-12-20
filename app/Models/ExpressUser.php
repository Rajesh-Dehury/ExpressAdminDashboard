<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ExpressUser extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function expressClient(): BelongsTo
    {
        return $this->belongsTo(ExpressClient::class, 'omr_client_id', 'slug');
    }

    function expressReport(): HasOne
    {
        return $this->hasOne(ExpressReport::class, 'user_id', 'id');
    }
}
