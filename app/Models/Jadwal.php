<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    protected $fillable = ['tgl', 'judul', 'jam_mulai', 'jam_selesai'];
    protected $dates = ['jam_mulai', 'jam_selesai'];
}
