@extends('admin.layout')
@section('title', 'Contact List Page')
 <!-- Favicons -->
 <link href="{{asset('Logo Image/my_logo_image-removebg-preview.png')}}" rel="icon">
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
        {{-- Contact List --}}
        <div class="pagetitle">
            <h1>Contact List - {{ $data->total() }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">Home</li>
                    <li class="breadcrumb-item" aria-current="page">Contact</li>
                    <li class="breadcrumb-item active text-info" aria-current="page">Contact List</li>
                </ol>
            </nav>
        </div>

        {{-- Contact create success message --}}
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
            <table class="table  ms-5"  style=" width: 60rem">
                <thead >
                  <tr >
                    <th >ID</th>
                    <th >Name</th>
                    <th >Email</th>
                    <th >Created Data</th>
                    <th ></th>
                  </tr>
                </thead>
                @foreach ($data as $contact)
                <tbody>
                  <tr>
                    <td class="col-lg-2"> {{ $contact->id }}</td>
                    <td class="col-lg-2">{{ $contact->name}}</td>
                    <td class="col-lg-3">{{ $contact->email }}</td>
                    <td class="col-lg-3 me-5"><i class="fa-regular fa-calendar"></i>{{ $contact->created_at->format('j/F/Y')}}</td>
                     {{-- contact detail --}}
                     <td class="">
                        <a href="{{route('contact.detail', $contact->id)}}" title="contact detail">
                            <button class="btn btn-info me-2" >
                                <i class="fa-solid fa-circle-info"></i>
                            </button>
                        </a>
                     {{-- contact delete --}}
                        <a href="{{route('contact.delete', $contact->id)}}" title="delete">
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
