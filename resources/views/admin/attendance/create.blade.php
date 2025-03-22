@extends('admin.app')

@section('content')
<div class="container">
    <h3>Tambah Absensi</h3>

    <form action="{{ route('attendance.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="user_id" class="form-label">Employee</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Select Employee</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->user_id }}">{{ $employee->user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="attendance_date" class="form-label">Tanggal Absensi</label>
            <input type="date" name="attendance_date" id="attendance_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="present">Hadir</option>
                <option value="absent">Tidak Hadir</option>
                <option value="on_leave">Izin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection