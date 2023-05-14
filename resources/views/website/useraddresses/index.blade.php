@extends('website.layouts.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('website/css/categories.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1>User Addresses</h1>
            <hr>

            @foreach ($useraddress as $address)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $address->full_name }}</h5>
                        <p class="card-text">{{ $address->address }}, {{ $address->city }}, {{ $address->country }}</p>
                        <p class="card-text"><strong>Phone:</strong> {{ $address->phone }}</p>
                        <p class="card-text"><strong>Email:</strong> {{ $address->email }}</p>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('useraddresse.edit', $address->id) }}" class="btn btn-primary me-2">Edit</a>
                            <form action="{{ route('useraddresse.destroy', $address->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('website/js/categories.js') }}"></script>
@endsection
