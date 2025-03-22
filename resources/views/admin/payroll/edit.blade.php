@extends('admin.app')
@section('content')
<div class="container">
    <h1>Edit Payroll</h1>
    
    <form action="{{ route('payroll.update', $payroll->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="user_id">Employee</label>
            <select name="user_id" id="user_id" class="form-control" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->user_id }}" {{ $employee->user_id == $payroll->user_id ? 'selected' : '' }}>
                        {{ $employee->user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" name="salary" id="salary" class="form-control" value="{{ $payroll->salary }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection