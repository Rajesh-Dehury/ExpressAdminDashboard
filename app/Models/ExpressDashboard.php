<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpressDashboard extends Model
{
    use HasFactory;
    protected $table = 'express_dashboard';

    function topCharacter()
    {
        return $this->hasOne(LifevitaeCharacter::class, 'id', 'lifevitae_character_id');
    }
}
