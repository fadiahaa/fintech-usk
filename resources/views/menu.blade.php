@extends('layouts.app')

<?php
$page = 'Menu';
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
                                Menu
                            </div>
                            <div class="col d-flex justify-content-end">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#tambah">
                                    Add Menu
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
                                            <form method="POST" action="{{ route('menu.add') }}">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control" name="name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <input type="text" class="form-control" name="desc">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Price</label>
                                                        <input type="number" class="form-control" name="price">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Stock</label>
                                                        <input type="number" class="form-control" name="stock">
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
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Menu</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangs as $key => $barang)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $barang->name }}</td>
                                        <td>{{ $barang->desc }}</td>
                                        <td>{{ $barang->price }}</td>
                                        <td>{{ $barang->stock }}</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#edit-{{ $barang->id }}">
                                                Edit
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="edit-{{ $barang->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Menu
                                                                {{ $barang->name }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="POST"
                                                            action="{{ route('menu.edit', ['id' => $barang->id]) }}">
                                                            @method("put")
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label>Name</label>
                                                                    <input type="text" class="form-control" name="name"
                                                                        value="{{ $barang->name }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Description</label>
                                                                    <input type="text" class="form-control" name="desc"
                                                                        value="{{ $barang->desc }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Price</label>
                                                                    <input type="number" class="form-control" name="price"
                                                                        value="{{ $barang->price }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Stock</label>
                                                                    <input type="number" class="form-control" name="stock"
                                                                        value="{{ $barang->stock }}">
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


                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#delete-{{ $barang->id }}">
                                                Delete
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="delete-{{ $barang->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Menu
                                                                {{ $barang->name }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body"> Are you sure you want to delete
                                                            {{ $barang->name }}?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">No</button>
                                                            <a href="{{ route('menu.delete', ['id' => $barang->id]) }}"
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
