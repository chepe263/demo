@section('title')
    @lang("products")
@stop
@extends('layouts.front')

@section('content')
    <!-- Product Catagories Area Start -->
    <div class="products-catagories-area clearfix">
        <div class="amado-pro-catagory clearfix">
            
            @foreach($products as $product)

            <!-- Single Catagory -->
            <div class="single-products-catagory clearfix">
                <a href="{{ route('shop.product', $product) }}">
                    @if($product->hasImage())
                        <img src="{{ $product->getThumbnailUrl() }}"/>
                    @else
                        <img src="/images/product.jpg"/>
                    @endif
                    <!-- Hover Content -->
                    <div class="hover-content">
                        <div class="line"></div>
                        <p>{{ format_price($product->price) }}</p>
                        <h4>{{ $product->name }}</h4>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>
    <!-- Product Catagories Area End -->
@endsection
