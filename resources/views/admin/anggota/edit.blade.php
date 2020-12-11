@extends('layouts.main')
@section('title', 'Edit Anggota ' . $anggota->name)

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
        <form action="{{ route('anggota.update', $anggota->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" value="{{ $anggota->nama }}" name="nama" required>
            </div>
            <div class="form-group">
                <label for="name">Alamat</label>
                <textarea name="alamat" rows="4" name="alamat" class="form-control">{{ $anggota->alamat }}</textarea>
            </div>
            <div class="form-group">
                <label for="name">Telepon</label>
                <input type="number" class="form-control" name="telp" value="{{ $anggota->telp }}">
            </div>
            <div class="form-group">
                <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Kembali</a>
                <button class="btn btn-primary">Perbaharui</button>
            </div>
        </form>
    </div>
</div>
@endsection