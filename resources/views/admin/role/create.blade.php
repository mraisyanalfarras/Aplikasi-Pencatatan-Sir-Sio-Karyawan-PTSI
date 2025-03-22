@extends('admin.app')

@section('content')
<div class="container">
    <h3>Create New Role</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Role Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Role Name" required>
        </div>

        <div class="mb-3">
            <label for="permissions" class="form-label">Permissions</label>
            <div>
                @foreach($permissions as $permission)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permissions[{{$permission->id}}]" value="{{ $permission->name }}" id="{{ $permission->id }}">
                        <label class="form-check-label" for="{{ $permission->id }}">
                            {{ ucfirst($permission->name) }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
