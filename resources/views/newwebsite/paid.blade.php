@extends('newwebsite.layouts.layout')

@section('content')
    <h1>{{ $request->cart_id }}</h1>
    <form action="{{ route('orderS.store') }}" method="post">
        @csrf
        <input type="hidden" name="cart_id" value="{{ $request->cart_id }}">
        <button type="submit">Confirm</button>
    </form>


@endsection
