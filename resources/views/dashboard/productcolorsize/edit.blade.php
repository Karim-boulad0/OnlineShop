@extends('dashboard.layout.layout')

@section('body')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3> {{ __('words.Products') }}
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
                        <h5> {{ __('words.EditProduct') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="digital-add needs-validation">
                            <form action="{{ route('productcolorsizes.update', $productcolorsize->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="col-12">

                                    @if ($errors->any())
                                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                                    @endif
                                    {{-- product --}}
                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0">{{ __('words.Product') }}</label>
                                        <select name="product_id" id="" class="form-control">
                                            <option value="">{{ __('words.ChooseAProduct') }}</option>
                                            @foreach ($products as $product)
                                                <option @if ($product->id == $productcolorsize->product_id) selected @endif
                                                    value="{{ $product->id }}  ">
                                                    {{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- colors --}}
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label">
                                            {{ __('words.AvailableColors') }} </label>
                                        <select class="form-control product_color_id" name="product_color_id">
                                            <option value="">{{ __('words.ChooseColor') }}</option>

                                            @foreach ($colors as $color)
                                                <option @if ($color->id == $productcolorsize->product_color_id) selected @endif
                                                    value="{{ $color->id }}">{{ $color->color }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- sizes --}}
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label">
                                            {{ __('words.AvailableSizes') }} </label>

                                        <select class="form-control product_size_id" name="product_size_id">
                                            <option value="">{{ __('words.ChooseSize') }}</option>

                                            @foreach ($sizes as $size)
                                                <option @if ($size->id == $productcolorsize->product_size_id) selected @endif
                                                    value="{{ $size->id }}">{{ $size->size }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- quantity --}}
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0">
                                             {{ __('words.AvailableQunatity') }}</label>
                                        <input class="form-control" id="validationCustom01" type="text"
                                            name="quantity" value="{{ $productcolorsize->quantity }}">
                                    </div>
                                    {{-- descr --}}
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0">
                                          {{ __('words.ProductDescription') }} </label>
                                        <input class="form-control" id="validationCustom01" type="text"
                                            name="descr" value="{{ $productcolorsize->descr }}">
                                    </div>
                                    {{-- name --}}
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0">
                                            {{ __('words.ProductName') }}</label>
                                        <input class="form-control" id="validationCustom01" type="text"
                                            name="name" value="{{ $productcolorsize->name }}">
                                    </div>
                                    {{-- iamge --}}

                                    <div class="form-group">
                                        <label for="validationCustom05" class="col-form-label pt-0">
                                            {{ __('words.MainPhoto') }}</label>
                                        <input class="form-control dropify" id="validationCustom05" type="file"
                                            name="image">
                                    </div>
                                    {{-- price --}}
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0">
                                            {{ __('words.Price') }} </label>
                                        <input class="form-control" id="validationCustom01" type="text"
                                            name="price" value="{{ $productcolorsize->price }}">
                                    </div>
                                    {{-- discount --}}
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0">
                                            {{ __('words.Discount') }} </label>
                                        <input class="form-control" id="validationCustom01" type="text"
                                            name="discount" value="{{ $productcolorsize->discount }}">
                                    </div>
                                    {{-- status --}}
                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0">{{ __('words.Product') }}</label>
                                        <select name="status" id="" class="form-control">
                                            <option value=""> حالة المنتج{{ __('words.Status') }}</option>
                                            <option value="0">0</option>
                                            <option selected value="1">1</option>
                                        </select>
                                    </div>
                                    {{-- iamges --}}
                                    <div class="form-group">
                                        <label for="validationCustom05" class="col-form-label pt-0">
                                          {{ __('words.ProductImages') }}</label>
                                        <input class="form-control dropify" id="validationCustom05" type="file"
                                            name="images[]" multiple>
                                    </div>
                                    {{-- submit --}}
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">{{ __('words.Save') }}</button>
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
<style>
    .img-fliud {
        width: 200px;
        height: 200px;
        margin-top: 50px;
        border: solid rgb(205, 175, 169) 5px;
        border-radius: 20px
    }

    .but {
        width: 150px;
        height: 50px;
        margin-top: 130px;

    }
</style>
@foreach ($images as $image)
    <div class="row">
        <img src="{{ asset('public/' . $image->image) }}" class="img-fliud" alt="">

        <button type="button" class="btn btn-danger but" data-bs-toggle="modal"
            data-bs-target="#deleteModal{{ $image->id }}">
            {{ __('words.Delete') }}
        </button>

        <div class="modal fade" id="deleteModal{{ $image->id }}" tabindex="-1"
            aria-labelledby="deleteModalLabel{{ $image->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel{{ $image->id }}">{{ __('words.ConfirmDeletion') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ __('words.AreYouSureYouWantToDeleteThisPhoto') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('words.Close') }}</button>
                        <form id="delete-form-{{ $image->id }}"
                            action="{{ route('productcolorsizes.destroy', $image->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __('words.Delete') }}</button>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection


@section('javascript')
@endsection('javascripts')
