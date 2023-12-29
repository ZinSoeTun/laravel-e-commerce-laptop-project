@extends('admin.layout')
@section('title', 'Admin Detail Page')
<!-- Favicons -->
<link href="{{asset('Logo Image/my_logo_image-removebg-preview.png')}}" rel="icon">
    @section('content')
    <main class="main" id="main">
        <div class="pagetitle">
            <h1>Admin Detil Page</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">Home</li>
                    <li class="breadcrumb-item" aria-current="page">Account</li>
                      <li class="breadcrumb-item" aria-current="page">Admin List</li>
                    <li class="breadcrumb-item active" aria-current="page">Admin Detail</li>
                </ol>
            </nav>
        </div>
         {{-- admin detail --}}
        <div class="card text-center mx-auto w-50" style="width: 18rem;">
            @if ($data->image == null)
            {{-- admin image --}}
            <div class="text-center mb-4 mt-3">
                <img src="{{ asset('Logo Image/noimage.png') }}" alt="noimage" width="150"
                    height="150">
            </div>
        @else
            <div class="text-center mb-4">
                <img class=" img-fluid img-thumbnail mt-3"
                    src="{{ asset('storage/profile/' . $data->image) }}" alt="image"
                    width="150" height="150">
            </div>
        @endif
            <div class="card-body">
              <h5 class="card-title"><i class="fa-solid fa-user me-2"></i>{{$data->name}}</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><i class="fa-regular fa-face-grin-hearts me-2"></i>{{$data->age}}</li>
              <li class="list-group-item"><i class="fa-solid fa-house-medical me-2"></i>{{$data->gender}}</li>
              <li class="list-group-item"><i class="fa-solid fa-envelope me-2"></i>{{$data->email}}</li>
              <li class="list-group-item"><i class="fa-solid fa-phone me-2"></i>{{$data->phone}}</li>
              <li class="list-group-item"><i class="fa-solid fa-location-dot me-2"></i>{{$data->address}}</li>
               @if (Auth::user()->id !== $data->id)
                    {{-- user promote to admin --}}
              <li class="list-group-item text-center">
                <a href="{{route('change.user', $data->id )}}">
                    <button class="btn btn-success"><i class="fa-regular fa-circle-user me-2"></i>Change to User</button>
                </a>
              </li>
               @endif
            </ul>
          </div>





    </main>

@endsection
