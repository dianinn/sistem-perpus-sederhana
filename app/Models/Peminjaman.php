<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    protected $fillable = [
        'user_id',
        'anggota_id',
        'buku_id',
        'tgl_pinjam',
        'dikembalikan'
    ];

    public function admin()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id', 'id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id', 'id');
    }
}
