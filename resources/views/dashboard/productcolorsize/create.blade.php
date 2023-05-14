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
                        <h5> {{ __('words.AddaNewProductWithColorAndSize') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="digital-add needs-validation">
                            <form action="{{ route('productcolorsizes.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="col-12">

                                    @if ($errors->any())
                                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                                    @endif
                                    {{-- product --}}
                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0">المنتج</label>
                                        <select name="product_id" id="" class="form-control">
                                            <option value="">{{ __('words.ChooseAProduct') }}</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- colors --}}
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label">
                                             {{ __('words.AvailableColors') }}</label>
                                        <select class="form-control product_color_id" name="product_color_id">
                                            <option value="">{{ __('words.ChooseColor') }}</option>

                                            @foreach ($colors as $color)
                                                <option value="{{ $color->id }}">{{ $color->color }}</option>
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
                                                <option value="{{ $size->id }}">{{ $size->size }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- quantity --}}
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0">
                                             {{ __('words.AvailableQunatity') }}</label>
                                        <input class="form-control" id="validationCustom01" type="text"
                                            name="quantity">
                                    </div>
                                    {{-- descr --}}
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0">
                                        {{ __('words.ProductDescription') }}</label>
                                        <input class="form-control" id="validationCustom01" type="text"
                                            name="descr">
                                    </div>
                                    {{-- name --}}
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0">
                                             {{ __('words.ProductName') }}</label>
                                        <input class="form-control" id="validationCustom01" type="text"
                                            name="name">
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
                                            name="price">
                                    </div>
                                    {{-- discount --}}
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0">
                                             {{ __('words.Discount') }}</label>
                                        <input class="form-control" id="validationCustom01" type="text"
                                            name="discount">
                                    </div>
                                    {{-- status --}}
                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0"> {{ __('words.Product') }}</label>
                                        <select name="status" id="" class="form-control">
                                            <option value=""> {{ __('words.Status') }}</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
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
@endsection


@section('javascript')
@endsection('javascripts')
