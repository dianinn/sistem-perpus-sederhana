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
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataHistori as $histori)                    
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $histori->peminjaman->anggota->nama }}</td>
                        <td>{{ $histori->peminjaman->tgl_pinjam }}</td>
                        <td>{{ $histori->pengembalian->tgl_kembali }}</td>
                        <td>{{ $histori->pengembalian->status }}</td>
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