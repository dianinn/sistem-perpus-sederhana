<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;
use App\Models\Histori;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index');
    }

    public function show(Request $request)
    {
        $periode=$request->get('periode');
        $jenis=$request->get('jenis');
        if($jenis=='histori')
        {
        if($periode == 'All')
        {
        $dataHistori = Histori::All();
        $pdf = PDF::loadview('histori.histori_pdf',['histori'=>$dataHistori])->setPaper('A4','landscape');
        return $pdf->stream();
        } else if($periode == 'periode'){
        
            $tglawal=$request->get('tglawal');
            $tglakhir=$request->get('tglakhir');
            $dataHistori=DB::table('histori')->whereBetween('tgl_pinjam', [$tglawal,$tglakhir])->orderby('tgl_pinjam','ASC')->get();
            $pdf = PDF::loadview('histori.histori_pdf',['histori'=>$dataHistori])->setPaper('A4','landscape');
            
            return $pdf->stream();
        }

    }
    elseif($jenis=='peminjaman')
    {
    if($periode == 'All')
    {
    $data = \App\Models\Peminjaman::All();
    $pdf = PDF::loadview('peminjaman.peminjaman_pdf',['peminjaman'=>$data])->setPaper('A4','landscape');
    return $pdf->stream();
    }elseif($periode == 'periode'){
    $tglawal=$request->get('tglawal');
    $tglakhir=$request->get('tglakhir');
    $data=DB::table('peminjaman')->whereBetween('tgl_pinjam', [$tglawal,$tglakhir])->orderby('tgl_pinjam','ASC')->get();
    $pdf = PDF::loadview('peminjaman.peminjaman_pdf',['peminjaman'=>$data])->setPaper('A4','landscape');
    return $pdf->stream();
    }

    }
    elseif($jenis=='pengembalian')
    {
    if($periode == 'All')
    {
    $data = \App\Models\Pengembalian::All();
    $pdf = PDF::loadview('pengembalian.pengembalian_pdf',['pengembalian'=>$data])->setPaper('A4','landscape');
    return $pdf->stream();
    }elseif($periode == 'periode'){
    $tglawal=$request->get('tglawal');
    $tglakhir=$request->get('tglakhir');
    $data=DB::table('pengembalian')->whereBetween('tgl_kembali', [$tglawal,$tglakhir])->orderby('tgl_kembali','ASC')->get();
    $pdf = $pdf = PDF::loadview('pengembalian.pengembalian_pdf',['pengembalian'=>$data])->setPaper('A4','landscape');
    return $pdf->stream();
    }
    }
    }
    }
