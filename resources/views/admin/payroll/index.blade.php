@extends('admin.app')
@section('content')
<div class="container">
    @can('show payrolls')
    <h3 class="mb-4">Daftar Penggajian</h3>

    <div class="row mb-4">
        <div class="col-md-6">
            @can('add payrolls')
            <a href="{{ route('payroll.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Penggajian
            </a>
            @endcan
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Cari penggajian..." id="search">
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
                            <th width="25%">Nama Karyawan</th>
                            <th width="20%">Gaji</th>
                            <th width="25%">Tanggal Dibuat</th>
                            <th width="25%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($payrolls as $payroll)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $payroll->employee->user->name ?? 'N/A' }}</td>
                                <td>Rp {{ number_format($payroll->salary, 0, ',', '.') }}</td>
                                <td>{{ $payroll->created_at->format('d F Y') }}</td>
                                <td>
                                    @can('edit payrolls')
                                    <a href="{{ route('payroll.edit', $payroll->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    @endcan
                                    @can('delete payrolls')
                                    <form action="{{ route('payroll.destroy', $payroll->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data penggajian ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data penggajian</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endcan
</div>
@endsection