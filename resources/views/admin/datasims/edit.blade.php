@extends('admin.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Data SIM</h2>

    <form action="{{ route('datasims.update', $datasim->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select name="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $datasim->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>NIK</label>
            <input type="text" name="nik" class="form-control" value="{{ $datasim->nik }}" required>
        </div>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $datasim->name }}" required>
        </div>

        <div class="mb-3">
            <label>No SIM</label>
            <input type="text" name="no_sim" class="form-control" value="{{ $datasim->no_sim }}" required>
        </div>

        <div class="mb-3">
            <label>Jabatan</label>
            <input type="text" name="position" class="form-control" value="{{ $datasim->position }}" required>
        </div>

        <div class="mb-3">
            <label>Tipe SIM</label>
            <input type="text" name="type_sim" class="form-control" value="{{ $datasim->type_sim }}" required>
        </div>

        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="location" class="form-control" value="{{ $datasim->location }}" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Expired</label>
            <input type="date" name="expire_date" class="form-control" value="{{ $datasim->expire_date->format('Y-m-d') }}" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="active" {{ $datasim->status === 'active' ? 'selected' : '' }}>Aktif</option>
                <option value="expired" {{ $datasim->status === 'expired' ? 'selected' : '' }}>Expired</option>
                <option value="revoked" {{ $datasim->status === 'revoked' ? 'selected' : '' }}>Dicabut</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Foto SIM (opsional)</label>
            <input type="file" name="foto" class="form-control">
            @if($datasim->foto)
                <img src="{{ asset('storage/sim_foto/' . $datasim->foto) }}" width="100" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('datasims.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
