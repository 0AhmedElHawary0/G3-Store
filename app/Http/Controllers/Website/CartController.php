<?php

namespace App\Http\Controllers\Website;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function cart()
    {
        $totalCart = 0;
        $products = [];
        $cart = session('cart', []);

        foreach ($cart as $id => $q) {
            $prod = Product::find($id);
            $prod->q = $q;
            $prod->total = $prod->price * $prod->q;

            $totalCart += $prod->total;

            $products[] = $prod;
        }

        return view('website.cart', compact('products', 'totalCart'));
    }

    public function addToCart(Request $request)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $cart = [];
        if (session('cart')) {
            $cart = session('cart');
        }

        $cart[$request->pID] = $request->q;

        session(['cart' => $cart]);

        return back()->with('success', 'The product has been added successfully.');
    }

    public function submitCart(Request $request)
    {
        $newOrder = new Order();
        $newOrder->items = session('cart');
        $newOrder->status = 1;
        $newOrder->user_id = auth()->id();
        $newOrder->total = $request->total;
        $newOrder->save();

        session()->forget('cart');

        return redirect('/');
    }

    public function deleteFromCart(Request $request,$id)
    {
        if(Session('cart')){
                    session()->forget('cart.'.$id);
            }
            return back();
        }


    }