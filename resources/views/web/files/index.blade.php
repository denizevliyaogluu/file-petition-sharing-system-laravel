@extends('layouts.master')

@section('title', 'Files')

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
        .card {
            margin-bottom: 20px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            width: 100%;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        .card-text {
            font-size: 1rem;
            color: #555;
        }

        .city-icon {
            font-size: 1.5rem;
            margin-right: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
            transform: translateY(-2px);
        }

        .card-link {
            cursor: pointer;
        }
    </style>

<div class="container mt-2">
    <div class="row">
        <div class="col-md-3">
            <h3>Categories</h3>
            <ul class="list-group">
                <li class="list-group-item"><a href="{{ route('web.files.index') }}">All</a></li>
                @foreach ($categories as $category)
                    <li class="list-group-item"><a href="{{ route('web.files.index', ['category_id' => $category->id]) }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-9">
            <div class="row">
                @foreach ($files as $file)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            @if ($file->file)
                                <a href="{{ asset($file->file) }}" target="_blank">
                                    <iframe src="{{ asset($file->file) }}" frameborder="0" style="width: 100%; height: 200px;"></iframe>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $file->title }}</h5>
                                        <p>{{ $file->getCategory->name }}</p>
                                        <p>{{ $file->description }}</p>
                                    </div>
                                </a>
                            @else
                                <a href="#">
                                    <img src="/upload/files/noimage.jpg" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $file->title }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $file->title }}</h5>
                                        <p>{{ $file->description }}</p>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
