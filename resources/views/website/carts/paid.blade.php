@extends('website.layouts.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('website/css/categories.css') }}">
@endsection
@section('content')
    <h1>{{ $request->cart_id }}</h1>
    <form action="{{ route('orderS.store') }}" method="post">
        @csrf
        <input type="hidden" name="cart_id" value="{{ $request->cart_id }}">
        <button type="submit">Confirm</button>
    </form>

@section('js')
    <script src="{{ asset('website/js/categories.js') }}"></script>
@endsection
@endsection
