<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'akses_roles',
        'akses_users',
        'akses_galeri',
        'akses_berita',
        'akses_kontak',
        'akses_tentang',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
