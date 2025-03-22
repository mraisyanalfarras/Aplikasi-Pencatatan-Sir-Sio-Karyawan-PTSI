@extends('admin.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-3">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title text-primary fw-bold">
                        <i class="fas fa-eye me-2"></i>Detail Data SIO
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr><th>NIK User</th><td>{{ $dataSio->user->nik }} - {{ $dataSio->user->name }}</td></tr>
                        <tr><th>Nama</th><td>{{ $dataSio->name }}</td></tr>
                        <tr><th>Posisi</th><td>{{ $dataSio->position }}</td></tr>
                        <tr><th>No SIO</th><td>{{ $dataSio->no_sio }}</td></tr>
                        <tr><th>Tipe</th><td>{{ $dataSio->type }}</td></tr>
                        <tr><th>Kelas</th><td>{{ $dataSio->class }}</td></tr>
                        <tr><th>Masa Berlaku</th><td>{{ $dataSio->expire_date }}</td></tr>
                        <tr><th>Status</th><td>{{ ucfirst($dataSio->status) }}</td></tr>
                        <tr><th>Lokasi</th><td>{{ $dataSio->location }}</td></tr>
                    </table>
                    <div class="text-end">
                        <a href="{{ route('datasios.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
