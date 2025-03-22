@extends('admin.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Detail Karyawan</h3>

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
            <div class="row">
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th width="30%">Nama</th>
                            <td>{{ $employee->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $employee->user->email }}</td>
                        </tr>
                        <tr>
                            <th>Departemen</th>
                            <td>{{ $employee->department->name }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $employee->address }}</td>
                        </tr>
                        <tr>
                            <th>Tempat Lahir</th>
                            <td>{{ $employee->place_of_birth }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th width="30%">Tanggal Lahir</th>
                            <td>{{ $employee->dob ? \Carbon\Carbon::parse($employee->dob)->format('d F Y') : '-' }}</td>
                        </tr>
                        <tr>
                            <th>Agama</th>
                            <td>{{ $employee->religion }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>{{ $employee->sex }}</td>
                        </tr>
                        <tr>
                            <th>No. Telepon</th>
                            <td>{{ $employee->phone }}</td>
                        </tr>
                        <tr>
                            <th>Gaji</th>
                            <td>Rp {{ number_format($employee->salary, 0, ',', '.') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">
                    <i class="bx bx-edit-alt"></i> Edit
                </a>
                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                        <i class="bx bx-trash"></i> Hapus
                    </button>
                </form>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                    <i class="bx bx-arrow-back"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
