@extends('layout')
{{-- page title --}}
@section('title', 'Product Choice Page')
{{-- csrf token --}}
@section('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <h1 style="margin-top: 130px" class="text-center text-primary">Prepare For My Cart</h1>
    <div class="row text-center">
        <div class="col-12 col-lg-5">
            <div class="my-2 text-center">
                <img src="{{ asset('storage/product/' . $data->image) }}" class="" alt="..." width="300"
                    height="300">
            </div>
        </div>
        <div class="col-12 col-lg-5 p-3  text-lg-start">
            <i class="fa-solid fa-star text-warning"></i>
            <i class="fa-solid fa-star text-warning"></i>
            <i class="fa-solid fa-star text-warning"></i>
            <i class="fa-solid fa-star-half-stroke text-warning"></i>
            <i class="fa-regular fa-star text-warning"></i><br>
            <span style="color: blue" class="fs-5"> Name </span>
            <h5 class="list-group-item"> {{ $data->name }}</h5>
            <span style="color: blue" class="fs-5"> Series </span>
            <h5 class="list-group-item"> {{ $data->series }}</h5>
            <span style="color: blue" class="fs-5"> Price </span>
            <h5 class="list-group-item"><i class='fas fa-dollar-sign'></i> {{ $data->price }}</h5>
            <span style="color: blue" class="fs-5"> Description </span>
            <p class="list-group-item"><h5> {{ $data->description }}</h5></p>
            @if (Auth::user())
            @if (Auth::user()->role == 'user')
            <div class="d-flex ms-5 ms-lg-0">
                <button class="btn btn-sm btn-success" id="minus"><i class="fa-solid fa-minus"></i></button>
                <input type="text" value="1" name="" id="qty" class="form-control ms-1 me-1"
                    style="width: 50px">
                    <button class="btn btn-sm btn-success me-1" id="plus"><i class="fa-solid fa-plus"></i></button>
                    <button class="btn btn-success ms-3 px-2" id="cart">
                        <i class="fa-solid fa-cart-plus"></i>Add To Cart
                    </button>
            </div>
               {{-- user id, product id --}}
           <input type="hidden" value="{{ Auth::user()->id }}" id="userId">
           <input type="hidden" id="productId" value="{{ $data->id }}">
               @else
              <p class="fs-5 text-danger"> You Have Been Logged in. But Your account is not user account.</p>
               @endif
               @else
               <div id="check" class="alert alert-warning w-50 text-center mx-auto" role="alert">
                 If you want to buy this, you must <a class="fs-5" href="{{ route('login') }}">
                     <strong>Log In</strong>
                 </a> first!
                </div>
       @endif
    </div>
    @endsection

    @section('jqueryCode')
        <script>
            $(document).ready(function() {
                //csrf token
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                let qty = parseInt($('#qty').val());
                //plus btn
                $('#plus').click(function() {
                    qty = qty + 1
                    $('#qty').val(qty);
                });
                //minus btn
                $('#minus').click(function() {
                    if (qty > 1) {
                        qty = qty - 1
                        $('#qty').val(qty);
                    }
                });
                //cart btn
                $('#cart').click(function() {
                    let userId = $('#userId').val();
                    let productId = $('#productId').val();
                    $.ajax({
                        type: 'post',
                        url: '/cart/add',
                        data: {
                            'userId': userId,
                            'productId': productId,
                            'qty': qty
                        },
                        dataType: 'json',
                        success: function(response) {
                            window.location.href = 'http://localhost:8000/'
                        }



                    })
                });
            })
        </script>
    @endsection
