<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwaldokter extends Model
{
    use HasFactory;

    protected $table = 'jadwal_dokter';

    protected $guarded = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
