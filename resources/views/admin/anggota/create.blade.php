@extends('layouts.main')
@section('title', 'Tambah Anggota')

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
        <form action="{{ route('anggota.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="name" class="form-control" name="nama" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="address" class="form-control" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label for="telp">Telepon</label>
                <input type="number" id="phone" name="telp" class="form-control" required>
            </div>
            <div class="form-group">
                <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Kembali</a>
                <button class="btn btn-primary" id="save">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection