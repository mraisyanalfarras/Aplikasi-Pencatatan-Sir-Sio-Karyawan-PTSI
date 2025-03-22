@extends('admin.app')

@section('content')
<div class="container">
    <h1>Add New Employee</h1>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <!-- User Name Input -->
        <div class="form-group">
            <label for="name">Enter User Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <!-- User Email Input -->
        <div class="form-group">
            <label for="email">Enter User Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <!-- Department Selection -->
        <div class="form-group">
            <label for="department_id">Select Department</label>
            <select name="department_id" class="form-control" required>
                <option value="">-- Select Department --</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Address -->
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" required>
        </div>

        <!-- Place of Birth -->
        <div class="form-group">
            <label for="place_of_birth">Place of Birth</label>
            <input type="text" name="place_of_birth" class="form-control">
        </div>

        <!-- Date of Birth -->
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" class="form-control">
        </div>

        <!-- Religion -->
        <div class="form-group">
            <label for="religion">Religion</label>
            <select name="religion" class="form-control">
                <option value="Islam">Islam</option>
                <option value="Katolik">Katolik</option>
                <option value="Protestan">Protestan</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
                <option value="Konghucu">Konghucu</option>
            </select>
        </div>

        <!-- Gender -->
        <div class="form-group">
            <label for="sex">Gender</label>
            <select name="sex" class="form-control">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <!-- Phone -->
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" required>
        </div>

        <!-- Salary -->
        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="text" name="salary" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
