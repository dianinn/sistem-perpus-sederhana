<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;
use App\Models\Histori;
use App\Models\Peminjaman;
use App\Models\Pengembalian;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index');
    }

    public function cetak($id)
    {
        $peminjaman = Peminjaman::with('buku')->findOrFail($id);
        $dataPeminjam = Peminjaman::with('anggota')->findOrFail($id);
        $dataPengembalian = Pengembalian::where('peminjaman_id', $id)->first(); 

        $pdf = PDF::loadview('admin.laporan.cetak', [
            'peminjaman' => $peminjaman,
            'dataPeminjam' => $dataPeminjam,
            'dataPengembalian' => $dataPengembalian,
        ]);
        // return $pdf->stream();
        return $pdf->download('Detail Peminjaman ('. $dataPeminjam->anggota->nama .' - '. $peminjaman->tgl_pinjam .') .pdf');
    }

    public function cetak_histori()
    {
        $dataHistori = Histori::with('peminjaman.anggota')->with('pengembalian')->get();

        $pdf = PDF::loadview('admin.laporan.cetak_histori', [
            'dataHistori' => $dataHistori,
        ]);
        return $pdf->stream();
        // return $pdf->download('Histori Peminjaman.pdf');
    }

}
