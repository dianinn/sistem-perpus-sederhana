<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    protected $table = "peminjaman";
    protected $fillable = [
    'id', 'user_id', 'anggota_id', 'buku_id', 'tgl_pinjam'
    ];
}
