@extends('admin.app')

@section('content')
<div class="container mt-4">
    <h2>Data SIR</h2>
    <a href="{{ route('datasirs.create') }}" class="btn btn-primary mb-3">Tambah Data SIR</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>No SIR</th>
                <th>Tanggal Expired</th>
                <th>Status</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataSirs as $key => $sir)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $sir->nik }}</td>
                <td>{{ $sir->nama }}</td>
                <td>{{ $sir->position }}</td>
                <td>{{ $sir->no_sir }}</td>
                <td>{{ $sir->expire_date->format('d-m-Y') }}</td>
                <td>{{ ucfirst($sir->status) }}</td>
                <td>{{ $sir->location }}</td>
                <td>
                    <a href="{{ route('datasirs.show', $sir->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('datasirs.edit', $sir->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('datasirs.destroy', $sir->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    {{ $dataSirs->links() }}
</div>
@endsection
