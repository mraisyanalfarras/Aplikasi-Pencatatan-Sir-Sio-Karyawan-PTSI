@extends('admin.app')

@section('content')
<div class="container mt-4">
    <h2>Data SIM</h2>

    <a href="{{ route('datasims.create') }}" class="btn btn-primary mb-3">Tambah SIM</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- FILTER --}}
    <form method="GET" action="{{ route('datasims.index') }}" class="row mb-4 g-2">
        <div class="col-md-3">
            <input type="text" name="search" class="form-control" placeholder="Cari Nama / NIK" value="{{ request('search') }}">
        </div>
        <div class="col-md-2">
            <select name="status" class="form-control">
                <option value="">Semua Status</option>
                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="expired" {{ request('status') == 'expired' ? 'selected' : '' }}>Expired</option>
                <option value="revoked" {{ request('status') == 'revoked' ? 'selected' : '' }}>Revoked</option>
            </select>
        </div>
        <div class="col-md-2">
            <input type="date" name="expire_start" class="form-control" value="{{ request('expire_start') }}">
        </div>
        <div class="col-md-2">
            <input type="date" name="expire_end" class="form-control" value="{{ request('expire_end') }}">
        </div>
        <div class="col-md-3 text-end">
            <button class="btn btn-secondary">Filter</button>
            <a href="{{ route('datasims.index') }}" class="btn btn-outline-secondary">Reset</a>
        </div>
    </form>

    {{-- TABEL --}}
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Jabatan</th>
                <th>No SIM</th>
                <th>Tipe</th>
                <th>Lokasi</th>
                <th>Expired</th>
                <th>Reminder</th>
                <th>Status</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($datasims as $key => $sim)
            <tr>
                <td>{{ $datasims->firstItem() + $key }}</td>
                <td>{{ $sim->name }}</td>
                <td>{{ $sim->nik }}</td>
                <td>{{ $sim->position }}</td>
                <td>{{ $sim->no_sim }}</td>
                <td>{{ $sim->type_sim }}</td>
                <td>{{ $sim->location }}</td>
                <td>{{ \Carbon\Carbon::parse($sim->expire_date)->format('d M Y') }}</td>
                <td>
                    @if($sim->reminder)
                        <span class="badge bg-warning text-dark">
                            {{ \Carbon\Carbon::parse($sim->reminder)->format('d M Y') }}
                            <br>
                            <small>({{ \Carbon\Carbon::parse($sim->reminder)->diffForHumans() }})</small>
                        </span>
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </td>
                <td>
                    <span class="badge bg-{{ $sim->status === 'active' ? 'success' : ($sim->status === 'expired' ? 'danger' : 'secondary') }}">
                        {{ ucfirst($sim->status) }}
                    </span>
                </td>
                <td>
                    @if($sim->foto)
                        <img src="{{ asset('storage/' . $sim->foto) }}" alt="Foto SIM" width="50">
                    @else
                        <span class="text-muted">Tidak Ada</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('datasims.show', $sim->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('datasims.edit', $sim->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('datasims.destroy', $sim->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="12" class="text-center">Tidak ada data SIM.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $datasims->appends(request()->query())->links() }}
    </div>
</div>
@endsection
