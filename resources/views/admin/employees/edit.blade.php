<!-- resources/views/employees/edit.blade.php -->
@extends('admin.app')

@section('content')
<div class="container">
    <h1>Edit Employee</h1>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- User Selection -->
        <div class="form-group">
            <label for="user_id">User</label>
            <select name="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $employee->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Department Selection -->
        <div class="form-group">
            <label for="department_id">Department</label>
            <select name="department_id" class="form-control" required>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ $employee->department_id == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Address -->
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" value="{{ $employee->address }}" required>
        </div>

        <!-- Place of Birth -->
        <div class="form-group">
            <label for="place_of_birth">Place of Birth</label>
            <input type="text" name="place_of_birth" class="form-control" value="{{ $employee->place_of_birth }}">
        </div>

        <!-- Date of Birth -->
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" class="form-control" value="{{ $employee->dob }}">
        </div>

        <!-- Religion -->
        <div class="form-group">
            <label for="religion">Religion</label>
            <select name="religion" class="form-control" required>
                <option value="Islam" {{ $employee->religion == 'Islam' ? 'selected' : '' }}>Islam</option>
                <option value="Katolik" {{ $employee->religion == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                <option value="Protestan" {{ $employee->religion == 'Protestan' ? 'selected' : '' }}>Protestan</option>
                <option value="Hindu" {{ $employee->religion == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                <option value="Budha" {{ $employee->religion == 'Budha' ? 'selected' : '' }}>Budha</option>
                <option value="Konghucu" {{ $employee->religion == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
            </select>
        </div>

        <!-- Sex -->
        <div class="form-group">
            <label for="sex">Sex</label>
            <select name="sex" class="form-control" required>
                <option value="Male" {{ $employee->sex == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $employee->sex == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <!-- Phone -->
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $employee->phone }}" required>
        </div>

        <!-- Salary -->
        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" name="salary" class="form-control" value="{{ $employee->salary }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
