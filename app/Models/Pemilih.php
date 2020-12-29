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
        'user_id',
        'pilihan_kamu'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'id')->withDefault();
    }
}
