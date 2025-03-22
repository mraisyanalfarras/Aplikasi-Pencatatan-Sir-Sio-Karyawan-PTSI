@extends('admin.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg rounded-3">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="card-title text-primary fw-bold">
                        <i class="fas fa-list me-2"></i>Data SIR Woriking Progres No Crud
                    </h5>
                    <a href="{{ route('datasirs.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Data SIR
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Posisi</th>
                                <th>No SIR</th>
                                <th>Masa Berlaku</th>
                                <th>Status</th>
                                <th>Lokasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($dataSirs as $dataSir)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $dataSir->nama }}</td>
                                    <td>{{ $dataSir->position }}</td>
                                    <td>{{ $dataSir->no_sir }}</td>
                                    <td>{{ $dataSir->expire_date }}</td>
                                    <td>
                                        <span class="badge bg-{{ $dataSir->status === 'active' ? 'success' : ($dataSir->status === 'expired' ? 'danger' : 'warning') }}">
                                            {{ ucfirst($dataSir->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $dataSir->location }}</td>
                                    <td>
                                        <a href="{{ route('datasirs.show', $dataSir->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('datasirs.edit', $dataSir->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('datasirs.destroy', $dataSir->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data tersedia</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $dataSirs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
