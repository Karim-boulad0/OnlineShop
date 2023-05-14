<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/all.min.css') }}">
    @yield('css')
</head>
<link rel="stylesheet" href="{{ asset('website/css/layout.css') }}">

<body>
    {{-- navbar  --}}
    {{-- navbar  --}}
    <nav class="navbar navbar-expand-lg sticky-top">
        <!-- sticky-top // yaeni krml mtl postition:fixed -->
        <div class="container">
            <!-- <div class="container-fluid"> //hun  chlna  fluid-->
            <a class="navbar-brand" href="#">
                <img src="{{ asset('public/' . $setting->logo) }}" width="30px" height="30px" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main"
                aria-controls="main" aria-expanded="true" aria-label="Toggle navigation">
                <i class="navbar-toggler-icon"></i>
            </button>
            <div class="collapse navbar-collapse" id="main">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <!-- ms-auto margin-left auto -->
                    <li class="nav-item">
                        <a class="nav-link p-lg-3" aria-current="page" href="{{ route('useraddresse.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-lg-3" href="{{ route('website.categories') }}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-lg-3" href="{{ route('website.cart') }}">My Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-lg-3" href="#About">About</a>
                        <!-- p-lg-3 // padding  bi kl ljihet l7ajm larg wtale3 bikun lpadding 3-->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-lg-3" href="#Contact">Contact</a>
                    </li>
                </ul>
                <div class="search ps-3 pe-3 d-none d-lg-block">
                    <!-- d-none //bt5fi //display:none // d-lg-block //yaeni bs ysir 7ajm larg yzhera-->
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <a class="btn btn-primary rounded-pill main-btn" href="{{ route('settings.index') }}">Login</a>
                <!-- btn-primary //by3ml chakl; button mrtab -->
                <!--  rounded-pill //border raduis  // by3ml arround 3ltraf mtl  -->
            </div>
        </div>
    </nav>
    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <div class="footer pt-5 pb-5 text-center text-white-50 text-meduim-start bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-2 col-md-6 col-lg-4">
                    <div class="info">
                        <img src="{{ asset('public/' . $setting->logo) }}" alt=""
                            style="width: 40px;height:40px">
                        <p class="mb-5">
                            {{ $setting->description }}
                        </p>
                        <div class="copyright">
                            created by <span>karim BL</span>
                            <div>&copy; 2022 - <span>bondi inc</span></div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-6 col-lg-2">
                    <div id="Contact" class="links">
                        <h5 class="text-light mb-4">Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="">Home</a></li>
                            <li><a href="">our Services</a></li>
                            <li><a href="">Portfolio</a></li>
                            <li><a href="">Testimoials</a></li>
                            <li><a href="">support</a></li>
                            <li><a href="">terms and condition</a></li>
                        </ul>
                    </div>
                </div> --}}
                {{-- <div class="col-md-6 col-lg-2">
                    <div class="links">
                        <h5 class="text-light mb-4">About Us</h5>
                        <ul class="list-unstyled">
                            <li><a href="">Sign in</a></li>
                            <li><a href="">Register</a></li>
                            <li><a href="">About Us</a></li>
                            <li><a href="">Blog</a></li>
                            <li><a href="">support</a></li>
                            <li><a href="">Contact Us</a></li>
                        </ul>
                    </div>
                </div> --}}
                <div class="col-md-6 col-lg-4">
                    <div class="contact">
                        <h5 class="text-light">Contact Us</h5>

                        <a class="btn rounded-pill main-btn w-100"
                            href="{{ $setting->email }}">{{ $setting->email }}</a>
                        <ul class="d-flex mt-5 list-unstyled gap-5 ms-5">
                            <!--
                                gap-3 // by3ml fara8 2 px ben l3naser
                                d-flex // desplay:flex // krml ysiro l3naser 7ad baed
                             -->
                            <li>
                                <a class="d-block text-light" href="{{ $setting->twitter }}">
                                    <i class="fa-brands twitter fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a class="d-block text-light" href="{{ $setting->instagram }}">
                                    <i class="fa-brands instagram fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a class="d-block text-light" href="{{ $setting->facebook }}">
                                    <i class="fa-brands facebook fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a class="d-block text-light" target="__blank" href="{{ $setting->youtube }}">
                                    <i class="fa-brands google fa-youtube"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

@yield('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"></script>

</html>
