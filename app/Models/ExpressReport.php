<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExpressReport extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function expressUser(): BelongsTo
    {
        return $this->belongsTo(ExpressUser::class, 'user_id', 'id');
    }
}
