@extends('admin.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Data SIO</h2>
        <a href="{{ route('datasios.create') }}" class="btn btn-primary">Tambah Data SIO</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>No SIO</th>
                    <th>Jenis</th>
                    <th>Kelas</th>
                    <th>Tanggal Expired</th>
                    <th>Status</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dataSios as $key => $sio)
                <tr>
                    <td>{{ isset($dataSios) && method_exists($dataSios, 'firstItem') ? $dataSios->firstItem() + $key : $key + 1 }}</td>
                    <td>{{ $sio->nik }}</td>
                    <td>{{ $sio->name }}</td>
                    <td>{{ $sio->position }}</td>
                    <td>{{ $sio->no_sio }}</td>
                    <td>{{ $sio->type }}</td>
                    <td>{{ $sio->class }}</td>
                    <td>{{ \Carbon\Carbon::parse($sio->expire_date)->format('d M Y') }}</td>
                    <td>
                        @php
                            $statusColors = ['active' => 'success', 'expired' => 'danger', 'pending' => 'warning'];
                        @endphp
                        <span class="badge bg-{{ $statusColors[$sio->status] ?? 'secondary' }}">
                            {{ ucfirst($sio->status) }}
                        </span>
                    </td>
                    <td>{{ $sio->location }}</td>
                    <td>
                        <a href="{{ route('datasios.edit', $sio->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('datasios.destroy', $sio->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="11" class="text-center">Tidak ada data SIO yang tersedia.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(method_exists($dataSios, 'links'))
    <div class="d-flex justify-content-center">
        {{ $dataSios->links() }}
    </div>
    @endif
</div>
@endsection
