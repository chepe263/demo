@section('title')
    @lang("product detail"): {{ $product->name }}
@stop
@extends('layouts.front')

@section('content')
    <!-- Product Details Area Start -->
    <div class="single-product-area section-padding-100 clearfix">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mt-50">
                            <li class="breadcrumb-item"><a href="{{ route('shop.index') }}">@lang("start")</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-7">
                    <div class="single_product_thumb">
                        <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @php
                                    $slideto = 0;
                                @endphp
                                @foreach($product->getMedia() as $media)
                                    <li class="
                                    @if($media === $product->getMedia()->first())
                                        active
                                    @endif" data-target="#product_details_slider" data-slide-to="{{ $slideto }}" style="background-image: url({{ $media->getUrl('thumbnail') ?: '/images/product.jpg' }});">
                                    </li>
                                    @php
                                        $slideto++;
                                    @endphp
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach($product->getMedia() as $media)
                                    <div class="carousel-item
                                        @if($media === $product->getMedia()->first())
                                            active
                                        @endif
                                    ">
                                        <a class="gallery_img" href="{{ $media->getUrl() ?: '/images/product.jpg' }}">
                                            <img class="d-block w-100" src="{{ $media->getUrl() ?: '/images/product.jpg' }}" >
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="single_product_desc">
                        <!-- Product Meta Data -->
                        <div class="product-meta-data">
                            <div class="line"></div>
                            <p class="product-price">{{ format_price($product->price) }}</p>                            
                            <h6>{{ $product->name }}</h6>
                            @if(false)
                            <!-- Ratings & Review -->
                            <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                <div class="ratings">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="review">
                                    <a href="#">Write A Review</a>
                                </div>
                            </div>
                            @endif
                            <!-- Avaiable -->
                            <p class="avaibility"><i class="fa fa-circle"></i> @lang("in stock")</p>
                        </div>

                        <div class="short_overview my-5">
                            {!! nl2br($product->description) !!}
                        </div>

                        <!-- Add to Cart Form -->
                        <form class="cart clearfix" method="post" action="{{ route('cart.add', $product) }}">
                            {{ csrf_field() }}
                            <div class="cart-btn d-flex mb-50">
                                <p>#</p>
                                <div class="quantity">
                                    <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                    <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                                    <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <button type="submit" name="addtocart" value="5" class="btn amado-btn">
                                @lang("add to cart")
                                <i class="d-none fa fa-check" id="item_added"></i>
                                <i class="d-none fa fa-spinner fa-spin fa-fw margin-bottom" id="item_adding"></i>
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Details Area End -->
@endsection
