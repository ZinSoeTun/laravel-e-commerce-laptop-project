@extends('admin.layout')
@section('title', 'Category Page')
@section('content')
    <main id="main" class="main">
        {{-- Create Category --}}
        <div class="pagetitle">
            <h1>Create Category</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">Home</li>
                    <li class="breadcrumb-item" aria-current="page">Category</li>
                    <li class="breadcrumb-item active" aria-current="page">Create Category</li>
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
            {{--  error message --}}
            <div style="width: 500px;" class="text-success mx-2 mx-auto">
                @if (session('error'))
                    <div style="color: white" class="alert alert-light bg-danger text-center alert-dismissible fade show" role="alert">
                        <i class=" bg-danger fa-solid fa-circle-exclamation me-3"></i><strong>{{ session('error') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
        {{-- Category create card --}}
        <div class="container-fluid">
            <div class="col-lg-6 offset-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center">Create New Ctegory</h3>
                        </div>
                        {{-- horizontal line --}}
                        <br>
                        {{-- category form --}}
                        <form action="{{route('category.create')}}" method="post">
                            @csrf
                            {{-- category name --}}
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Category Name:</label>
                                <input type="text" name="categoryName"
                                    class="form-control @error('categoryName')  is-invalid @enderror"
                                    placeholder="category name" value="{{old('categoryName')}}">
                                @error('categoryName')
                                    <div class="text-danger">
                                        *{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- category description --}}
                            <div class="form-group mb-3">
                                <label for="categoryDescription">Category Description:</label>
                                <textarea name="categoryDescription" id="categoryDescription" cols="30" rows="5"
                                class="form-control @error('categoryDescription')  is-invalid @enderror">{{old('categoryDescription')}}</textarea>
                                @error('categoryDescription')
                                    <div class="text-danger">
                                        *{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- button for card --}}
                            <div class="text-center">
                                <input type="submit" value="create" class="btn btn-success px-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
