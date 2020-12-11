@extends('layouts.main')
@section('title', 'Kelola Admin')

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
        <h4>Kelola Admin</h4>
    </div>
    <div class="col-sm-2 pt-5">
        <a href="{{ route('admin.create') }}" class="bg-primary p-2 rounded text-white text-decoration-none">+ Tambah Admin</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 p-5">
        <table id="admins" class="table table-stripped pb-3" style="width: 100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)                    
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        @if ($user->email === $admin)
                            <td>
                                <span class="badge badge-success">Pengawas Utama</span>
                            </td>
                        @else
                        @if (Auth::user()->id === $user->id || Auth::user()->email === $admin)
                            <td>
                                <form action="{{ route('admin.destroy', $user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('admin.edit', $user->id) }}" class="mr-2 text-decoration-none">
                                        <i class=" fas fa-pen-square fa-lg edit-icon"></i>
                                    </a>
                                    |
                                    <button class="delete-btn" onclick="return confirm('Yakin akan menghapus?')">
                                        <i class="fas fa-trash-alt fa-lg delete-icon"></i>
                                    </button>

                                </form>
                            </td>
                        @else
                            <td></td>
                        @endif
                        @endif
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
            $('#admins').DataTable()
        })
    </script>
@endpush