@extends('newwebsite.layouts.layout')
@section('content')
    <!-- Open Content -->
    <section class="bg-light">

        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="{{ asset('public/' . $productclorsize->image) }}" width="20px"
                            alt="Card image cap" id="product-detail">
                    </div>
                    <div class="row">
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example1" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        <div id="multi-item-example1" class="col-10 carousel slide carousel-multi-item"
                            data-bs-ride="carousel">
                            <div class="carousel-inner product-links-wap" role="listbox">
                                @foreach ($productclorsize->images->chunk(3) as $chunk)
                                    <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
                                        <div class="row">
                                            @foreach ($chunk as $image)
                                                <div class="col-4">
                                                    <a href="#">
                                                        <img class="card-img img-fluid"
                                                            src="{{ asset('public/' . $image->image) }}"
                                                            alt="{{ $image->id }}">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-4 align-self-center">
                            <a href="#multi-item-example1" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">Active Wear</h1>
                            <p class="h3 py-2">${{ $productclorsize->price }}</p>



                            <h6>Description:</h6>
                            <p>{{ $productclorsize->descr }}</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6> Color :</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{ $productclorsize->color->color }}</strong></p>
                                </li>
                            </ul>



                            <div class="row">
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <form action="{{ route('site.website.addtocart') }}" method="post">
                                            @csrf
                                            <li class="list-inline-item">Size : {{ $productclorsize->size->size }}
                                                <input type="hidden" name="color_size_id" id="product-size"
                                                    value="{{ $productclorsize->id }}">
                                            </li>


                                    </ul>
                                </div>
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item text-right">
                                            {{-- Quantity --}}
                                            <input type="hidden" name="quantity" id="product-quanity"
                                                value="1" >
                                                {{-- max="{{$productclorsize->quantity}}" --}}
                                        </li>
                                        {{-- <li class="list-inline-item"><span class="btn " id="btn-minus">-</span></li>
                                        <li class="list-inline-item"><span class="badge bg-secondary"
                                                id="var-value">1</span></li>
                                        <li class="list-inline-item"><span class="btn " id="btn-plus">+</span></li> --}}
                                    </ul>
                                </div>
                            </div>
                            <div class="row pb-3">
                                {{-- <div class="col d-grid">
                                    <button type="submit" class="btn  btn-lg" style="background-color: #ff4c3b"
                                        name="submit" value="buy">Buy</button>
                                </div> --}}
                                <div class="col d-grid">
                                    <button type="submit" class="btn  btn-lg" name="submit"
                                        style="background-color: #ff4c3b" value="addtocard">Add To
                                        Cart</button>
                                </div>
                            </div>
                        </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>



    </section>
    <!-- Close Content -->











    <!-- Start Article -->


    <!-- End Article -->
@endsection
