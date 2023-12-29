@extends('admin.layout')
@section('title', 'Contact Detail Page')
<!-- Favicons -->
<link href="{{asset('Logo Image/my_logo_image-removebg-preview.png')}}" rel="icon">
    @section('content')
    <main class="main" id="main">
        <div class="pagetitle">
            <h1>Contact Detil Page</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">Home</li>
                    <li class="breadcrumb-item" aria-current="page">Contact</li>
                      <li class="breadcrumb-item" aria-current="page">Contact List</li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Detail</li>
                </ol>
            </nav>
        </div>
                 {{-- Contact Detail --}}
                 <div class="card w-50 mx-auto text-center">
            <div class="card-body">
              <h5 class="card-title"><i class="fa-solid fa-user me-2"></i>Contact Name - {{$data->name}}</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><i class="fa-solid fa-envelope me-2"></i>{{$data->email}}</li>
              <li class="list-group-item"><i class="fa-solid fa-phone me-2"></i>{{$data->phone}}</li>
              <li class="list-group-item"><i class="fa-solid fa-messages me-2"></i>{{$data->message}}</li>
              <li class="list-group-item"><i class="fa-regular fa-calendar-days me-2"></i>Date - {{$data->created_at->format('j/F/Y')}}</li>
            </ul>
          </div>
    </main>
@endsection
