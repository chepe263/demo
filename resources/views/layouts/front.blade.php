<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
 
    <!-- Title  -->
    <title>
        @hasSection('title')
            @yield('title') - {{ env('APP_NAME')}}
        @else
         **{{ env('APP_NAME')}}**
        @endif
    </title>

    <!-- Favicon  -->
    <link rel="icon" href="/images/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="/css/amado.css">
    <link rel="stylesheet" href="/css/amado.plugin.css">

</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="/images/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.html"><img src="/images/logo-hannna.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="index.html"><img src="/images/logo-hannna.png" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li class="@if(Route::currentRouteName() == "shop.index") active @endif"><a href="{{ route('shop.index') }}">@lang('start')</a></li>
                    <li class="@if(Route::currentRouteName() == "checkout.show") active @endif "><a href="{{ route('checkout.show') }}">@lang('checkout')</a></li>
                    @if(Auth::check() && Auth::user()->hasRole('admin'))
                        <li><a href="/admin/product">@lang('admin')</a></li>
                    @endif
                </ul>
            </nav>
            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100">
                @if(!Auth::check())
                    <a href="{{ route('login') }}" class="btn amado-btn mb-15">@lang('login') </a>
                @endif
                @if(false)<a href="#" class="btn amado-btn active">New this week</a>@endif
            </div>
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">              
                <a href="{{ route('cart.show') }}" class="cart-nav"><img src="/images/core-img/cart.png" alt=""> @lang('cart') <span class="cart_item_count">( {{ Cart::itemCount() }} )</span></a>
                @if(false)
                    <a href="#" class="hidden fav-nav"><img src="/images/core-img/favorites.png" alt=""> Favourite</a>
                    <a href="#" class="hidden search-nav"><img src="/images/core-img/search.png" alt=""> Search</a>
                @endif
            </div>
            @if(false)
                <!-- Social Button -->
                <div class="social-info d-flex justify-content-between">
                    <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                </div>
            @endif
        </header>
        <!-- Header Area End -->
        <!-- Alert -->
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        <!-- Alert -->
        <!-- Page content -->
        @yield("content")
        <!-- Page content -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
@if(false)
    <!-- ##### Newsletter Area Start ##### -->
    <section class="newsletter-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <!-- Newsletter Text -->
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
                        <h2>Subscribe for a <span>25% Discount</span></h2>
                        <p>Nulla ac convallis lorem, eget euismod nisl. Donec in libero sit amet mi vulputate consectetur. Donec auctor interdum purus, ac finibus massa bibendum nec.</p>
                    </div>
                </div>
                <!-- Newsletter Form -->
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="newsletter-form mb-100">
                        <form action="#" method="post">
                            <input type="email" name="email" class="nl-email" placeholder="Your E-mail">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Newsletter Area End ##### -->
@endif
    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row align-items-center">
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-4">
                    <div class="single_widget_area">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="index.html"><img src="/images/logo-hannna-w.png" alt=""></a>
                        </div>
                        <!-- Copywrite Text -->
                        <p class="copywrite"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> & Re-distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-8">
                    <div class="single_widget_area">
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <nav class="navbar navbar-expand-lg justify-content-end">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                                <div class="collapse navbar-collapse" id="footerNavContent">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="{{ route('shop.index') }}"">@lang('start')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('cart.show') }}">@lang('cart')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('checkout.show') }}">@lang('checkout')</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->
    <script>
        hannna = {
            cart: {
                items: {{Cart::itemCount()}}
            }
        }
    </script>

    <!-- app js -->
    <script src="/js/amado.min.js"></script>

</body>

</html>