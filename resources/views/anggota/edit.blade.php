@extends('layouts.layout')
@section('content')
<form action="{{route('anggota.update', [$anggota->id])}}" method="POST">
@csrf
<input type="hidden" name="_method" value="PUT">
    <fieldset>
        <legend>Input Data Anggota</legend>
            <div class="form-group row">
                <div class="col-md-5">
                    <label for="nama">Nama Lengkap</label>
                    <input id="nama" type="text" name="nama" class="formcontrol" value="{{$anggota->name}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-5">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" class="formcontrol" value="{{$anggota->address}}">{{$anggota->address}}</textarea>
                </div>
                <div class="col-md-5">
                    <label for="telp">Nomor Telpon</label>
                    <input id="telp" type="text" name="telp" class="formcontrol" value="{{$anggota->phone}}">
                </div>
            </div>
            <div class="col-md-10">
                <input type="submit" class="btn btn-success btn-send" value="Update" >
                    <input type="Button" class="btn btn-primary btnsend" value="Kembali" onclick="history.go(-1)">
            </div><hr>
        </fieldset>
</form>
@endsection
