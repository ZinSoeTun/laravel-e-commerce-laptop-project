@extends('admin.layout')
@section('title', ' Edit Product Page')
@section('content')
    <main id="main" class="main">
        {{-- Edit Product--}}
        <div class="pagetitle">
            <h1>Edit Product</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">Home</li>
                    <li class="breadcrumb-item" aria-current="page">Product</li>
                    <li class="breadcrumb-item" aria-current="page">Product List</li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                </ol>
            </nav>
        </div>

        {{-- Product edit success message --}}
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
        {{-- Product edit card --}}
        <div class="container-fluid">
            <div class="col-lg-6 offset-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center">Edit Product</h3>
                        </div>
                        {{-- horizontal line --}}
                        <br>
                            {{-- product image --}}
                            <div class="text-center mb-2">
                                <img class="rounded-circle img-thumbnail"
                                    src="{{ asset('storage/product/' . $productData->image)}}" alt="image"
                                    width="250" height="250">
                            </div>
                        {{-- product form --}}
                        <form action="{{route('product.update', $productData->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                              {{-- product image --}}
                              <div class="form-group mb-3">
                                <label for="" class="form-label">Product Image:</label>
                                <input type="file" name="productImage"
                                    class="form-control @error('productImage')  is-invalid @enderror" value="{{old('productImage', $productData->image)}}">
                                @error('productImage')
                                    <div class="text-danger">
                                        *{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- product name --}}
                            <div class="form-group mb-3">
                                <label for=""> Product Name:</label>
                                <input type="text" name="productName"
                                    class="form-control @error('productName')  is-invalid @enderror"
                                    value="{{old('productName',$productData->name)}}">
                                @error('productName')
                                    <div class="text-danger">
                                        *{{ $message }}
                                    </div>
                                @enderror
                            </div>
                               {{-- product series--}}
                               <div class="form-group mb-3">
                                <label for=""> Product Series:</label>
                                <input type="text" name="productSeries"
                                    class="form-control @error('productBrand')  is-invalid @enderror"
                                    value="{{old('categorySeries',$productData->series)}}">
                                @error('productSeries')
                                    <div class="text-danger">
                                        *{{ $message }}
                                    </div>
                                @enderror
                            </div>
                              {{-- category --}}
                              <div class="form-group mb-3">
                                <label for="" class="form-label">Category:</label>
                                <select class="form-select @error('categoryId')  is-invalid @enderror"
                                    aria-label="Default select example" name="categoryId">
                                    <option value="">Choose Category</option>
                                    @foreach ($categoryData as $category)
                                        <option value="{{ $category->id }}" @if ($productData->category_id == $category->id) selected @endif>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('categoryId')
                                    <div class="text-danger">
                                        *{{ $message }}
                                    </div>
                                @enderror
                            </div>
                               {{-- product price --}}
                               <div class="form-group mb-3">
                                <label for=""> Product Price:</label>
                                <input type="text" name="productPrice"
                                    class="form-control @error('productPrice')  is-invalid @enderror"
                                    value="{{old('productPrice', $productData->price)}}">
                                @error('productPrice')
                                    <div class="text-danger">
                                        *{{ $message }}
                                    </div>
                                @enderror
                            </div>
                             {{-- product description --}}
                             <div class="form-group mb-3">
                                <label for="" class="form-label"> Product Description:</label>
                                <textarea   class="form-control  @error('productDescription')  is-invalid @enderror" name="productDescription" id="productDescription" cols="30" rows="3">
                                    {{old('productDescription', $productData->description)}}
                                    @error('productDescription')
                                    <div class="text-danger">
                                        *{{ $message }}
                                    </div>
                                @enderror
                                </textarea>
                            </div>
                            {{-- button for card --}}
                            <div class="text-center">
                                <input type="submit" value="Update" class="btn btn-warning px-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
