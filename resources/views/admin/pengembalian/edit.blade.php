@extends('layouts.main')
@section('title', 'Pengembalian Buku - ' . $peminjam->nama)

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-8">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="col-sm-8">
        <h3>Pengembalian Buku</h3>
    </div>
    <div class="col-sm-8 p-5">
        <form action="{{ route('pengembalian.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Admin</label>
                <input type="text" class="form-control" value="{{ $peminjam->admin->name }}" disabled>
            </div>
            <div class="form-group">
                <label for="alamat">Nama Anggota</label>
                <input type="text" class="form-control" value="{{ $peminjam->anggota->nama }}" disabled>
            </div>
            <label for="tgl_kembali">Tanggal Pengembalian</label>
            <div class="input-group date" data-provide="datepicker">
                <input type="text" name="tgl_kembali" class="form-control datepicker rounded">
                <div class="input-group-addon">
                    <i class="far fa-calendar" style="font-size: 22px; margin-top: 6px; margin-left: 8px"></i>
                </div>
            </div>
            <div class="form-group mt-2">
                <label for="status">Status Pengembalian</label>
                <input type="text" name="status" class="form-control">
            </div>
            <div class="form-group">
                <input type="hidden" name="peminjaman_id" value="{{ $peminjam->id }}">
            </div>
            <div class="form-group">
                <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Kembali</a>
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('after-script')
    <script>
        $(document).ready(function () {
            $('.datepicker').datepicker({
                dateFormat: 'dd-mm-yy'
            })
        })
    </script>
@endpush