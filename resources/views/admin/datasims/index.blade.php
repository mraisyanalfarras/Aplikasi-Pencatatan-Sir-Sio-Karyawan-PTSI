@extends('admin.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="text-primary fw-bold">Data SIM Working Progres </h4>
        <a href="{{ route('datasims.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Data
        </a>
    </div>

    <div class="card shadow-lg rounded-3">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>No SIM</th>
                        <th>Posisi</th>
                        <th>Tipe SIM</th>
                        <th>Lokasi</th>
                        <th>Masa Berlaku</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataSims as $index => $dataSim)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($dataSim->foto)
                                <img src="{{ asset('storage/' . $dataSim->foto) }}" alt="Foto SIM" width="50" height="50" class="rounded-circle">
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>
                        <td>{{ $dataSim->nik }}</td>
                        <td>{{ $dataSim->name }}</td>
                        <td>{{ $dataSim->no_sim }}</td>
                        <td>{{ $dataSim->position }}</td>
                        <td>{{ $dataSim->type_sim }}</td>
                        <td>{{ $dataSim->location }}</td>
                        <td>{{ \Carbon\Carbon::parse($dataSim->expire_date)->format('d-m-Y') }}</td>
                        <td>
                            <span class="badge bg-{{ $dataSim->status == 'active' ? 'success' : ($dataSim->status == 'expired' ? 'danger' : 'warning') }}">
                                {{ ucfirst($dataSim->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('datasims.edit', $dataSim->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('datasims.destroy', $dataSim->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $dataSims->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
