<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Histori;
use App\Models\Peminjaman;

class HistoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $from = date('2020-01-01');
        // $to = date('2020-12-30');

        $dataHistori = Histori::with('peminjaman.anggota')->with('pengembalian')->get();
        // $dataHistoriFoo = Histori::whereBetween('created_at', [$from, $to])->get();

        // dd($dataHistori);

        return view('admin.histori.index', compact('dataHistori'));
    }

    public function range(Request $request)
    {
        $from = date($request->from);
        $to = date($request->to);

        $dataHistori = Histori::with('peminjaman.anggota')->with('pengembalian')->whereBetween('created_at', [$from, $to])->get();

        return view('admin.histori.index', compact('dataHistori'));

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peminjaman = Peminjaman::with('buku')->findOrFail($id);

        return view('admin.histori.show', compact('peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
