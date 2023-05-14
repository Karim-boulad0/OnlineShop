@extends('website.layouts.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('website/css/categories.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
@endsection

@section('content')
    <style>
        img {
            border: 1px solid #ddd;
            border-radius: 20px;
            padding: 5px;
        }
    </style>
    <div class="row">
        <div class="row text-center">
            <h1>Awaiting approval</h1>
        </div>
        <div class="card-deck">
            @foreach ($cartNotHaveOrder as $cart)
                <div class="col-4-lg">

                    <div class="card">
                        <img src="{{ asset('public/' . $cart->productColorSize->image) }}" class="card-img-top"
                            alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{ $cart->productColorSize->color->color }}</h5>
                            <p class="card-text">{{ $cart->productColorSize->color->size }}</p>
                            <p class="card-text">Price: {{ $cart->productColorSize->price }}</p>
                            <p class="card-text">Discount: {{ $cart->productColorSize->discount }}</p>
                            <p class="card-text">Quantity: {{ $cart->quantity }}</p>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop" data-cart-id="{{ $cart->id }}">
                                edit
                            </button>

                            <button class="bg-danger"> <a href="#" class="delete btn btn-danger btn-sm"
                                    data-cart-id="{{ $cart->id }}" data-toggle="modal"
                                    data-target="#deleteModal">Delete<i class="fa fa-trash"></i></a></button>

                            <button type="button" class="btn btn-primary accept-btn" data-bs-toggle="modal"
                                data-bs-target="#confirmModal" data-cart-id="{{ $cart->id }}"> Confirm</button>


                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="row text-center">
            <h1>approved</h1>
        </div>
        <div class="card-deck">
            @foreach ($cartHaveOrder as $cart)
                <div class="col-4-lg">

                    <div class="card">
                        <img src="{{ asset('public/' . $cart->productColorSize->image) }}" class="card-img-top"
                            alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{ $cart->productColorSize->color->color }}</h5>
                            <p class="card-text">{{ $cart->productColorSize->color->size }}</p>
                            <p class="card-text">Price: {{ $cart->productColorSize->price }}</p>
                            <p class="card-text">Discount: {{ $cart->productColorSize->discount }}</p>
                            <p class="card-text">Quantity: {{ $cart->quantity }}</p>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Button trigger modal -->
    <!-- start Modal for confirm -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirm Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <form action="{{ route('website.cart.confirm') }}" method="POST">
                        @csrf
                        @method('put')
                        <input type="hidden" id="cart_id" name="cart_id">
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('.accept-btn').forEach(function(button) {
            button.addEventListener('click', function(event) {
                const cartId = event.target.dataset.cartId;
                document.getElementById('cart_id').value = cartId;
            });
        });
    </script>
    <!-- end Modal for confirm -->
    <!-- start Modal for edit-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Shopping Cart Item</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('website.cart.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="text" class="form-control" id="quantity" name="quantity" required>
                            <div class="invalid-feedback">
                                Please enter a valid quantity.
                            </div>
                        </div>
                        <input type="hidden" id="cart_id" name="cart_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal for edit-->
    <!-- start Modal for delete-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="deleteForm" method="POST" action="{{ route('website.cart.delete') }}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="cart_id" id="cart-id-delete" value="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirm deletion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this cart item?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end Modal for delete-->
    <script>
        var editButtons = document.querySelectorAll('.btn-success');
        var modal = document.querySelector('#staticBackdrop');
        var idInput = modal.querySelector('#cart_id');
        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var cartId = button.dataset.cartId;
                idInput.value = cartId;
            });
        });
    </script>
    <script>
        const deleteButtons = document.querySelectorAll('.delete');
        deleteButtons.forEach((button) => {
            button.addEventListener('click', (event) => {
                event.preventDefault();
                const cartId = button.dataset.cartId;
                // Set the cartId to the hidden input field in the delete form
                document.getElementById('cart-id-delete').value = cartId;
                // Show the delete modal
                $('#deleteModal').modal('show');
            });
        });
    </script>
@section('js')
    <script src="{{ asset('website/js/categories.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endsection
@endsection
