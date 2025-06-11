<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tentang extends Model
{
    use HasFactory;

    protected $table = 'tentang';

    protected $fillable = [
        'judul',
        'isi',
        'gambar',
    ];
}
