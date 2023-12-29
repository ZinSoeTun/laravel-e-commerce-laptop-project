@extends('layout')
@section('title', 'Cart Page')
{{-- csrf token --}}
@section('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
<style>
    @media (max-width: 767px) {
        .deleteBtn {
            display: none;
        }
    }
</style>
{{-- cart section --}}
@section('content')
    <h1 class="text-center text-success" style="margin-top: 120px"><i
            class="fa-solid fa-cart-shopping text-success me-1"></i>Shopping Cart</h1>
    <div class="container-fluid p-5" id="main">
        @if (count($data) == 0)
            <h4 class="text-center">There is <strong><span class="text-danger">no data</span></strong> you have chosen in your
                cart</h4>
        @else
            <div class="row shadow rounded">
                {{-- left side --}}
                <div class="col-lg-8 col-12 p-5">
                    <table class="table table-borderless text-center">
                        <tbody>
                            @foreach ($data as $cart)
                                <tr class="row border-bottom">
                                    <td class="col-md-2 d-md-none offset-10 col-2 arrDelete" style="cursor: pointer">
                                        <i class="fa-solid fa-xmark text-dark fs-2"></i>
                                    </td>
                                    {{-- image --}}
                                    <td class="col-md-2 col-12">
                                        <img class="img-fluid" src="{{ asset('storage/product/' . $cart->product_image) }}"
                                            alt="product" width="150" height="150">
                                    </td>
                                    {{-- product name --}}
                                    <td class="col-md-2 col-12">
                                        <i class="fa-brands fa-spotify me-1"></i>{{ $cart->product_name }}
                                    </td>
                                    {{-- price --}}
                                    <td class="col-md-2 col-12">
                                        <i class="fa-solid fa-dollar-sign me-1"></i>
                                        <span id="price">{{ $cart->product_price }}</span>
                                    </td>
                                    {{-- qty --}}
                                    <td class="col-md-2 col-12">
                                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex w-50 mx-auto mx-md-0">
                                            <button class="btn btn-success px-2 minusBtn">
                                                <i class="fas fa-minus"></i>
                                            </button>

                                            <input type="text" value="{{ $cart->qty }}" id="qty"
                                                class="form-control form-control-sm text-center ms-1 me-1 col-md-1 col-lg-1 col-xl-1">

                                            <button class="btn btn-success px-2 plusBtn">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </td>
                                    {{-- total price --}}
                                    <td class="col-md-2 col-12">
                                        <i class="fa-solid fa-dollar-sign"></i>
                                        <span id="total">{{ $cart->product_price * $cart->qty }}</span>
                                    </td>
                                    {{-- delete btn --}}
                                    <td class="deleteBtn col-md-2 col-12">
                                        <button class="btn btn-danger">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </td>
                                    {{-- hidden input data --}}
                                    <input type="hidden" id="cartId" value="{{ $cart->id }}">
                                    <input type="hidden" id="productId" value="{{ $cart->product_id }}">
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- right sight --}}
                <div class="col-lg-4 col-12 p-5" style="background-color: rgba(128, 128, 128, 0.192)">
                    <h4 class="mb-3 text-success">Cart Detail</h4>
                    {{-- billing cart --}}
                    <div>
                        <a href="">
                            <img src="{{ asset('Logo Image/visa.png') }}" alt="cart image"width="70">
                        </a>
                        <a href="">
                            <img src="{{ asset('Logo Image/american express.png') }}" alt="cart image"width="70">
                        </a>
                        <a href="">
                            <img src="{{ asset('Logo Image/discover.png') }}" alt="cart image"width="70">
                        </a>
                        <a href="">
                            <img src="{{ asset('Logo Image/master.png') }}" alt="cart image"width="70">
                        </a>
                    </div>
                    {{-- order price --}}
                    <div class="p-3 mt-5">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Sub Total</h6>
                            <h6>
                                <i class="fa-solid fa-dollar-sign me-1"></i>
                                <span id="subTotal">{{ $subTotal }}</span>
                            </h6>
                        </div>
                        {{-- shipping fee --}}
                        <div class="d-flex justify-content-between mb-3 border-bottom">
                            <h6>Shipping Fee</h6>
                            <h6><i class="fa-solid fa-dollar-sign me-1"></i>100</h6>
                        </div>
                        {{-- total price --}}
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Total<small>(Tax include)</small></h6>
                            <h6>
                                <i class="fa-solid fa-dollar-sign me-1"></i>
                                <span id="finalTotal"> {{ $subTotal + 100 }}</span>
                            </h6>
                        </div>
                        {{-- order and clear btn --}}
                        <div class="my-4">
                            <button class="btn btn-sm btn-primary px-3 me-3" id="orderBtn">
                                Order
                            </button>
                            <a href="{{ route('cart.clear') }}">
                                <button class="btn btn-sm btn-danger px-3 me-3">
                                    Clear Cart
                                </button>
                            </a>
                        </div>
                        {{-- notice for order --}}
                        <div class="alert alert-warning" role="alert">
                            Shipping Time may be about one week.<br>
                            After ordered,we will send voucher detail to your email.
                        </div>
                    </div>
                </div>
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
            //plus btn
            $('.plusBtn').click(function() {
                let tr = $(this).parents('tr');
                let qty = parseInt(tr.find('#qty').val());
                qty = qty + 1;
                tr.find('#qty').val(qty);
                let price = parseInt(tr.find('#price').text());
                let total = price * qty;
                tr.find('#total').text(total);
                calculate();
            });
            //minus btn
            $('.minusBtn').click(function() {
                let tr = $(this).parents('tr');
                let qty = parseInt(tr.find('#qty').val());
                let count = 0;
                if (qty > 1) {
                    qty = qty - 1;
                    count += qty;
                }
                tr.find('#qty').val(qty);
                let price = parseInt(tr.find('#price').text());
                let total = price * qty;
                tr.find('#total').text(total)
                let subTotal = parseInt($('#subTotal').text());
                if (count > 0) {
                    calculate();
                }
            });
            calculate();
            $('.arrDelete, .deleteBtn').click(function() {
                let tr = $(this).parents('tr');
                let cartId = parseInt(tr.find('#cartId').val());
                $.ajax({
                    type: 'get',
                    url: '/cart/product/delete',
                    data: {
                        'cardId': cartId
                    },
                    dataType: 'json'
                });
                tr.remove();
                calculate();
            });

            //orderBtn
            $('#orderBtn').click(function() {
                let orderList = [];
                let orderNumber = Math.floor(Math.random() * 10000000000);
                $('tr').each(function(index, row) {
                    orderList.push({
                        'productId': parseInt($(row).find('#productId').val()),
                        'orderNumber': 'gr-Land' + orderNumber,
                        'qty': parseInt($(row).find('#qty').val()),
                        'total': parseInt($(row).find('#total').text()),
                    });
                });
                $.ajax({
                    type: 'post',
                    url: '/order',
                    data: Object.assign({}, orderList),
                    dataType: 'json',
                    success: function(response) {
                        $('#main').remove();
                        $('#header').after(
                            `
                            <div class="alert alert-success alert-dismissible fade show text-center" role="alert" style="margin-top: 100px">
                            <strong class="me-3">Your order is success!</strong>Please check order voucher in your email
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                             </div>
                         `
                        )
                    }
                });

            });


            // calculate function
            function calculate() {
                let subTotal = 0;
                $('tr').each(function(index, row) {
                    subTotal += parseInt($(row).find('#total').text());
                });
                $('#subTotal').text(subTotal);
                $('#finalTotal').text(subTotal + 100);
            }
        });
    </script>
@endsection
