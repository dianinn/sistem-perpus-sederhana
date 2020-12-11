@extends('layouts.main')
@section('title', 'Tambah Admin')

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
        <form action="{{ route('admin.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="name">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label for="name">Kata Sandi</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
                <a href="{{ route('admin.index') }}" class="btn btn-secondary">Kembali</a>
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection