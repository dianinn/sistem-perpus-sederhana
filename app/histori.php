<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class histori extends Model
{
    protected $table = "histori";
    protected $fillable = [
    'id', 'peminjaman_id', 'pengembalian_id'
    ];
}
