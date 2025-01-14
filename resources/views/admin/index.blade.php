@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/edit.css') }}">

<div class="admin_container">
    <h2 class="text-center">User Management</h2>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <!-- Add New User Form -->
    <div class="card mb-4">
        <div class="card-header">Add New User</div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.store') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" required>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="is_admin" value="1">
                    <label class="form-check-label">Make Admin</label>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Add User</button>
            </form>
        </div>
    </div>

    <div class="card user-list-card">
        <div class="card-header">All Users</div>
        <div class="card-body">
            <table class="table user-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><a href="{{ route('profile', $user->id) }}">{{ e($user->name) }}</a></td>
                            <td>{{ e($user->email) }}</td>
                            <td>{{ ($user->is_admin ? 'Admin' : 'User')}}</td>
                            <td>
                                @if(!$user->is_admin)
                                    <form method="POST" action="{{ route('admin.promote', $user->id) }}" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-primary btn-sm">Promote to Admin</button>
                                    </form>
                                @else
                                    <span class="text-muted">Admin</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
