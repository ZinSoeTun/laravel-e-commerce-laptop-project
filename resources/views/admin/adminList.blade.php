@extends('admin.layout')
@section('title', 'Admin List Page')
@section('content')
   <!-- Favicons -->
 <link href="{{asset('Logo Image/my_logo_image-removebg-preview.png')}}" rel="icon">
@section('content')
    <main class="main">
        {{-- Admin List --}}
        <div class="pagetitle" style="margin-top: 70px; margin-left:320px">
            <h1>Admin List - {{ $data->total() }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">Home</li>
                    <li class="breadcrumb-item" aria-current="page">Account</li>
                    <li class="breadcrumb-item active text-info" aria-current="page">Admin List</li>
                </ol>
            </nav>
        </div>
        {{-- admin create success message --}}
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
              {{-- admin list --}}
            <table class="table  ms-5"  style=" width: 60rem">
                <thead >
                  <tr >
                    <th >ID</th>
                    <th >Name</th>
                    <th >Email</th>
                    <th >Phone</th>
                    <th >Joined Data</th>
                    <th ></th>
                  </tr>
                </thead>
                @foreach ($data as $admin)
                <tbody>
                  <tr>
                    <td class="col-lg-1"> {{ $admin->id }}</td>
                    <td class="col-lg-1"><i class="fa-solid fa-user me-2"></i>{{ $admin->name}}</td>
                    <td class="col-lg-1"><i class="fa-solid fa-envelope me-2"></i>{{ $admin->email }}</td>
                    <td class="col-lg-1"><i class="fa-solid fa-phone me-2"></i>{{ $admin->phone}}</td>
                    <td class="col-lg-1"><i class="fa-regular fa-calendar"></i>{{ $admin->created_at->format('j/F/Y')}}</td>
                    <td class="col-lg-2">
                         {{-- admin image --}}
                        <a href="#" target="_blank">
                            <div class="text-center my-4">
                                <img class=""
                                    src="{{ asset('storage/profile/' . $admin->image) }}" alt="image"
                                    width="100" height="100">
                            </div>
                        </a>
                    </td>
                    <td>
                     {{-- admin detail --}}
                        <a href="{{route('admin.detail', $admin->id)}}" title="admin detail">
                            <button class="btn btn-info me-2" >
                                <i class="fa-solid fa-circle-info"></i>
                            </button>
                        </a>
                    @if (Auth::user()->id !== $admin->id)
                         {{-- admin delete --}}
                         <a href="{{route('admin.delete',$admin->id)}}" title="delete">
                            <button class="btn btn-danger">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </a>
                    @endif
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
    @endsection

@endsection
