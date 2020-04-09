<?php

namespace App\Http\ViewComposers;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\Cart;

class CartBadgeComposer
{
    public function compose($view)
    {
        $cartItemsCount = null;
        if (Auth::check())
        {
            $userId = Auth::id();
            $cartItemsCount = \Cart::session($userId)->getTotalQuantity();
        }
        else
        {
            $cartItemsCount = \Cart::getTotalQuantity();
        }

        $view->with('data', $cartItemsCount);
    }
}
