<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Histori extends Model
{
    protected $table = 'histori';

    protected $fillable = [
        'peminjaman_id',
        'pengembalian_id'
    ];

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id', 'id');
    }

    public function pengembalian()
    {
        return $this->belongsTo(Pengembalian::class, 'pengembalian_id', 'id');
    }
}
