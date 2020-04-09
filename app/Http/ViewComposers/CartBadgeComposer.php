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
            $cartCollection = \Cart::session($userId)->getContent();
            $cartItemsCount = $cartCollection->count();
        }
        else
        {
            $cartCollection = \Cart::getContent();
            $cartItemsCount = $cartCollection->count();
        }

        $view->with('data', $cartItemsCount);
    }
}
