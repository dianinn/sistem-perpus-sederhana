<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Histori;
use App\User;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataPeminjam = Peminjaman::with('anggota')->with('buku')->findOrFail($request->peminjaman_id);
        $idBuku = $dataPeminjam->buku_id;

        // Mengembalikan stok buku ke semula
        Buku::findOrFail($idBuku)->update(['stok' => $dataPeminjam->buku->stok + 1]);

        // Memasukan data pengembalian ke table
        $pengembalian = Pengembalian::create($request->all());

        // Memasukan id pengembalian ke table histori
        Histori::where('peminjaman_id', $dataPeminjam->id)->first()->update(['pengembalian_id' => $pengembalian->id]);

        // Menghapus data peminjaman
        Peminjaman::findOrFail($dataPeminjam->id)->update(['dikembalikan' => 1]);

        return redirect()->route('peminjaman.index')->with('status', 'Buku berhasil dikembalikan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $peminjam = Peminjaman::with('admin')->with('anggota')->with('buku')->findOrFail($id);

        return view('admin.pengembalian.edit', [
            'peminjam' => $peminjam
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
