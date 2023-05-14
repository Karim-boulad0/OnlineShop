@extends('newwebsite.layouts.layout')
@section('content')
    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">
            @include('newwebsite.layouts.siedbar')
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="#">All</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="#">Men's</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none" href="#">Women's</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 pb-4">
                        <div class="d-flex">
                            <select class="form-control">
                                <option>Featured</option>
                                <option>A to Z</option>
                                <option>Item</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($products as $product)
                        @foreach ($product->colorSizes as $colorSize)
                        @if ($colorSize->quantity>0)

                            <div class="col-md-4">
                                <div class="card mb-4 product-wap rounded-0">
                                    <div class="card rounded-0">
                                        <img class="card-img rounded-0 img-fluid"
                                            src="{{ asset('public/' . $colorSize->image) }}">
                                        <div
                                            class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                            <ul class="list-unstyled">
                                                <li><a class="btn  text-white" style="background-color: #ff4c3b"
                                                        href="{{ route('website/shop/productColorSize', $colorSize->id) }}"><i
                                                            class="far fa-heart"></i></a></li>
                                                <li><a class="btn  text-white mt-2" style="background-color: #ff4c3b"
                                                        href="{{ route('website/shop/productColorSize', $colorSize->id) }}"><i
                                                            class="far fa-eye"></i></a></li>
                                                <li class="pt-2">
                                                <form action="{{ route('site.website.addtocart') }}" method="post">
                                                    @csrf
                                                    <div>
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        <input type="hidden" name="color_size_id" value="{{ $colorSize->id }}">
                                                        <button type="submit" class="btn text-white"  style="background-color: #ff4c3b" ><i class="fas fa-cart-plus"> </i></button>
                                                    </div>
                                               </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <a href="" class="h3 text-decoration-none">{{ $colorSize->name }}</a>
                                        <ul class="w-100 list-unstyled d-flex justify-content-between text-lg-start mb-0">
                                            <li>Size : {{ $colorSize->size->size }}</li>
                                            <li class="pt-2">
                                                <!-- any additional info or action button can go here -->
                                            </li>
                                        </ul>
                                        <div class="form-group">
                                            <label for="quantity">Quantity:</label>
                                        <input type="number" class="form-control" name="quantity"  max="{{$colorSize->quantity}}">
                                        </div>
                                        <div>
                                            color : {{ $colorSize->color->color }}
                                        </div>

                                        <p class="text-center mb-0">${{ $colorSize->price }}</p>

                                    </div>
                                </div>
                            </div>
                @endif

                                             </form>

                        @endforeach
                    @endforeach
                </div>




            </div>
        </div>
    </div>
    <!-- End Content -->
@endsection






























{{-- <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-12 text-center">
                            <div class="card mb-4 shadow-sm">
                                <img src="{{ asset('public/' . $product->image) }}" class="card-img-top"
                                    alt="{{ $product->name }}" />
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <div class="row">
                                        @foreach ($product->colorSizes as $colorSize)
                                            @if ($colorSize->quantity >= 1)
                                                <style>
                                                    .card-img-top {
                                                        width: 100px;
                                                        height: 100px;
                                                    }

                                                    .color-size-card {
                                                        border: 1px solid #ccc;
                                                        border-radius: 5px;
                                                        padding: 20px;
                                                        margin-bottom: 20px;
                                                        font-size: 14px;
                                                    }

                                                    .color-size-card img {
                                                        max-width: 100%;
                                                        margin-bottom: 20px;
                                                    }

                                                    .color-size-card h5 {
                                                        margin-bottom: 10px;
                                                        font-weight: bold;
                                                    }

                                                    .color-size-card .form-group {
                                                        margin-bottom: 20px;
                                                    }

                                                    .color-size-card label {
                                                        display: block;
                                                        margin-bottom: 5px;
                                                    }

                                                    .color-size-card span {
                                                        display: block;
                                                    }

                                                    .color-size-card .btn {
                                                        width: 100%;
                                                    }

                                                    .color-size-card .btn:hover {
                                                        background-color: #007bff;
                                                    }

                                                    .color-size-card .btn:focus {
                                                        box-shadow: none;
                                                    }

                                                    .color-size-card .btn-primary {
                                                        background-color: #007bff;
                                                        border-color: #007bff;
                                                    }

                                                    .color-size-card .btn-primary:focus,
                                                    .color-size-card .btn-primary.focus {
                                                        box-shadow: none;
                                                    }

                                                    .color-size-card .btn-primary:hover {
                                                        background-color: #0069d9;
                                                        border-color: #0062cc;
                                                    }

                                                    .color-size-card .text-muted {
                                                        color: #6c757d;
                                                    }

                                                    .color-size-card .text-success {
                                                        color: #28a745;
                                                    }

                                                    .color-size-card {
                                                        border: 1px solid #dee2e6;
                                                        border-radius: 5px;
                                                        overflow: hidden;
                                                    }

                                                    .price {
                                                        display: flex;
                                                        align-items: center;
                                                        justify-content: flex-start;
                                                        margin-bottom: 1rem;
                                                    }

                                                    .price-value {
                                                        font-size: 1.25rem;
                                                        margin-left: 0.5rem;
                                                    }
                                                </style>



                                                <div class="col-4">
                                                    <div class="card mb-2 shadow-sm color-size-card align-items-start">
                                                        <img src="{{ asset('public/' . $colorSize->image) }}"
                                                            class="card-img-top" alt="{{ $product->name }}" />
                                                        <div class="color-size">
                                                            <span><b>Color:</b> {{ $colorSize->color->color }}</span>
                                                            <span><b>Size:</b> {{ $colorSize->size->size }}</span>
                                                        </div>
                                                        <div class="price">
                                                            <span class="text-success"><b>Price:</b>
                                                                {{ $colorSize->price }}</span>
                                                        </div>
                                                        <div class="quantity">
                                                            <span class="text-muted"><b>All Quantity:</b>
                                                                {{ $colorSize->quantity }}</span>
                                                        </div>
                                                        <form action="{{ route('website.addtocart') }}" method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="quantity">Quantity:</label>
                                                                <input type="number" class="form-control" id="quantity"
                                                                    name="quantity" min="1"
                                                                    max="{{ $colorSize->quantity }}" required>
                                                            </div>
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $product->id }}">
                                                            <input type="hidden" name="color_size_id"
                                                                value="{{ $colorSize->id }}">
                                                            <button type="submit" class="btn btn-primary">Add to
                                                                Cart</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            // Add a simple interactive feature to the quantity input
                            document.getElementById("add-to-cart-quantity").addEventListener("input", function() {
                                var price = parseFloat(document.getElementById("price").textContent);
                                var quantity = parseInt(this.value);
                                var totalPrice = price * quantity;
                                document.getElementById("total-price").textContent = totalPrice.toFixed(2);
                            });
                            // Add commas to the price
                            let prices = document.querySelectorAll('.price-value');
                            prices.forEach(price => {
                                let priceValue = parseFloat(price.innerText);
                                price.innerText = priceValue.toLocaleString('en-US', {
                                    style: 'currency',
                                    currency: 'USD'
                                });
                            });
                        </script>
                    @endforeach
                </div> --}}
