@extends('admin.app')

@section('content')
<div class="container mt-4">
    <h2>Detail Data SIR</h2>
    <a href="{{ route('datasirs.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <div class="card">
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>NIK</th>
                    <td>{{ $datasir->nik }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $datasir->nama }}</td>
                </tr>
                <tr>
                    <th>Jabatan</th>
                    <td>{{ $datasir->position }}</td>
                </tr>
                <tr>
                    <th>No SIR</th>
                    <td>{{ $datasir->no_sir }}</td>
                </tr>
                <tr>
                    <th>Tanggal Expired</th>
                    <td>{{ \Carbon\Carbon::parse($datasir->expire_date)->format('d-m-Y') }}</td>

                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ ucfirst($datasir->status) }}</td>
                </tr>
                <tr>
                    <th>Lokasi</th>
                    <td>{{ $datasir->location }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
