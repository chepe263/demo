<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Vanilo\Cart\Facades\Cart;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.front', function ($view) {
            $cart = array(
                "hasItems" => Cart::isNotEmpty()
                ,'items' => Cart::getItems()
                ,"itemCount" => Cart::itemCount()
            );
            $view->with('cart', json_encode($cart));
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
