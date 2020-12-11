@extends('layouts.main')
@section('title', 'Daftar Buku')

@push('after-style')
<style>
    .edit-icon {
        color: green;
    }

    .delete-icon {
        color: #FE0101;
    }

    .delete-btn {
        border: none;
        background: none;
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
        <h4>Daftar Buku</h4>
    </div>
    <div class="col-sm-2 pt-5">
        <a href="{{ route('buku.create') }}" class="bg-primary p-2 rounded text-white text-decoration-none">+ Tambah Buku</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 p-5">
        <table id="buku" class="table table-stripped pb-3" style="width: 100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ISBN</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listBuku as $buku)                    
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $buku->isbn }}</td>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->pengarang }}</td>
                        <td>{{ $buku->penerbit }}</td>
                        <td>{{ $buku->tahun }}</td>
                        <td>{{ $buku->stok }}</td>
                        <td>
                            <form action="{{ route('buku.destroy', $buku->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('buku.edit', $buku->id) }}" class="mr-2 text-decoration-none">
                                    <i class=" fas fa-pen-square fa-lg edit-icon"></i>
                                </a>
                                |
                                <button class="delete-btn" onclick="return confirm('Yakin akan menghapus?')">
                                    <i class="fas fa-trash-alt fa-lg delete-icon"></i>
                                </button>

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
            $('#buku').DataTable()
        })
    </script>
@endpush