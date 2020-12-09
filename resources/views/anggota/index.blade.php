@extends('layouts.layout')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Anggota</h1>
</div><hr>
<div class="card-header py-3" align="right">
    <a href="{{route('anggota.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    <i class="fas fa-plus fa-sm text-white-50"></i> + Tambah </a>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="card-body">
    <div class="table-responsive">
        <table class="table tablebordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr align="center">
                <th width="25%">Nama </th>
                <th width="20%">Alamat</th>
                <th width="20%">No. Telp</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggota as $agt)
            <tr>
                <td>{{$agt->nama}}</td>
                <td>{{$agt->alamat}}</td>
                <td>{{$agt->telp}}</td>
                <td align="center">
                    <a href="{{route( 'anggota.edit' ,[$agt->id])}}" class="dnone d-sm-inline-block btn btn-sm btn-success shadow-sm">
                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit
                    </a>
                    <a href="/anggota/hapus/{{ $agt->id }}" onclick="return confirm('Yakin Ingin menghapus data?')" class="dnone d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                        <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    </div>
</div>
@endsection
