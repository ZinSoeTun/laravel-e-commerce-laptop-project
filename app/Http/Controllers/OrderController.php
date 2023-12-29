<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //order from cart
    public function order(Request $request)
    {
        $subTotal = 0;
        //looping and adddind data to order detail
        foreach ($request->all() as $order) {
          $data =   OrderDetail::create([
                'user_id' => Auth::user()->id,
                'product_id' => $order['productId'],
                'order_number' => $order['orderNumber'],
                'qty' => $order['qty'],
                'total' => $order['total'],
            ]);
             $subTotal  += $order['total'];
        };

  //adding data to order table
        Order::create([
            'user_id' => Auth::user()->id,
            'order_number' => $data->order_number,
            'total_amount' => $subTotal + 100,
        ]);
        //cart delete
        Cart::where('user_id', Auth::user()->id)->delete();
        return response(200);
    }

    //order list (Admin Dashboard)
    public function orderList (){
        $data = Order::leftJoin('users', 'users.id', 'orders.user_id')
                ->select('orders.*', 'users.name as user_name')
                ->paginate(4);
        return view('admin.orderList', compact('data'));
    }
    //order deliver
    public function deliver($number) {
        Order::where('order_number', $number)->update(['order_delivered'=> 1]);
        return back()->with(['success'=> 'Your order has been delivered']);
    }
    //order delete
    public function orderDelete($number){
        Order::where('order_number', $number)->delete();
        OrderDetail::where('order_number', $number)->delete();
        return back()->with(['success'=> 'Order has been deleted']);
    }
}
