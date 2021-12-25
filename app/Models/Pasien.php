<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'pasien';

    protected $guarded = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
