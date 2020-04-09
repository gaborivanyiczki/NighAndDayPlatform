<?php

namespace App\Http\Controllers;

use App\Repository\Eloquent\ProductsRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;

class CartController extends Controller
{
    protected $productRepo;

    public function __construct(ProductsRepository $productRepository)
    {
        $this->productRepo = $productRepository;
    }

    public function cart()
    {
        $cartCollection = null;
        $cartTotal = null;
        //\Cart::clear();
        if (Auth::check())
        {
            $userId = Auth::id();
            $cartCollection = \Cart::session($userId)->getContent();
            $cartTotal = \Cart::session($userId)->getTotal();
        }
        else
        {
            $cartCollection = \Cart::getContent();
            $cartTotal = \Cart::getTotal();
        }

        return view('cart.cart', compact('cartTotal'))->with('cartModel', json_encode($cartCollection));
    }

    public function addToCart(Request $request)
    {
        $product = $this->productRepo->findParticularProductBySlug($request->slug);

        if($product != null)
        {
            if (Auth::check())
            {
                $userId = Auth::id();
                \Cart::session($userId)->add(array(
                    'id' => $product->id,
                    'name' => $product->Name,
                    'price' => $product->DiscountPrice != null ? $product->DiscountPrice : $product->Price,
                    'quantity' => 1,
                    'attributes' => array(),
                    'associatedModel' => $product
                ));
            }
            else
            {
                \Cart::add(array(
                    'id' => $product->id,
                    'name' => $product->Name,
                    'price' => $product->DiscountPrice != null ? $product->DiscountPrice : $product->Price,
                    'quantity' => 1,
                    'attributes' => array(),
                    'associatedModel' => $product
                ));
            }
        }
        else
        {
            return response('Produsul nu a putu fi gasit.', 400)->header('Content-Type', 'text/plain');
        }

        return response()->json(['success' => 'success'], 200);
    }

    public function updateCartItemQuantity(Request $request)
    {
        $itemId = $request->id;
        $newValue = $request->quantity;
        $cartCollection = null;
        //$cartTotal = null;

        if (Auth::check())
        {
            $userId = Auth::id();
            \Cart::session($userId)->update($itemId,[
                'quantity' => array(
                    'relative' => false,
                    'value' => $newValue
                ), ]);
            $cartCollection = \Cart::session($userId)->getContent();
            //$cartTotal = \Cart::session($userId)->getTotal();
        }
        else
        {
            \Cart::update($itemId,[
                'quantity' => array(
                    'relative' => false,
                    'value' => $newValue
                ), ]);
            $cartCollection = \Cart::getContent();
           // $cartTotal = \Cart::getTotal();
        }

        return response()->json($cartCollection);
    }

    public function removeItemFromCart(Request $request)
    {
        $itemId = $request->id;
        $cartCollection = null;
        //$cartTotal = null;

        if (Auth::check())
        {
            $userId = Auth::id();
            \Cart::session($userId)->remove($itemId);
            $cartCollection = \Cart::session($userId)->getContent();
            //$cartTotal = \Cart::session($userId)->getTotal();
        }
        else
        {
            \Cart::remove($itemId);
            $cartCollection = \Cart::getContent();
            //$cartTotal = \Cart::getTotal();
        }

        return response()->json($cartCollection);
    }

    public function getCartContent()
    {
        $cartCollection = null;

        if (Auth::check())
        {
            $userId = Auth::id();
            $cartCollection = \Cart::session($userId)->getContent();
        }
        else
        {
            $cartCollection = \Cart::getContent();
        }

        return response()->json($cartCollection);
    }
}
