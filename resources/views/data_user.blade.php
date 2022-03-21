@extends('layouts.app')

<?php
$page = 'Data User';
?>

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                Users Data
                            </div>
                            <div class="col d-flex justify-content-end">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#tambah">
                                    Add User
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="{{ route('data_user.add') }}">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            name="name">

                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            name="email">

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            name="password">

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password Confirmation</label>
                                                        <input type="password" class="form-control"
                                                            name="password_confirmation">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Role</label>
                                                        <select class="form-select @error('role_id') is-invalid @enderror"
                                                            name="role_id">
                                                            <option value="">Select Role</option>
                                                            <option value="1">Administrator</option>
                                                            <option value="2">Bank</option>
                                                            <option value="3">Canteen</option>
                                                            <option value="4">Student</option>
                                                        </select>

                                                        @error('role_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered border-primary">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Balance</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role->name }}</td>
                                        <td>{{ $user->role->id == 4 ? $user->saldo->saldo : '-' }}</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#edit-{{ $user->id }}">
                                                Edit
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="edit-{{ $user->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit User
                                                                {{ $user->name }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="POST"
                                                            action="{{ route('data_user.edit', ['id' => $user->id]) }}">
                                                            @method("put")
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label>Nama</label>
                                                                    <input type="text" class="form-control" name="name"
                                                                        value="{{ $user->name }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input type="email" class="form-control" name="email"
                                                                        value="{{ $user->email }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Password</label>
                                                                    <input type="password" class="form-control"
                                                                        name="password" placeholder="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Passwod Confirmation</label>
                                                                    <input type="password" class="form-control"
                                                                        name="password_confirmation" placeholder="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Role</label>
                                                                    <select class="form-select" name="role_id">
                                                                        <option value="">Select Role</option>
                                                                        <option value="1"
                                                                            {{ $user->role_id == '1' ? 'selected' : '' }}>
                                                                            Administrator</option>
                                                                        <option value="2"
                                                                            {{ $user->role_id == '2' ? 'selected' : '' }}>
                                                                            Bank</option>
                                                                        <option value="3"
                                                                            {{ $user->role_id == '3' ? 'selected' : '' }}>
                                                                            Canteen</option>
                                                                        <option value="4"
                                                                            {{ $user->role_id == '4' ? 'selected' : '' }}>
                                                                            Student</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-warning">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#delete-{{ $user->id }}">
                                                Delete
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="delete-{{ $user->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus User
                                                                {{ $user->name }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete {{ $user->name }}?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">No</button>
                                                            <a href="{{ route('data_user.delete', ['id' => $user->id]) }}"
                                                                type="submit" class="btn btn-primary">Yes</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
