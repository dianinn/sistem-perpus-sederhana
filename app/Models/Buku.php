<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';

    protected $fillable = [
        'isbn',
        'judul',
        'pengarang',
        'penerbit',
        'tahun',
        'stok'
    ];
}
