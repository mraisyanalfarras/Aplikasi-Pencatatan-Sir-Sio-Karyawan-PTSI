@extends('admin.app')

@section('content')
<div class="container">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3">Dashboard</h1>
            <p class="text-muted">Selamat datang di Dashboard Admin. Kelola informasi perusahaan dengan mudah dan efisien.</p>
        </div>
    </div>

    <!-- Dashboard Cards -->
    <div class="row">
        <!-- Card: Employees -->
        @can('show employees')
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 border-left-success shadow-sm border-0">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Karyawan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $employees_count ?? 0 }} Karyawan</div>
                            <p class="mt-2 mb-0">Total karyawan aktif</p>
                        </div>
                        <div class="col-auto">
                            <i class="bx bx-user fa-2x text-success"></i>
                        </div>
                    </div>
                    <a href="{{ route('employees.index') }}" class="btn btn-success btn-sm mt-3">Kelola Karyawan</a>
                </div>
            </div>
        </div>
        @endcan

        <!-- Card: Patients -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 border-left-secondary shadow-sm border-0">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Pasien</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pasiens_count ?? 0 }} Pasien</div>
                            <p class="mt-2 mb-0">Total pasien terdaftar</p>
                        </div>
                        <div class="col-auto">
                            <i class="bx bx-user-plus fa-2x text-secondary"></i>
                        </div>
                    </div>
                    {{-- <a href="{{ route('pasiens.index') }}" class="btn btn-secondary btn-sm mt-3">Kelola Pasien</a> --}}
                </div>
            </div>
        </div>

        
        
        <!-- Card: Frames -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 border-left-dark shadow-sm border-0">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Frame</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $frames_count ?? 0 }} Frame</div>
                            <p class="mt-2 mb-0">Total frame tersedia</p>
                        </div>
                        <div class="col-auto">
                            <i class="bx bx-glasses fa-2x text-dark"></i>
                        </div>
                    </div>
                    {{-- <a href="{{ route('frames.index') }}" class="btn btn-dark btn-sm mt-3">Kelola Frame</a> --}}
                </div>
            </div>
        </div>

        <!-- Card: Lenses -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 border-left-purple shadow-sm border-0">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-purple text-uppercase mb-1">Lensa</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $lensas_count ?? 0 }} Lensa</div>
                            <p class="mt-2 mb-0">Total lensa tersedia</p>
                        </div>
                        <div class="col-auto">
                            <i class="bx bx-circle fa-2x text-purple"></i>
                        </div>
                    </div>
                    {{-- <a href="{{ route('lensas.index') }}" class="btn btn-purple btn-sm mt-3">Kelola Lensa</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
