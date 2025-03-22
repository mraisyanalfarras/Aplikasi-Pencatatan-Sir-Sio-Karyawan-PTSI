@extends('admin.app')

@section('content')
<div class="container">
    <h3>Edit Absensi</h3>

    <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="user_id" class="form-label">Employee</label>
            <select name="user_id" id="user_id" class="form-control" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->user_id }}" {{ $attendance->user_id == $employee->user_id ? 'selected' : '' }}>
                        {{ $employee->user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="attendance_date" class="form-label">Tanggal Absensi</label>
            <input type="date" name="attendance_date" id="attendance_date" class="form-control" value="{{ $attendance->attendance_date->format('Y-m-d') }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="present" {{ $attendance->status == 'present' ? 'selected' : '' }}>Hadir</option>
                <option value="absent" {{ $attendance->status == 'absent' ? 'selected' : '' }}>Tidak Hadir</option>
                <option value="on_leave" {{ $attendance->status == 'on_leave' ? 'selected' : '' }}>Izin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Perbarui</button>
    </form>
</div>
@endsection