@extends('layouts.main')
@section('title', 'Peminjaman')

@push('after-style')
<style>
    .edit-icon {
        color: green;
    }

</style>
@endpush

@section('content')
<div class="row">
    <div class="col-sm-12 p-3">
        @if (session('status'))
            <div class="alert alert-success mt-3">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div class="col-sm-10 pl-5 pt-5">
        <h4>Peminjaman</h4>
    </div>
    <div class="col-sm-2 pt-5">
        <a href="{{ route('peminjaman.create') }}" class="bg-primary p-2 rounded text-white text-decoration-none">+ Tambah Peminjam</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 p-5">
        <table id="peminjaman" class="table table-stripped pb-3" style="width: 100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Admin</th>
                    <th>Anggota</th>
                    <th>Buku</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listPeminjam as $peminjam)                    
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $peminjam->admin->name }}</td>
                        <td>{{ $peminjam->anggota->nama }}</td>
                        <td>{{ $peminjam->buku->judul }}</td>
                        <td>{{ $peminjam->tgl_pinjam }}</td>
                        <td>
                            <form action="{{ route('peminjaman.destroy', $peminjam->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('peminjaman.edit', $peminjam->id) }}" class="mr-2 text-decoration-none">
                                    <i class=" fas fa-pen-square fa-lg edit-icon"></i>
                                </a>
                                |
                                <a href="{{ route('pengembalian.edit', $peminjam->id) }}" class="ml-2 text-decoration-none">
                                    <i class="fas fa-hand-holding-heart"></i>
                                </a>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('after-script')
    <script>
        $(document).ready(function() {
            $('#peminjaman').DataTable()
        })
    </script>
@endpush