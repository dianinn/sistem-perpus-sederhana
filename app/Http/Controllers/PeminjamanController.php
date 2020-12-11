<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Peminjaman;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Histori;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listPeminjam = Peminjaman::with('admin')->with('anggota')->with('buku')->where('dikembalikan', null)->get();

        return view('admin.peminjaman.index', compact('listPeminjam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listAnggota = Anggota::all();
        $listBuku = Buku::all();

        return view('admin.peminjaman.create', [
            'listAnggota' => $listAnggota,
            'listBuku' => $listBuku
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataPeminjam = $request->all();

        $dataBuku = Buku::findOrFail($request->buku_id);
        $updateStock = ['stok' => $dataBuku->stok - 1];
        $dataBuku->update($updateStock);

        $dataStored = Peminjaman::create($dataPeminjam);

        Histori::create(['peminjaman_id' => $dataStored->id]);

        return redirect()->route('peminjaman.index')->with('status', 'Data Peminjaman berhasil ditambahkan!');
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
        $listAnggota = Anggota::all();
        $listBuku = Buku::all();

        return view('admin.peminjaman.edit', [
            'peminjam' => $peminjam,
            'listAnggota' => $listAnggota,
            'listBuku' => $listBuku,
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
        $dataPeminjam = $request->except('buku_id_old');
        $dataBukuOld = Buku::findOrFail($request->buku_id_old);
        $dataBukuNew = Buku::findOrFail($request->buku_id);

        // Jika buku yang dipinjam berbeda dari sebelumnya 
        if ($request->buku_id_old !== $request->buku_id) {

            // Mengembalikan jumlah stok buku sebelumnya
            $stokOld = ['stok' => $dataBukuOld->stok + 1];
            $dataBukuOld->update($stokOld);

            // Mengupdate jumlah stok buku baru
            $stokNew = ['stok' => $dataBukuNew->stok - 1];
            $dataBukuNew->update($stokNew);
        } else {
            $dataBukuOld->update($dataPeminjam);
        }

        Peminjaman::findOrFail($id)->update($dataPeminjam);

        return redirect()->route('peminjaman.index')->with('status', 'Data Peminjaman berhasil diperbaharui!');
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
