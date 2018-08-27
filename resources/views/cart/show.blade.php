@section('title')
    @lang("cart")
@stop
@extends('layouts.front')

@section('content')
<div class="cart-table-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="cart-title mt-50">
                        <h2>Shopping Cart</h2>
                    </div>

                    <div class="cart-table clearfix">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>@lang('name')</th>
                                    <th>@lang('price')</th>
                                    <th>@lang('quantity')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(Cart::getItems() as $item)
                                <tr>
                                    <td class="cart_product_img">
                                        <a href="#"><img src="{{ $item->product->getThumbnailUrl() ?: '/images/product.jpg' }}" alt="{{ $item->product->getName() }}"></a>
                                    </td>
                                    <td class="cart_product_desc">
                                        <h5>{{ $item->product->getName() }}</h5>
                                    </td>
                                    <td class="price">
                                        <span>{{ format_price($item->price) }}</span>
                                    </td>
                                    <td class="qty">
                                        <div class="qty-btn d-flex">
                                            <p></p>
                                            <div class="quantity">
                                                <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i>
                                                    &nbsp;&nbsp;
                                                </span>
                                                
                                                <input type="number" class="qty-text" id="qty" step="1" min="0" max="10" name="quantity" value="{{ $item->quantity }}">
                                                <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="cart-summary">
                        <h5>Cart Total</h5>
                        <ul class="summary-table">
                            <li><span>@lang("subtotal"):</span> <span>{{ format_price(Cart::total()) }}</span></li>
                            <li><span>@lang("delivery"):</span> <span>@lang("free")</span></li>
                            <li><span>@lang("total"):</span> <span>{{ format_price(Cart::total()) }}</span></li>
                        </ul>
                        <div class="cart-btn mt-100">
                            <a href="{{ route('checkout.show') }}" class="btn amado-btn w-100">@lang("checkout")</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
