@extends('dashboard.layout.layout')

@section('body')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
<style>
    img {
        border: 1px solid #ddd;
        border-radius: 20px;
        padding: 5px;
    }
</style>
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3> {{__('words.Users')}}
                        </h3>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row product-adding">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{__('words.AddNewUser')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="digital-add needs-validation">
                            <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">

                                    @if ($errors->any())
                                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                                    @endif


                                    {{-- name --}}
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0">
                                          {{__('words.Name')}}</label>
                                        <input class="form-control" id="validationCustom01" type="text"
                                            name="name" required>
                                    </div>
                                    {{-- email  --}}
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0">
                                           {{__('words.Email')}} </label>
                                        <input class="form-control" id="validationCustom01" type="text"
                                            name="email" required>
                                    </div>
                                    {{-- password --}}
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0">
                                             {{__('words.Password')}}</label>
                                        <input class="form-control" id="validationCustom01" type="password"
                                            name="password" required>
                                    </div>
                                    {{-- type --}}
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0">
                                           {{__('words.Type')}} </label>

                                        <select name="type" id="" class="form-control">

                                            <option value="" selected>{{__('words.Type')}}</option>
                                            <option value="admin">admin</option>
                                            <option value="user">user</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- profile --}}
                                <div class="form-group">
                                    <label for="validationCustom01" class="col-form-label pt-0">
                                        {{__('words.Profile')}} </label>
                                    <input class="form-control" id="validationCustom01" type="file" name="profile"
                                        required>
                                </div>
                                {{-- submit --}}
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">{{__('words.Save')}}</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>
</div>
@endsection


@section('javascript')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection('javascripts')
