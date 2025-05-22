@extends('admin.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Detail Pengguna</h2>
        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <strong>Informasi Pengguna</strong>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <tbody>
                        <tr>
                            <th style="width: 30%;">NIK</th>
                            <td>{{ $user->nik }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td>{{ \Carbon\Carbon::parse($user->tanggal)->format('d M Y') }}</td>
                        </tr>
                        <tr>
                            <th>Posisi</th>
                            <td>{{ $user->position }}</td>
                        </tr>
                        <tr>
                            <th>Jadwal Masuk</th>
                            <td>{{ $user->masuk_jadwal }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Mulai Kerja</th>
                            <td>{{ \Carbon\Carbon::parse($user->mulai_kerja)->format('d M Y') }}</td>
                        </tr>
                        <tr>
                            <th>Riwayat Kecelakaan</th>
                            <td>{{ $user->kecelakaan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <td>
                                @foreach ($user->roles as $role)
                                    <span class="badge bg-success">{{ $role->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Dibuat Pada</th>
                            <td>{{ $user->created_at->format('d M Y, H:i') }}</td>
                        </tr>
                    </tbody>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h5 class="fw-bold text-primary">Gambar Dokumen Pengguna</h5>
                            <div class="row">
                                @foreach($user->datasims as $sim)
                                    @if($sim->foto_sim)
                                    <div class="col-md-3 mb-3">
                                        <div class="card shadow-sm">
                                            <img src="{{ asset('storage/' . $sim->foto_sim) }}" class="card-img-top img-fluid" alt="Foto SIM">
                                            <div class="card-body text-center">
                                                <small class="text-muted">Foto SIM</small>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach

                                @foreach($user->datasios as $sio)
                                    @if($sio->foto_sio)
                                    <div class="col-md-3 mb-3">
                                        <div class="card shadow-sm">
                                            <img src="{{ asset('storage/' . $sio->foto_sio) }}" class="card-img-top img-fluid" alt="Foto SIO">
                                            <div class="card-body text-center">
                                                <small class="text-muted">Foto SIO</small>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach

                                @foreach($user->dataSirs as $sir)
                                    @if($sir->foto_sir)
                                    <div class="col-md-3 mb-3">
                                        <div class="card shadow-sm">
                                            <img src="{{ asset('storage/' . $sir->foto_sir) }}" class="card-img-top img-fluid" alt="Foto SIR">
                                            <div class="card-body text-center">
                                                <small class="text-muted">Foto SIR</small>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
