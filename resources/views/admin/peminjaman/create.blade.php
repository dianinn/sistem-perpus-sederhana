@extends('layouts.main')
@section('title', 'Tambah Peminjam')

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
    <div class="col-sm-8 p-5">
        <form action="{{ route('peminjaman.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="user_id">Nama Admin</label>
                <input type="hidden" value="{{ Auth::user()->id }}" class="form-control" name="user_id" >
                <input type="text" value="{{ Auth::user()->name }}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="anggota_id">Anggota</label>
                <select name="anggota_id" class="form-control selectpicker" data-live-search="true" data-style="btn-info">
                    <option selected>- Pilih Anggota -</option>
                    @foreach ($listAnggota as $anggota)
                        <option value="{{ $anggota->id }}">{{ $anggota->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="buku_id">Buku</label>
                <select name="buku_id" class="form-control selectpicker" data-live-search="true" data-style="btn-info">
                    <option selected>- Pilih Buku -</option>
                    @foreach ($listBuku as $buku)
                        <option value="{{ $buku->id }}">{{ $buku->judul }} ( Pengarang: {{ $buku->pengarang }} )</option>
                    @endforeach
                </select>
            </div>
            <label for="tgl_pinjam">Tanggal Pinjam</label>
            <div class="input-group date" data-provide="datepicker">
                <input type="text" name="tgl_pinjam" class="form-control datepicker rounded">
                <div class="input-group-addon">
                    <i class="far fa-calendar" style="font-size: 22px; margin-top: 6px; margin-left: 8px"></i>
                </div>
            </div>
            <div class="form-group mt-3">
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