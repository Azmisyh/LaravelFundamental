<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusans';
    protected $primaryKey = 'id_jurusan';

    protected $fillable = [
        'nama_jurusan',
        'akreditasi',
    ];

    public function mahasiswas(): HasMany
    {
        return $this->hasMany(Mahasiswa::class, 'id_jurusan', 'id_jurusan');
    }

    public function matakuliahs(): HasMany
    {
        return $this->hasMany(Matakuliah::class, 'id_jurusan', 'id_jurusan');
    }
}
