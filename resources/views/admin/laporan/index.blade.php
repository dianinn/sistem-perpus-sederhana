@extends('layouts.main')
@section('title', ' Laporan')

@section('content')
<div class="container">
 <div class="row justify-content-center">
 <div class="col-md-12">
 <div class="card">
 <div class="cardheader">Laporan Histori</div>
 <div class="card-body">
 <form action="/laporan/histori" method="PUT" target="_blank">
 @csrf
 <fieldset>
 <div class="form-group row">
 <div class="col-md-4">
 <label for="klasifikasi">Periode Histori</label>
 <input id="jenis" type="hidden" name="jenis"value="histori" class="form-control">
 <select id="periode" name="periode"class="form-control">
 <option value="">--Pilih Periode Laporan--
</option>
 <option value="All">Semua</option>
 <option value="periode">Per Periode</option>
 </select>
 </div>
<div class="col-md-3">
 <label for="no_hp">Tanggal Awal</label>
 <input id="tglawal" type="date" name="tglawal" class="form-control">
 </div>
<div class="col-md-3">
 <label for="no_hp">Tanggal Akhir</label>
 <input id="tglakhir" type="date" name="tglakhir" class="form-control">
 </div>
</div>
<div class="col-md-10">
 <input type="submit" class="btn btn-success btnsend" value="Cetak" >
 </div>
 </fieldset>
 </form>
 </div>
 </div>
 <div class="card">
 <div class="cardheader">Laporan Peminjaman</div>
 <div class="card-body">
 <form action="/laporan/kaskeluar" method="PUT" target="_blank">
 @csrf
 <fieldset>
 <div class="form-group row">
 <div class="col-md-4">
 <label for="klasifikasi">Periode Peminjaman</label>
 <input id="jenis" type="hidden" name="jenis"value="peminjaman" class="form-control">
 <select id="periode" name="periode"class="form-control">
 <option value="">--Pilih Periode Laporan--
</option>
 <option value="All">Semua</option>
 <option value="periode">Per Periode</option>
 </select>
</div>
<div class="col-md-3">
 <label for="no_hp">Tanggal Awal</label>
 <input id="tglawal" type="date" name="tglawal" class="form-control">
 </div>
<div class="col-md-3">
 <label for="no_hp">Tanggal Akhir</label>
 <input id="tglakhir" type="date" name="tglakhir" class="form-control">
 </div>
 </div>
<div class="col-md-10">
 <input type="submit" class="btn btn-success btnsend" value="Cetak" >
 </div>
 </fieldset>
 </form>
 </div>
 </div>
 <div class="card">
 <div class="card-header">Laporan Pengembalian</div>
 <div class="card-body">
 <form action="/laporan/pengembalian" method="PUT" target="_blank">
 @csrf
 <fieldset>
 <div class="form-group row">
 <div class="col-md-4">
 <label for="klasifikasi">Periode Pengembalian</label>
 <input id="jenis" type="hidden" name="jenis"value="pengembalian" class="form-control">
 <select id="periode" name="periode"class="form-control">
 <option value="">--Pilih Periode Laporan--
</option>
 <option value="All">Semua</option>
<option value="periode">Per Periode</option>
 </select>
 </div>
<div class="col-md-3">
 <label for="no_hp">Tanggal Awal</label>
 <input id="tglawal" type="date" name="tglawal" class="form-control">
 </div>
<div class="col-md-3">
 <label for="no_hp">Tanggal Akhir</label>
 <input id="tglakhir" type="date" name="tglakhir" class="form-control">
 </div>
</div>
<div class="col-md-10">
 <input type="submit" class="btn btn-success btnsend" value="Cetak" >
 </div>
 </fieldset>
 </form>
 </div>
 </div>
 </div>
 </div>
</div>
@endsection
