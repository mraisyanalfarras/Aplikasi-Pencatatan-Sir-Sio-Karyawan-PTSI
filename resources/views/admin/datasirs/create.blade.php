@extends('admin.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-3">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title text-primary fw-bold">
                        <i class="fas fa-plus me-2"></i>Tambah Data SIR
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('datasirs.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="user_id" class="form-label">NIK User</label>
                            <input type="text" id="user_search" class="form-control" placeholder="Cari NIK...">
                            <select name="user_id" id="user_id" class="form-select mt-2" required>
                                <option value="">Pilih User</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->nik }} - {{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label">Posisi</label>
                            <input type="text" name="position" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_sir" class="form-label">No SIR</label>
                            <input type="text" name="no_sir" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="expire_date" class="form-label">Masa Berlaku</label>
                            <input type="date" name="expire_date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="reminder" class="form-label">Pengingat</label>
                            <input type="date" name="reminder" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" class="form-select" required>
                                <option value="active">Aktif</option>
                                <option value="expired">Kadaluarsa</option>
                                <option value="revoked">Dicabut</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Lokasi</label>
                            <input type="text" name="location" class="form-control" required>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('datasirs.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
