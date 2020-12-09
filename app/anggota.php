<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class anggota extends Model
{
    protected $table = "anggota";
    protected $fillable = [
    'id', 'nama', 'alamat', 'telp'
    ];
}
