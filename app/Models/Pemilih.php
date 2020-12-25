<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilih extends Model
{
    use HasFactory;

    protected $table = 'pemilih';
    protected $primaryKey = 'nim';
    protected $fillable = [
        'nim',
        'sudah_memilih',
        'user_id'
    ];
}
