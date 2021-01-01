<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilih extends Model
{
    use HasFactory;

    protected $table = 'pemilih';
    protected $with = ['user'];
    protected $fillable = [
        'nim',
        'sudah_memilih',
        'user_id',
        'pilihan_kamu',
        'is_password_changed'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault();
    }
}
