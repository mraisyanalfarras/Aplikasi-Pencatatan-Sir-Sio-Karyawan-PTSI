@extends('admin.app')

@section('content')
<div class="container">
    <h3>Roles</h3>

    @can('create roles')
    <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Tambah Role</a>
    @endcan

    <table class="table table-sm table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Role</th>
                <th>Permission</th>
                <th>Actions</th> <!-- Kolom aksi untuk edit dan delete -->
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $loop->iteration }}</td> <!-- Iteration for numbering -->
                    <td>{{ $role->name }}</td> <!-- Menampilkan nama role -->
                    <td> @foreach($role->permissions as $permission)
                    <span class="badge bg-primary">{{ $permission->name }}</span>
                        @endforeach
                    <td>
                        <!-- Edit Button -->
                        @can('edit roles')
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">Edit</a>
                        @endcan

                        <!-- Delete Button -->
                        @can('delete roles')
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this role?')">Delete</button>
                        </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection