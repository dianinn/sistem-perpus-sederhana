@extends('layouts.main')
@section('title', 'Edit Buku ' . $buku->name)

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
        <form action="{{ route('buku.update', $buku->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control" value="{{ $buku->isbn }}" name="isbn" required>
            </div>
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" value="{{ $buku->judul }}" name="judul" required>
            </div>
            <div class="form-group">
                <label for="pengarang">Pengarang</label>
                <input type="text" class="form-control" value="{{ $buku->pengarang }}" name="pengarang" required>
            </div>
            <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <input type="text" class="form-control" value="{{ $buku->penerbit }}" name="penerbit" required>
            </div>
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="text" class="form-control" value="{{ $buku->tahun }}" name="tahun" required>
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="text" class="form-control" value="{{ $buku->stok }}" name="stok" required>
            </div>
            <div class="form-group">
                <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
                <button class="btn btn-primary">Perbaharui</button>
            </div>
        </form>
    </div>
</div>
@endsection