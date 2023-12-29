@extends('admin.layout')
@section('title', 'product detail page')
<!-- Favicons -->
<link href="{{ asset('Logo Image/my_logo_image-removebg-preview.png') }}" rel="icon">
@section('content')
    <main class="main" id="main">
        {{-- Order Detil Page --}}
        <div class="pagetitle">
            <h1>Order Detil Page</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">Home</li>
                    <li class="breadcrumb-item" aria-current="page">Order</li>
                    <li class="breadcrumb-item" aria-current="page">Order List</li>
                    <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
                </ol>
            </nav>
        </div>
        {{-- about user --}}
        <div class="card text-center mx-auto w-50" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><i class="fa-solid fa-user me-2"></i>{{ $data2->user_name }} [ID -
                    {{ $data2->user_id }}]</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><i class="fa-solid fa-hashtag me-2"></i>{{ $data2->order_number }}</li>
                <li class="list-group-item"><i
                        class="fa-solid fa-money-check-dollar me-2"></i>{{ $data2->total_amount }}(tax include)</li>
                <li class="list-group-item"><i
                        class="fa-regular fa-calendar-days me-2"></i>{{ $data2->created_at->format('j/F/Y') }}</li>
            </ul>
        </div>
        </div>
        {{-- order detail list --}}
        @foreach ($data as $orderDetail)
            <div class="card text-center mx-auto w-50" style="width: 18rem;">
                @if ($orderDetail->product_image == null)
                    <div class="text-center mb-4">
                        <img src="{{ asset('Logo Image/noimage.png') }}" alt="noimage" width="150" height="150">
                    </div>
                @else
                    <div class="text-center mb-4">
                        <img src="{{ asset('storage/product/' . $orderDetail->product_image) }}" alt="image"
                            width="150" height="150">
                    </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-solid fa-laptop me-2"></i>{{ $orderDetail->product_name }}</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><i
                            class="fa-solid fa-dollar-sign me-2"></i>{{ $orderDetail->product_price }}</li>
                    <li class="list-group-item"><i class="fa-solid fa-cubes me-2"></i>{{ $orderDetail->qty }}(qty)</li>
                    <li class="list-group-item"><i
                            class="fa-solid fa-money-check-dollar me-2"></i>{{ $orderDetail->total }}(total)</li>
                    <li class="list-group-item"><i
                            class="fa-regular fa-calendar-days me-2"></i>{{ $orderDetail->created_at->format('j/F/Y') }}
                    </li>
                </ul>
            </div>
        @endforeach
    </main>
@endsection
