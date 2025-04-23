@extends('admin.app')

@section('content')
<div class="container">
   <!-- Card: Header -->
<div class="card shadow-sm mb-4" style="background-color: #003366;"> {{-- Biru Tua --}}
    <div class="card-body">
        <h1 class="h3 text-white">Dashboard</h1>
        <p class="text-white">Selamat datang di Dashboard Admin. Kelola informasi perusahaan dengan mudah dan efisien.</p>
    </div>
</div>


    <div class="row">
      <!-- Data SIM -->
<div class="col-lg-4 col-md-6 mb-4">
    <div class="card h-100 shadow-sm" style="background-color: #e6f4ea;"> {{-- Hijau Muda --}}
        <div class="card-body d-flex flex-column justify-content-between">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data SIM</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $simExpiringSoon->count() }} SIM</div>
                   
                </div>
                <i class="bx bx-id-card fa-2x text-success"></i>
            </div>
            <div class="mt-3 text-end">
                <a href="{{ route('datasims.index') }}" class="btn btn-sm btn-success">Lihat Detail</a>
            </div>
        </div>
    </div>
</div>

<!-- Data SIO -->
<div class="col-lg-4 col-md-6 mb-4">
    <div class="card h-100 shadow-sm" style="background-color: #fff9e6;"> {{-- Kuning Muda --}}
        <div class="card-body d-flex flex-column justify-content-between">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Data SIO</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $sioExpiringSoon->count() }} SIO</div>
                   
                </div>
                <i class="bx bx-shield fa-2x text-warning"></i>
            </div>
            <div class="mt-3 text-end">
                <a href="{{ route('datasios.index') }}" class="btn btn-sm btn-warning text-dark">Lihat Detail</a>
            </div>
        </div>
    </div>
</div>

<!-- Data SIR -->
<div class="col-lg-4 col-md-6 mb-4">
    <div class="card h-100 shadow-sm" style="background-color: #ffecec;"> {{-- Merah Muda --}}
        <div class="card-body d-flex flex-column justify-content-between">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Data SIR</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $sirExpiringSoon->count() }} SIR</div>
                    
                </div>
                <i class="bx bx-bookmark fa-2x text-danger"></i>
            </div>
            <div class="mt-3 text-end">
                <a href="{{ route('datasirs.index') }}" class="btn btn-sm btn-danger">Lihat Detail</a>
            </div>
        </div>
    </div>
</div>

    </div>
    

    <!-- Card: Tabel List Expired -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white">
            <h6 class="m-0">Daftar Dokumen Mendekati Expired</h6>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="thead-light">
                    <tr class="text-center">
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Tanggal Expired</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($simExpiringSoon as $sim)
                        <tr>
                            <td>{{ $sim->nik }}</td>
                            <td>{{ $sim->name }}</td>
                            <td class="text-center">
                                <span class="badge bg-success"><i class="bx bx-id-card me-1"></i>SIM</span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($sim->expire_date)->format('d-m-Y') }}</td>
                        </tr>
                    @endforeach
                    @foreach($sioExpiringSoon as $sio)
                        <tr>
                            <td>{{ $sio->nik }}</td>
                            <td>{{ $sio->name }}</td>
                            <td class="text-center">
                                <span class="badge bg-warning text-dark"><i class="bx bx-shield me-1"></i>SIO</span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($sio->expire_date)->format('d-m-Y') }}</td>
                        </tr>
                    @endforeach
                    @foreach($sirExpiringSoon as $sir)
                        <tr>
                            <td>{{ $sir->nik }}</td>
                            <td>{{ $sir->nama }}</td>
                            <td class="text-center">
                                <span class="badge bg-danger"><i class="bx bx-bookmark me-1"></i>SIR</span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($sir->expire_date)->format('d-m-Y') }}</td>
                        </tr>
                    @endforeach
                    @if($simExpiringSoon->isEmpty() && $sioExpiringSoon->isEmpty() && $sirExpiringSoon->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center text-muted">Tidak ada data yang akan expired dalam 3 bulan ke depan.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
