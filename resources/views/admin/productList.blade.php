@extends('admin.layout')
@section('title', 'Product List Page')
<!-- Favicons -->
<link href="{{ asset('Logo Image/my_logo_image-removebg-preview.png') }}" rel="icon">
<style>
    .pagetitle {
        padding-left: 300px;
        padding-top: 70px;
    }

    .main {
        padding: 30px;
    }
</style>
@section('content')
    <main class="main">
        {{-- Product List --}}
        <div class="pagetitle">
            <h1>Product List - {{ $data->total() }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">Home</li>
                    <li class="breadcrumb-item" aria-current="page">Product</li>
                    <li class="breadcrumb-item active text-info" aria-current="page">Product List</li>
                </ol>
            </nav>
        </div>

        {{-- Product create success message --}}
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
                <h2 class="text-center mt-5">There is no <span class="text-danger">Product Data!</span></h2>
            @else
                {{-- Product list --}}
                <table class="table  ms-5">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Series</th>
                            <th>Price</th>
                            <th>Created Data</th>
                            <th> Image</th>
                            <th></th>
                            <th></th>

                        </tr>
                    </thead>
                    @foreach ($data as $product)
                        <tbody>
                            <tr>
                                <td class="col-lg-1"> {{ $product->id }}</td>
                                <td class="col-lg-1">{{ $product->name }}</td>
                                <td class="col-lg-1">{{ $product->category_name }}</td>
                                <td class="col-lg-1">{{ $product->series }}</td>
                                <td class="col-lg-1"><i class="fa-solid fa-dollar-sign"></i>{{ $product->price }}</td>
                                <td class="col-lg-1"><i
                                        class="fa-regular fa-calendar"></i>{{ $product->created_at->format('j/F/Y') }}</td>
                                <td class="col-lg-1">
                                    {{-- product image --}}
                                    <a href="#" target="_blank">
                                        <div class="text-center my-4">
                                            <img class="" src="{{ asset('storage/product/' . $product->image) }}"
                                                alt="image" width="100" height="100">
                                        </div>
                                    </a>
                                </td>
                                {{-- product detail --}}
                                <td>
                                    <a href="{{ route('product.detail', $product->id) }}" title="detail">
                                        <button class="btn btn-info me-2">
                                            <i class="fa-solid fa-circle-info"></i>
                                        </button>
                                    </a>
                                </td>
                                {{-- product edit --}}
                                <td>
                                    <a href="{{ route('product.edit', $product->id) }}" title="edit">
                                        <button class="btn btn-warning me-2">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </a>
                                </td>
                                {{-- product delete --}}
                                <td>
                                    <a href="{{ route('product.delete', $product->id) }}" title="delete">
                                        <button class="btn btn-danger">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            @endif
            <div class="mt-5">
                {{ $data->links() }}
            </div>
    </main>
