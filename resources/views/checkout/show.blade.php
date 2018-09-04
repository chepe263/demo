@section('title')
    @lang("payment info")
@stop
@extends('layouts.front')

@section('content')
    <style>
        .product-image {
            max-width: 100%;
            display: block;
            margin-bottom: 2em;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>@lang("payment info")</h1></div>

                    <div class="panel-body">
                        @unless ($checkout)
                            <div class="alert alert-warning">
                                <p>Hey, nothing to check out here!</p>
                            </div>
                        @endunless

                        @if ($checkout)
                            <form id="checkout" action="{{ route('checkout.submit') }}" method="post">
                                {{ csrf_field() }}

                                @include('checkout._billpayer', ['billpayer' => $checkout->getBillPayer()])

                                <div>
                                    <input type="hidden" name="ship_to_billing_address" value="0" />
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="ship_to_billing_address" value="1"
                                                   v-model="shipToBillingAddress">
                                            @lang("ship to the same address")
                                        </label>
                                    </div>
                                </div>

                                <hr>

                                @include('checkout._shipping_address', ['address' => $checkout->getShippingAddress()])

                                <p>Total: {{ format_price($checkout->total()) }}</p>

                                <hr>

                                <div>
                                    <button class="btn btn-primary">@lang("submit order")</button>
                                </div>


                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @if ($checkout)
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            new Vue({
                el: '#checkout',
                data: {
                    isOrganization: {{ old('billpayer.is_organization') ?: 0 }},
                    shipToBillingAddress: {{ old('ship_to_billing_address') ?? 1 }}
                }
            });
        });
    </script>
    @endif
@stop

