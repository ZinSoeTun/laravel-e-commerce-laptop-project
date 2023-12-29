<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    //order detail
    public function detail($number){
       $data = OrderDetail::where('order_details.order_number',$number)
                    ->select('order_details.*',
                              'products.name as product_name',
                             'products.price as product_price',
                             'products.image as product_image')
                   ->leftJoin('products', 'products.id', 'order_details.product_id')
                   ->get();

      $data2 = Order::where('orders.order_number', $number)
                   ->select('orders.*', 'users.name as user_name')
                   ->leftJoin('users', 'users.id', 'orders.user_id')
                   ->first();
                   return view('admin.orderDetail', compact('data', 'data2'));
    }
}
