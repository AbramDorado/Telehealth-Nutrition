@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Users</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Pin Code</th>
                <th>Permissions</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->pin_code }}</td>
                <td>{{ $user->permissions }}</td>
                <td>
                    @if ($user->name != 'Admin')
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteUserModal{{ $user->id }}">
                            <i class="fas fa-trash"></i> 
                        </button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <!-- Button to trigger the add user pop-up -->
    <button class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
        Add User
    </button>
</div>

@foreach($users as $user)
    @if ($user->name != 'Admin')
        <!-- Pop-up modal for deleting the user -->
        <div class="modal fade" id="deleteUserModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel{{ $user->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteUserModalLabel{{ $user->id }}">Delete User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form for confirming user deletion -->
                        <form method="POST" action="{{ route('delete_user', ['id' => $user->id]) }}">
                            @csrf
                            @method('DELETE')
                            <p>Are you sure you want to delete this user?</p>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach
</div>

<!-- Pop-up modal for adding a new user -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for adding a new user -->
                <form method="POST" action="{{ route('store_user') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for "pin_code">Pin Code</label>
                        <input type="text" name="pin_code" id="pin_code" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="permissions">Permissions</label>
                        <textarea name="permissions" id="permissions" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add User</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
