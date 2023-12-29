@extends('admin.layout')
@section('title', 'User List Page')
@section('content')
    <!-- Favicons -->
    <link href="{{ asset('Logo Image/my_logo_image-removebg-preview.png') }}" rel="icon">
@section('content')
    <main class="main">
        {{-- User List --}}
        <div class="pagetitle" style="margin-top: 70px; margin-left:320px">
            <h1>User List - {{ $data->total() }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">Home</li>
                    <li class="breadcrumb-item" aria-current="page">Account</li>
                    <li class="breadcrumb-item active text-info" aria-current="page">User List</li>
                </ol>
            </nav>
        </div>

        {{-- user create success message --}}
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
                {{-- user list --}}
                <table class="table  ms-5" style=" width: 60rem">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Joined Data</th>
                            <th></th>

                        </tr>
                    </thead>
                    @foreach ($data as $user)
                        <tbody>
                            <tr>
                                <td class="col-lg-1"> {{ $user->id }}</td>
                                <td class="col-lg-1"><i class="fa-solid fa-user me-2"></i>{{ $user->name }}</td>
                                <td class="col-lg-1"><i class="fa-solid fa-envelope me-2"></i>{{ $user->email }}</td>
                                <td class="col-lg-1"><i class="fa-solid fa-phone me-2"></i>{{ $user->phone }}</td>
                                <td class="col-lg-1"><i
                                        class="fa-regular fa-calendar"></i>{{ $user->created_at->format('j/F/Y') }}</td>
                                <td class="col-lg-2">
                                    {{-- user image --}}
                                    <a href="#" target="_blank">
                                        <div class="text-center my-4">
                                            <img class="" src="{{ asset('storage/profile/' . $user->image) }}"
                                                alt="image" width="100" height="100">
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    {{-- user detail --}}
                                    <a href="{{ route('user.detail', $user->id) }}" title="user detail">
                                        <button class="btn btn-info me-2">
                                            <i class="fa-solid fa-circle-info"></i>
                                        </button>
                                    </a>
                                    {{-- user delete --}}
                                    <a href="{{ route('user.delete', $user->id) }}" title="delete">
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
@endsection
@endsection
