@extends('newwebsite.layouts.layout')
@section('content')
    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">
            @include('newwebsite.layouts.siedbar')
            <form action="{{route('site.search')}}" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q"
                        placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Content -->
@endsection
