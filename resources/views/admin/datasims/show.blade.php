@extends('admin.app')

@section('content')
<div class="container mt-4">
    <h2>Detail Data SIM</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $datasim->name }}</p>
            <p><strong>NIK:</strong> {{ $datasim->nik }}</p>
            <p><strong>Jabatan:</strong> {{ $datasim->position }}</p>
            <p><strong>No SIM:</strong> {{ $datasim->no_sim }}</p>
            <p><strong>Tipe SIM:</strong> {{ $datasim->type_sim }}</p>
            <p><strong>Lokasi:</strong> {{ $datasim->location }}</p>
            <p><strong>Tanggal Expired:</strong> {{ \Carbon\Carbon::parse($datasim->expire_date)->format('d M Y') }}</p>
            <p><strong>Reminder:</strong> {{ \Carbon\Carbon::parse($datasim->reminder)->format('d M Y') }}</p>
            <p><strong>Status:</strong> {{ ucfirst($datasim->status) }}</p>

            @if($datasim->foto)
                <p><strong>Foto SIM:</strong></p>
                <img src="{{ asset('storage/sim_foto/' . $datasim->foto) }}" width="200">
            @endif

            <div class="mt-3">
                <a href="{{ route('datasims.edit', $datasim->id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('datasims.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
