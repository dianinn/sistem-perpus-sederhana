@extends('layouts.layout')
@section('content')
<form action="{{route('users.store')}}" method="POST">
@csrf
<fieldset>
    <legend>Input Data Anggota</legend>
    <div class="form-group row">
        <div class="col-md-5">
            <label for="nama">Nama Lengkap</label>
                <input id="nama" type="text" name="nama" class="formcontrol" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-5">
            <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" class="formcontrol" required></textarea>
        </div>
        <div class="col-md-5">
            <label for="telp">Nomor Telpon</label>
                <input id="telp" type="text" name="telp" class="formcontrol" required>
        </div>
    </div>
    <div class="col-md-10">
        <input type="submit" class="btn btn-success btn-send" value="Simpan" >
            <input type="Button" class="btn btn-primary btnsend" value="Kembali" onclick="history.go(-1)">
    </div><hr>
</fieldset>
</form>
@endsection
