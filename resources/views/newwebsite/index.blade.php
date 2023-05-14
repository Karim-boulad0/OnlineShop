@extends('newwebsite.layouts.layout')
@section('content')

    <body>

        <style>
            .carousel-item img {
                height: auto;
                max-height: 400px;
                /* تعديل حسب الارتفاع المطلوب */
                max-width: 100%;
            }
        </style>
        <!-- Start Banner Hero -->
        <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($products as $key => $product)
                    <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="{{ $key }}"
                        {{ $key == 0 ? 'class=active' : '' }}></li>
                @endforeach
            </ol>
            {{-- start images --}}
            <div class="carousel-inner">
                @foreach ($products as $key => $product)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <div class="container">
                            <div class="row p-5">
                                <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                                    <img class="img-fluid" src="{{ asset('public/' . $product->image) }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- end images --}}

            <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
                role="button" data-bs-slide="prev">
                <i class="fas fa-chevron-left"></i>
            </a>
            <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
                role="button" data-bs-slide="next">
                <i class="fas fa-chevron-right"></i>
            </a>
        </div>
        <!-- End Banner Hero -->


        <!-- Start Categories of The Month -->
        <section class="container py-5">
            <div class="row text-center pt-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Categories of The Month</h1>
                    <p>
                        Don't miss the opportunity to get the latest trends at great prices,
                        shop now and enjoy the unique experience with us!
                    </p>
                </div>
            </div>
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-12 col-md-4 p-5 mt-3">
                        <a href="#"><img   src="{{ asset('public/' . $category->image) }}"
                                class="rounded-circle img-fluid border" /></a>
                        <h5 class="text-center mt-3 mb-3">Watches</h5>
                        <p class="text-center">
                            <a class="btn" href="{{ route('website/shop/products', $category->id) }}"
                                style="background-color: #ff4c3b; color: white">Go Shop</a>
                        </p>
                    </div>
                @endforeach
            </div>

        </section>
        <!-- End Categories of The Month -->

        <!-- Start Featured Product -->
        <section class="bg-light">
            <div class="container py-5">
                <div class="row text-center py-3">
                    <div class="col-lg-6 m-auto">
                        <h1 class="h1">Featured Product</h1>
                        <p>
                            Reprehenderit in voluptate velit esse cillum dolore eu fugiat
                            nulla pariatur. Excepteur sint occaecat cupidatat non proident.
                        </p>
                    </div>
                </div>
                <div class="row">
                    @foreach ($productclorsizes as $productclorsize)
                        <div class="col-12 col-md-4 mb-4">
                            <div class="card h-100">
                                <a href="{{ route('website/shop/productColorSize', $productclorsize->id) }}">
                                    <img src="{{ asset('public/' . $productclorsize->image) }}" class="card-img-top"
                                        alt="..." />
                                </a>
                                <div class="card-body">
                                    <ul class="list-unstyled d-flex justify-content-between">
                                        <li class="text-muted text-right">${{ $productclorsize->price }}</li>
                                    </ul>
                                    <a href="shop-single.html"
                                        class="h2 text-decoration-none text-dark">{{ $productclorsize->name }}</a>
                                    <p class="card-text">
                                        {{ $productclorsize->descr }}
                                    </p>
                                    {{-- <p class="text-muted">Reviews (24)</p> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- End Featured Product -->
    @endsection
