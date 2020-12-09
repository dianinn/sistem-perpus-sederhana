<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengembalian extends Model
{
    protected $table = "pengembalian";
    protected $fillable = [
    'id', 'peminjaman_id', 'tgl_kembali', 'status', 'denda'
    ];
}
