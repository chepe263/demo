<div id="shipping-address" v-show="!shipToBillingAddress">
    <h3>@lang("shipping address")</h3>

    <div class="form-group form-group-sm row{{ $errors->has('shippingAddress.name') ? ' has-danger' : '' }}">

        <label class="form-control-label col-md-2">{{ __('name') }}</label>
        <div class="col-md-10">
            {{ Form::text('shippingAddress[name]', null, ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="form-group form-group-sm row{{ $errors->has('shippingAddress.country_id') ? ' has-danger' : '' }}">
        <label class="form-control-label col-md-2">{{ __('country') }}</label>
        <div class="col-md-10">
            {{ Form::select('shippingAddress[country_id]', $countries->pluck('name', 'id'), 'GT', ['class' => 'form-control']) }}

            @if ($errors->has('shippingAddress.country_id'))
                <div class="form-control-feedback">{{ $errors->first('shippingAddress.country_id') }}</div>
            @endif
        </div>
    </div>

    <div class="form-group form-group-sm row{{ $errors->has('shippingAddress.address') ? ' has-danger' : '' }}">

        <label class="form-control-label col-md-2">{{ __('address') }}</label>
        <div class="col-md-10">
            {{ Form::text('shippingAddress[address]', null, ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="form-group form-group-sm row{{ $errors->has('shippingAddress.postalcode') ? ' has-danger' : '' }}">

            <label class="form-control-label col-md-2">{{ __('zip code') }}</label>
        <div class="col-md-4">
            {{ Form::text('shippingAddress[postalcode]', null, ['class' => 'form-control']) }}
        </div>

        <label class="form-control-label col-md-2">{{ __('city') }}</label>
        <div class="col-md-4">
            {{ Form::text('shippingAddress[city]', null, ['class' => 'form-control']) }}
        </div>

    </div>
</div>
