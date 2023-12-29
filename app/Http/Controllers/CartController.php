<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartController extends Controller
{
    //add to cart
    public function add(Request $request)
    {
        $data = [
            'user_id' => $request->userId,
            'product_id' => $request->productId,
            'qty' => $request->qty
        ];
        Cart::create($data);
        return response(200);
    }
    //cart list page
    public function cart()
    {
        $data = Cart::where('carts.user_id', Auth::user()->id)
            ->select('carts.*', 'products.image as product_image', 'products.name as product_name', 'products.price as product_price')
            ->leftJoin('products', 'products.id', 'carts.product_id')
            ->orderBy('id', 'desc')
            ->get();
        $subTotal = 0;
        foreach ($data as $cart) {
            $subTotal += $cart->qty * $cart->product_price;
        }
        return view('cart', compact('data', 'subTotal'));
    }
    //delete product in cart
    public function deleteProduct(Request $request)
    {
         Cart::where('id', $request->cardId)
             ->where('user_id', Auth::user()->id)
              ->delete();
    }
    //cart clear
public function cartClear(){
    Cart::where('user_id', Auth::user()->id)->delete();
    return redirect()->route('greenland.home');
}
}
