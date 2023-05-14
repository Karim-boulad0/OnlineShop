@extends('newwebsite.layouts.layout')
@section('content')
    <style>
        .services-icon-wap:hover {
            background-color: #ff4c3b
        }
    </style>
    <section class="py-5" style="background-color: #251e1d">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col-md-8 text-white">
                    <h1>About Us</h1>
                    <p>
                        {{ $setting->description }}
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('public/'.$setting->about_image) }}" width="200px" alt="About Hero" />
                </div>
            </div>
        </div>
    </section>
    <!-- Close Banner -->

    <!-- Start Section -->
    <section class="container py-5">
        <div class="row text-center pt-5 pb-3">
            <div class="col-lg-6 m-auto text-lg-start">
                <h1 class="h1">Our Services</h1>
                <p>
                    {{ $setting->Our_Services }}

                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-center" style="color: #ff4c3b">
                        <i class="fa fa-truck fa-lg"></i>
                    </div>
                    <h2 class="h5 mt-4 text-center">Delivery Services</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-center" style="color: #ff4c3b">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                    <h2 class="h5 mt-4 text-center">Shipping & Return</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-center" style="color: #ff4c3b">
                        <i class="fa fa-percent"></i>
                    </div>
                    <h2 class="h5 mt-4 text-center">Promotion</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-center" style="color: #ff4c3b">
                        <i class="fa fa-user"></i>
                    </div>
                    <h2 class="h5 mt-4 text-center">24 Hours Service</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section -->
@endsection
