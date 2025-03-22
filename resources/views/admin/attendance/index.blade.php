@extends('admin.app')

@section('content')
<div class="container">
    @can('show attendances')
    <h3 class="mb-4">Daftar Absensi</h3>

    <div class="row mb-4">
        <div class="col-md-6">
            @can('add attendances')
            <a href="{{ route('attendance.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Absensi
            </a>
            @endcan
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Cari absensi..." id="search">
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
                            <th width="25%">Tanggal Absensi</th>
                            <th width="20%">Status</th>
                            <th width="25%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($attendances as $attendance)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $attendance->employee->user->name ?? 'N/A' }}</td>
                                <td>{{ $attendance->attendance_date->format('d F Y') }}</td>
                                <td>
                                    @if($attendance->status == 'hadir')
                                        <span class="badge bg-success">Hadir</span>
                                    @elseif($attendance->status == 'izin')
                                        <span class="badge bg-warning">Izin</span>
                                    @elseif($attendance->status == 'sakit')
                                        <span class="badge bg-info">Sakit</span>
                                    @else
                                        <span class="badge bg-danger">Tidak Hadir</span>
                                    @endif
                                </td>
                                <td>
                                    @can('edit attendances')
                                    <a href="{{ route('attendance.edit', $attendance->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    @endcan
                                    @can('delete attendances')
                                    <form action="{{ route('attendance.destroy', $attendance->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data absensi</td>
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