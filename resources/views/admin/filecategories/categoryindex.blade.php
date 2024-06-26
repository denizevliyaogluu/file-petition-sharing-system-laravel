@extends('layouts.master')

@section('title', 'Admin File Categories')

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
                    <a href="{{ route('admin.filecategories.create') }}" class="btn btn-dark">Add Category</a>
                </div>

                <table class="table table-striped table-hover">
                    <thead class="thead">
                        <tr>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($flc as $fc)
                            <tr>
                                <td>{{ $fc->name }}</td>
                                <td>
                                    <a href="{{ route('admin.filecategories.update', $fc->id) }}"
                                        class="btn btn-secondary btn-sm mr-2">Edit</a>
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
