@extends('dashboard.layout.layout')

@section('body')
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
                            <h3>{{ __('words.EditCategory') }}
                            </h3>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">



                        </div>

                        <div class="card-body">

                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="table-responsive table-desi">
                                    <form class="needs-validation" action="{{ route('categories.update', $category->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        <div class="form">
                                            @csrf
                                            @method('put')
                                            <div class="form-group">
                                                <label for="validationCustom01" class="mb-1">{{ __('words.Name') }}</label>
                                                <input class="form-control" id="validationCustom01" type="text"
                                                    name="name" value="{{ $category->name }}">
                                            </div>

                                            @if ($category->child_count < 1)
                                                <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">{{ __('words.MainCategory') }}  </label>
                                                    <select name="parent_id" id="" class="form-control">
                                                        <option value=""
                                                            @if ($category->parent_id == null) selected @endif>{{ __('words.MainCategory') }}
                                                        </option>
                                                        @foreach ($maincategories as $item)
                                                            <option value="{{ $category->id }}"
                                                                @if ($item->id == $category->parent_id) selected @endif>
                                                                {{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endif
                                            <style>
                                                img {
                                                    border: 1px solid #ddd;
                                                    border-radius: 20px;
                                                    padding: 5px;
                                                }
                                            </style>
                                            <div class="form-group mb-0">
                                                <img src="{{ asset('public/' . $category->image) }}" class="w-25">
                                                <label for="validationCustom02" class="mb-1">{{ __('words.Image') }} </label>
                                                <input class="form-control dropify" id="validationCustom02" type="file"
                                                    name="image" data-default-file="">
                                            </div>



                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="submit">Save</button>
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
    @endsection
