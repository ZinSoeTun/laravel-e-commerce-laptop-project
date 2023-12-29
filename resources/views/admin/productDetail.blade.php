@extends('admin.layout')
@section('title', 'product detail page')
<!-- Favicons -->
<link href="{{ asset('Logo Image/my_logo_image-removebg-preview.png') }}" rel="icon">
@section('content')
    <main class="main" id="main">
        {{-- Product Detil  --}}
        <div class="pagetitle">
            <h1>Product Detil Page</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">Home</li>
                    <li class="breadcrumb-item" aria-current="page">Product</li>
                    <li class="breadcrumb-item" aria-current="page">Product List</li>
                    <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
                </ol>
            </nav>
        </div>

        <div class="card text-center mx-auto w-50" style="width: 18rem;">
            @if ($data->image == null)
                <div class="text-center mb-4">
                    <img src="{{ asset('Logo Image/noimage.png') }}" alt="noimage" width="150" height="150">
                </div>
            @else
                <div class="text-center mb-4">
                    <img src="{{ asset('storage/product/' . $data->image) }}" alt="image" width="150" height="150">
                </div>
            @endif
            <div class="card-body">
                <h5 class="card-title"><i class="fa-brands fa-product-hunt me-2"></i>{{ $data->name }}</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><i class="fa-brands fa-bandcamp me-2"></i>{{ $data->series }}</li>
                <li class="list-group-item"><i class="fa-brands fa-clipboard-list me-2"></i>{{ $data->category_name }}</li>
                <li class="list-group-item">{{ $data->description }}</li>
                <li class="list-group-item"><i class="fa-solid fa-dollar-sign me-2"></i>{{ $data->price }}</li>
                <li class="list-group-item"><i
                        class="fa-regular fa-calendar-days me-2"></i>{{ $data->created_at->format('j/F/Y') }}</li>
            </ul>
        </div>





    </main>

@endsection
