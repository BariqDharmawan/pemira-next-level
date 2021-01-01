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
        'foto',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
