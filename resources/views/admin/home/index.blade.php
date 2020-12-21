@extends('layouts.main')
@section('title', 'Beranda')

@section('content')
<div class="row">
    <div class="col-sm-12 p-5">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">Halo, {{ Auth::user()->name }}!</h1>
              <p class="lead">Saat ini Anda sedang berada di halaman Admin Perpustakaan Kawaii's.</p>
            </div>
        </div>
    </div>
</div>
@endsection