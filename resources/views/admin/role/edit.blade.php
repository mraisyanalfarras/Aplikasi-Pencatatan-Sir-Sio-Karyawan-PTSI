@extends('admin.app')

@section('content')
<div class="container">
    <h3>Edit Role: {{ $role->name }}</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Metode PUT untuk update data -->

        <div class="mb-3">
            <label for="name" class="form-label">Role Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Role Name" value="{{ $role->name }}" required>
        </div>

        <div class="mb-3">
            <label for="permissions" class="form-label">Permissions</label>
            <div>
                @foreach($permissions as $permission)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permissions[{{$permission->id}}]" value="{{ $permission->name }}" id="{{ $permission->id }}"
                        {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{ $permission->id }}">
                            {{ ucfirst($permission->name) }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection