@extends('layouts.layout')
@section('content')
<form action="{{route('user.update', [$user->id])}}" method="POST">
@csrf
<input type="hidden" name="_method" value="PUT">
    <fieldset>
        <legend>Mengedit Data Pengguna</legend>
            <div class="form-group row">
                <div class="col-md-5">
                    <label for="usname">Username</label>
                    <input id="usname" type="text" name="usname" class="formcontrol" value="{{$user->username}}">
                </div>
                <div class="col-md-5">
                    <label for="nama">Nama Lengkap</label>
                    <input id="nama" type="text" name="nama" class="formcontrol" value="{{$user->name}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-5">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" class="formcontrol" value="{{$user->email}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-5">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" class="formcontrol" value="{{$user->address}}">{{$user->address}}</textarea>
                </div>
                <div class="col-md-5">
                    <label for="telp">Nomor Telpon</label>
                    <input id="telp" type="text" name="telp" class="formcontrol" value="{{$user->phone}}">
                </div>
            </div>
            <div class="col-md-10">
                <input type="checkbox" name="ubahpassword" value="ubah" > Ubah Password
            </div>
            <div class="form-group row">
                <div class="col-md-5">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" class="formcontrol" value="{{$user->password}}">
                </div>
                <div class="col-md-5">
                    <label for="kpassword">Konfirm Password</label>
                    <input id="kpassword" type="password" name="kpassword" class="formcontrol" value="{{$user->password}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-5">
                    <label for="status">Status</label>
                    <select id="status" name="status" class="form-control" required>
                        <option value="{{$user->status}}">{{$user->status}}</option>
                        <option value="">--Pilih Status--</option>
                        <option value="ACTIVE">AKTIF</option>
                        <option value="INACTIVE">NON AKTIF</option>
                    </select>
                </div>
            </div>
            <div class="col-md-10">
                <input type="submit" class="btn btn-success btn-send" value="Update" >
                    <input type="Button" class="btn btn-primary btnsend" value="Kembali" onclick="history.go(-1)">
            </div><hr>
        </fieldset>
</form>
@endsection
