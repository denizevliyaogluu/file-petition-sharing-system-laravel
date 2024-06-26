@extends('layouts.master')

@section('title', 'Admin Files')

@section('content')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <div class="col-lg-8 mx-auto">
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif
    
        @if (session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif
    </div>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .content-container {
            margin-top: 50px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-dark {
            background-color: #343a40;
            border-color: #343a40;
        }

        .btn-dark:hover {
            background-color: #23272b;
            border-color: #1d2124;
        }

        .table {
            margin-top: 20px;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .card-img-top {
            border-radius: 5px;
        }

        .modal-content {
            border-radius: 10px;
        }

        .modal-header {
            background-color: #343a40;
            color: #fff;
            border-bottom: none;
        }

        .modal-title {
            font-size: 1.5rem;
        }

        .close {
            color: #fff;
        }
    </style>

<div class="container content-container">
    <div class="row">
        <div class="col-lg-12">
            <div class="text-right mb-3">
                <a href="{{ route('admin.files.create') }}" class="btn btn-dark">Add File</a>
            </div>

            <table class="table table-striped table-hover">
                <thead class="thead">
                    <tr>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fl as $f)
                        <tr>
                            <td><a href="{{ asset($f->file) }}" target="_blank">{{ $f->title }}</a></td>
                            <td>
                                @if ($f->status == 0)
                                    <button class="btn btn-secondary btn-sm mr-2" disabled>Edit</button>
                                @else
                                    <a href="{{ route('admin.files.update', $f->id) }}" class="btn btn-secondary btn-sm mr-2">Edit</a>
                                @endif
                                {{-- <a href="{{ route('admin.fs.delete', $f->id) }}" class="btn btn-sm btn-dark" onclick="return confirm('Are you sure?')">Delete</a> --}}
                                @if ($f->status == 1)
                                    <a href="{{ route('admin.files.closefl', $f->id) }}" class="btn btn-sm btn-dark" onclick="return confirm('Are you sure?')">Close</a>
                                @else
                                    <button type="button" class="btn btn-dark btn-sm">Closed</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
