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
                        <h3> {{ __('words.EditProduct') }}
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

                    <div class="card-body">
                        <div class="digital-add needs-validation">
                            <form action="{{ route('products.update', $product->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="col-12">

                                    @if ($errors->any())
                                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                                    @endif

                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0">{{ __('words.Category') }}</label>

                                        <select name="category_id" id="" class="form-control" required>
                                            <option value="">{{ __('words.ChooseAProduct') }}</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    @if ($category->id == $product->category_id) selected @endif>
                                                    {{ $category->name }}</option>
                                                @foreach ($category->child as $child)
                                                    <option value="{{ $child->id }}"
                                                        @if ($child->id == $product->category_id) selected @endif>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;{{ $child->name }}</option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="validationCustom05" class="col-form-label pt-0">
                                            {{ __('words.MainPhoto') }}</label>
                                        <input class="form-control dropify" id="validationCustom05" type="file"
                                            name="image">
                                    </div>


                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0">
                                            {{ __('words.NameProduct') }}</label>
                                        <input class="form-control" id="validationCustom01" type="text"
                                            name="name" value="{{ $product->name }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0">
                                            {{ __('words.Qunatity') }}</label>
                                        <input class="form-control" id="validationCustom01" type="text"
                                            name="quantite" value="{{ $product->quantite }}">
                                    </div>


                                    <div class="form-group">
                                        <label class="col-form-label">{{ __('words.ProductDescription') }}</label>
                                        <textarea rows="5" cols="12" name="description">{{ $product->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label">
                                            {{ __('words.BasePrice') }} </label>
                                        <input class="form-control" id="validationCustom02" type="text"
                                            name="price" value="{{ $product->price }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label">
                                            {{ __('words.BaseDiscount') }}</label>
                                        <input class="form-control" id="validationCustom02" type="text"
                                            name="discount_price" value="{{ $product->discount_price }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit"> {{ __('words.Save') }}</button>
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
<script>
    $(".colors").select2({
        tags: true
    });
    $(".sizes").select2({
        tags: true
    });
</script>
@endsection('javascripts')
