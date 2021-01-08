@extends('layouts.main')
@section('title', 'Histori Transaksi')

@push('after-style')
<style>
    .edit-icon {
        color: green;
    }

    .delete-icon {
        color: #FE0101;
    }

    .delete-btn {
        border: none;
        background: none;
    }
</style>

@endpush

@section('content')
<div class="row">
    <div class="col-sm-12 p-3">
        @if (session('status'))
            <div class="alert alert-success mt-3">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div class="col-sm-10 pl-5 pt-5">
        <h4>Histori Transaksi</h4>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 pb-5 pl-5">
        <a href="{{ route('laporan.cetak.histori') }}" class="btn btn-primary">Cetak Histori</a>
    </div>
</div>
<div class="row pl-5">
    <h5>Rentang Tanggal</h5>
</div>
<div class="row pl-5">
    <form action="{{ route('histori.range') }}" method="post">
        @csrf
        <div class="col-sm-12">
            <div class="input-group date">
                <input type="text" name="from" class="form-control rounded">
                <div class="input-group-addon">
                    <i class="far fa-calendar" style="font-size: 22px; margin-top: 6px; margin-left: 8px"></i>
                </div>
            </div>
            <div class="p-2">
                —
            </div>
            <div class="input-group date">
                <input type="text" name="to" class="form-control rounded">
                <div class="input-group-addon">
                    <i class="far fa-calendar" style="font-size: 22px; margin-top: 6px; margin-left: 8px"></i>
                </div>
            </div>
            <div>
                <small>Format: tahun-bulan-tanggal (contoh: 2020-01-28)</small> <br>
                <button class="btn btn-primary mt-4">Lihat</button>
            </div>
        </div>
    </form>
</div>
<div class="row">
    <div class="col-sm-12 p-5">
        <table id="histori" class="table table-stripped pb-3" style="width: 100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Tgl Peminjaman</th>
                    <th>Tgl Pengembalian</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataHistori as $histori)                    
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $histori->peminjaman->anggota->nama }}</td>
                        <td>{{ $histori->peminjaman->tgl_pinjam }}</td>
                        <td>{{ $histori->pengembalian ? $histori->pengembalian->tgl_kembali : '-' }}</td>
                        <td>{{ $histori->pengembalian ? $histori->pengembalian->status : '-' }}</td>
                        <td>{{ $histori->created_at }}</td>
                        <td><a href="{{ route('histori.show', $histori->peminjaman->id) }}"><small>Lihat Buku</small></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('after-script')
    <script>
        $(document).ready(function() {
            $('#histori').DataTable()
        })
    </script>
@endpush