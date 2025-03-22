@extends('admin.app')
@section('content')
<div class="container">
    <h1>Add Payroll</h1>
    
    <form action="{{ route('payroll.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="user_id">Employee</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Select Employee</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->user_id }}">{{ $employee->user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" name="salary" id="salary" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection