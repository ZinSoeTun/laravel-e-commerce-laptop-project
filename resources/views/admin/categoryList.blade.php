@extends('admin.layout')
@section('title', 'Category List Page')
 <!-- Favicons -->
 <link href="{{asset('Logo Image/my_logo_image-removebg-preview.png')}}" rel="icon">
@section('content')
    <main class="main" id="main">
        {{--Category List --}}
        <div class="pagetitle">
            <h1>Category List - {{ $data->total() }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">Home</li>
                    <li class="breadcrumb-item" aria-current="page">Category</li>
                    <li class="breadcrumb-item active" aria-current="page">Category List</li>
                </ol>
            </nav>
        </div>
        {{-- Category create success message --}}
        <div class="col-lg-6 offset-lg-3">
            <div style="width: 500px;" class="text-success mx-2 mx-auto">
                @if (session('success'))
                    <div class="alert alert-primary bg-success text-center alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-square-check me-3"></i><strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

            @if (count($data) == 0)
                <h2 class="text-center mt-5">There is no <span class="text-danger">Category Data!</span></h2>
            @else
                {{-- Category list --}}
                <div class="container-fluid d-flex flex-wrap">
                    @foreach ($data as $category)
                        <div class="card col-3 text-center w-100" style="border-radius:3px;">
                            <div class="card-body rounded-4 bg-info">
                                <h5 class="card-title">Category ID - {{ $category->id }}</h5>
                                <h5 class="card-title">Created Date - {{ $category->created_at->format('j/F/Y') }}</h5>
                                <h5 class="card-title">Category Name - {{ $category->name }}</h5>
                                <h5 class="card-title">Category Description </h5>
                                <p class="card-text fs-6"> - </p>
                                <p class="card-text">{{ $category->description }}</p>
                                <a href="{{route('category.edit',$category->id)}}">
                                    <button class="btn btn-warning me-2">Edit</button>
                                </a>
                                <a href="{{route('category.delete', $category->id)}}">
                                    <button class="btn btn-danger">Delete</button>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="mt-5">
                {{ $data->links() }}
            </div>
    </main>
