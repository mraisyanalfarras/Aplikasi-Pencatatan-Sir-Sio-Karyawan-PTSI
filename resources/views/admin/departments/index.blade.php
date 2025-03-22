@extends('admin.app')

@section('content')
<div class="container">
    @can('show departments')
    <h3 class="mb-4">Daftar Departemen</h3>

    <div class="row mb-4">
        <div class="col-md-6">
            @can('add departments')
            <a href="{{ route('departments.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Departemen
            </a>
            @endcan
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari departemen..." id="search">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th width="5%">No</th>
                            <th width="25%">Nama Departemen</th>
                            <th width="45%">Deskripsi</th>
                            <th width="25%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($departments as $key => $department)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $department->name }}</td>
                                <td>{{ $department->description }}</td>
                                <td>
                                    @can('edit departments')
                                    <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    @endcan
                                    @can('delete departments')
                                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus departemen ini?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data departemen</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $departments->links() }}
            </div>
        </div>
    </div>
    @else
    <div class="alert alert-danger">
        Anda tidak memiliki izin untuk melihat departemen.
    </div>
    @endcan
</div>
@endsection