<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calon extends Model
{
    use HasFactory;

    protected $table = 'calon';
    protected $fillable = [
        'visi',
        'misi',
        'jumlah_pemilih',
        'user_id'
    ];

    public function profile()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }
}
