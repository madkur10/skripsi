<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Klinik extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'klinik';

    protected $guarded = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
