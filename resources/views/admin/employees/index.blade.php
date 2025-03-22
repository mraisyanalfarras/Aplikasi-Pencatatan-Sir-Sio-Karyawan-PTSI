@extends('admin.app')

@section('content')
<div class="container">
    @can('show employees')
    <h3 class="mb-4">Daftar Karyawan</h3>

    <div class="row mb-4">
        <div class="col-md-6">
            @can('add employees')
            <a href="{{ route('employees.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Karyawan
            </a>
            @endcan
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Cari karyawan..." id="search">
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
                            <th width="20%">Nama</th>
                            <th width="15%">Departemen</th>
                            <th width="25%">Alamat</th>
                            <th width="10%">Telepon</th>
                            <th width="15%">Gaji</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($employees as $key => $employee)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $employee->user->name ?? 'N/A' }}</td>
                                <td>{{ $employee->department->name ?? 'N/A' }}</td>
                                <td>{{ $employee->address }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>Rp {{ number_format($employee->salary, 0, ',', '.') }}</td>
                                <td>
                                    <div class="btn-group">
                                        @can('show employees')
                                        <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Detail
                                        </a>
                                        @endcan
                                        @can('edit employees')
                                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        @endcan
                                        @can('delete employees')
                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus karyawan ini?')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data karyawan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $employees->links() }}
            </div>
        </div>
    </div>
    @endcan
</div>
@endsection