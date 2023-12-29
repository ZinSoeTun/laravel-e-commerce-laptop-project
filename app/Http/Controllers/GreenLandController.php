<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class GreenLandController extends Controller
{
    //Green land Home Page
public function home(){
    $productData =Product::get();
   $categoryData = Category::get();
   if (Auth::user()) {
    $cartData =  Cart::where('user_id', Auth::user()->id)->get();
   }else{
    $cartData =  [];
   }
   return view('green-land',compact('productData', 'categoryData', 'cartData'));
}
//choice products
public function choice($id){
     $data = Product::where('products.id', $id)
                    ->select('products.*', 'categories.name as category_name')
                    ->leftJoin('categories', 'categories.id', 'products.category_id')
                    ->first();
                    return view('choice-products' ,compact('data'));
}
}
