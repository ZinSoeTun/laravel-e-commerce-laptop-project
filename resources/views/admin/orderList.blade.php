@extends('admin.layout')
@section('title', 'Order List Page')
 <!-- Favicons -->
 <link href="{{asset('Logo Image/my_logo_image-removebg-preview.png')}}" rel="icon">
 <style>
    .pagetitle {
       padding-left: 300px;
       padding-top: 70px;
    }
    .main {
       padding: 30px;
       margin-right: 0;
    }
</style>

@section('content')
    <main class="main">
        <div >
        {{-- Order List--}}
        <div class="pagetitle">
            <h1>Order List - {{ $data->total() }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">Home</li>
                    <li class="breadcrumb-item" aria-current="page">Order</li>
                    <li class="breadcrumb-item active text-info" aria-current="page">Order List</li>
                </ol>
            </nav>
        </div>
        {{-- Order create success message --}}
        <div class="col-lg-6 offset-lg-3">
            <div style="width: 400px;" class="text-success mx-2 mx-auto">
                @if (session('success'))
                    <div class="alert alert-primary bg-success text-center alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-square-check me-3"></i><strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

            @if (count($data) == 0)
                <h2 class="text-center mt-5">There is no <span class="text-danger">Order Data!</span></h2>
            @else
              {{-- Order list --}}
           <div class="container-fluid mt-5">
            <table class="table"  style=" width: 60rem">
                <thead>
                  <tr >
                    <th>ID</th>
                    <th>Order Number</th>
                    <th>User Name</th>
                    <th>Total Amount</th>
                    <th>Order Date</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($data as $order)
                  <tr class="tr-shadow" style="">
                    <td class="col"> {{ $order->id }}</td>
                    <td class="col"><i class="fa-solid fa-qrcode me-2"></i>{{ $order->order_number}}</td>
                    <td class="col"><i class="fa-solid fa-user me-2"></i>{{ $order->user_name }}</td>
                    <td class="col"><i class="fa-solid fa-dollar-sign me-2"></i>{{ $order->total_amount}}</td>
                    <td class="col"><i class="fa-regular fa-calendar me-2"></i>{{ $order->created_at->format('j/F/Y')}}</td>
                     {{-- detail order --}}
                    <td>
                        <a href="{{route('order.detail',$order->order_number )}}" >
                            <button class="btn btn-info me-2"title="detail order" >
                                <i class="fa-solid fa-circle-info"></i>
                            </button>
                        </a>
                    {{-- order deliver --}}
                        @if ($order->order_delivered == 0)
                        <a href="{{route('order.deliver', $order->order_number)}}" >
                            <button class="btn btn-warning me-2"title="order delivery" >
                                <i class="fa-solid fa-truck me-2"></i>Deliver
                            </button>
                        </a>
                        @else
                          {{-- order delete --}}
                        <a href="{{route('order.delete', $order->order_number)}}">
                            <button class="btn btn-danger"  title="delete order">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </a>
                        @endif
                    </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
           </div>
            @endif
            <div class="mt-5">
                {{ $data->links() }}
            </div>
            </div>
    </main>
