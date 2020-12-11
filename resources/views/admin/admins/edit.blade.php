@extends('layouts.main')
@section('title', 'Edit Admin - ' . $user->name)

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
        <form action="{{ route('admin.update', $user->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" value="{{ $user->name }}" name="name" required>
            </div>
            <div class="form-group">
                <label for="name">Email</label>
                <input type="email" class="form-control" value="{{ $user->email }}" name="email" required>
            </div>
            <div class="form-group">
                <label for="name">Ubah Kata Sandi</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <a href="{{ route('admin.index') }}" class="btn btn-secondary">Kembali</a>
                <button class="btn btn-primary">Perbaharui</button>
            </div>
        </form>
    </div>
</div>
@endsection