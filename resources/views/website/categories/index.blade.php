@extends('website.layouts.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('website/css/categories.css') }}">
@endsection
@section('content')
    <style>
        img {
            border: 1px solid #ddd;
            border-radius: 20px;
            padding: 5px;
        }
    </style>
    <div class="container mt-4">
        <h1 class="text-center mb-4">الأقسام</h1>
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{ asset('public/' . $category->image) }}" class="card-img-top"
                            alt="{{ $category->name }}" />
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->name }}</h5>
                            <p class="card-text">{{ $category->description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('website.product', $category->id) }}" class="btn btn-sm btn-primary">
                                        عرض المنتجات
                                    </a>
                                </div>
                                <small class="text-muted">{{ $category->products->count() }} product sections</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@section('js')
    <script src="{{ asset('website/js/categories.js') }}"></script>
@endsection
@endsection
