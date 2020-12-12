@extends('layouts.main')
@section('title', 'Lihat Buku')

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
<div class="row justify-content-center">
    <div class="col-sm-8">
        <h4>Detail Buku Yang Dipinjam</h4>
    </div>
</div>
<div class="row justify-content-center mt-3">
    <div class="col-sm-8">
        <a href="{{ route('laporan.cetak', $peminjaman->id) }}" class="btn btn-primary">Cetak PDF</a>
    </div>
</div>
<div class="row justify-content-center mt-3">
    <div class="col-sm-8">
        <table class="table table-striped">
            <tr>
                <th>ISBN</th>
                <th>:</th>
                <td>{{ $peminjaman->buku->isbn }}</td>
            </tr>
            <tr>
                <th>Judul</th>
                <th>:</th>
                <td>{{ $peminjaman->buku->judul }}</td>
            </tr>
            <tr>
                <th>Pengarang</th>
                <th>:</th>
                <td>{{ $peminjaman->buku->pengarang }}</td>
            </tr>
            <tr>
                <th>Penerbit</th>
                <th>:</th>
                <td>{{ $peminjaman->buku->penerbit }}</td>
            </tr>
            <tr>
                <th>Tahun</th>
                <th>:</th>
                <td>{{ $peminjaman->buku->tahun }}</td>
            </tr>
        </table>
    </div>
</div>
<div class="row justify-content-center mt-4">
    <a href="{{ route('histori.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection

@push('after-script')
    <script>
        $(document).ready(function() {
            $('#histori').DataTable()
        })
    </script>
@endpush