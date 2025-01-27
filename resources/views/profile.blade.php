@extends('layout')
@section('title', 'Profile Page')
<!-- Favicon-->
<link rel="shortcut icon" href="{{ asset('Logo Image/my_logo_image-removebg-preview.png') }}" type="image/x-icon">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<style>
    /* CSS for password hide and show */
    .password-input-container {
        position: relative;
    }

    .password-input {
        padding-right: 32px;
    }

    .toggle-password {
        position: absolute;
        top: 10px;
        right: 20px;
        cursor: pointer;
        z-index: 9999;
    }
</style>

@section('content')
    <section class="section profile m-4">

        {{-- profile update success messages --}}
        <div style="width: 500px;" class="text-success mx-2 mx-auto">
            @if (session('success'))
                <div class="alert alert-primary bg-success text-center alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-square-check me-3"></i><strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        {{-- profile update error message --}}
        <div style="width: 500px;" class="text-success mx-2 mx-auto">
            @if (session('error'))
                <div style="color: white" class="alert alert-light bg-danger text-center alert-dismissible fade show" role="alert">
                    <i class=" bg-danger fa-solid fa-circle-exclamation me-3"></i><strong>{{ session('error') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div class="row justify-content-center">
            {{-- profile left side --}}
            <div class="col-md-3 ms-3 me-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        {{-- profile image --}}
                        @if (Auth::user()->image == null)
                            <div class="text-center mb-4">
                                <img src="{{ asset('Logo Image/noimage.png') }}" alt="noimage" width="150"
                                    height="150">
                            </div>
                        @else
                            <div class="text-center mb-4">
                                <img class=" rounded-circle img-thumbnail"
                                    src="{{ asset('storage/profile/' . Auth::user()->image) }}" alt="image"
                                    width="150" height="150">
                            </div>
                        @endif
                        <h2>{{ Auth::user()->name }}</h2>
                        <div class="social-link mt-2">
                            <a href="" class="me-2"><i class="fa-brands fa-twitter"></i></a>
                            <a href="" class="me-2"><i class="fa-brands fa-facebook"></i></a>
                            <a href="" class="me-2"><i class="fa-brands fa-instagram"></i></a>
                            <a href="" class="me-2"><i class="fa-brands fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- profile right side --}}
            <!-- Card Layout-->
            <div class="col-md-6  mt-lg-0 mt-xs-3 mt-3 mt-md-0">
                <div class="card">
                    <div class="card-body pt-3">

                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Change
                                    Password</button>
                            </li>

                        </ul>

                        <div class="tab-content pt-2">
                            <!-- Overview Tab -->
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <h5 class="card-title my-3"><i class='fas fa-address-card me-2 text-success'></i>Profile
                                    Details</h5>

                                <div class="row mt-3">
                                    <div class="col-lg-3 col-md-4 label "><i
                                            class='fas fa-user-circle me-2 text-success'></i>Name:</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->name }}</div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-3 col-md-4 label "><i
                                            class='fas fa-user-check me-2 text-success'></i>Role:</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->role }}</div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-3 col-md-4 label "><i class='fas fa-heart me-2 text-success'></i>Age:
                                    </div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->age }}</div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-3 col-md-4 label "><i
                                            class='fas fa-venus-mars me-2 text-success'></i>Gender:</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->gender }}</div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-3 col-md-4 label "><i
                                            class='far fa-address-book me-2 text-success'></i></i>Email:</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-3 col-md-4 label "><i
                                            class='fas fa-bell me-2 text-success'></i>Phone:</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->phone }}</div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-3 col-md-4 label "><i
                                            class='fas fa-map-marker-alt me-2 text-success'></i>Address:</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->address }}</div>
                                </div>
                            </div>
                            <!-- End Overview Tab -->

                            <!-- Edit Profile Tab -->
                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                {{-- profile image --}}
                                @if (Auth::user()->image == null)
                                    <div class="text-center mb-4">
                                        <img src="{{ asset('Logo Image/noimage.png') }}" alt="noimage" width="150"
                                            height="150">
                                    </div>
                                @else
                                    <div class="text-center mb-4">
                                        <img class=" rounded-circle img-thumbnail"
                                            src="{{ asset('storage/profile/' . Auth::user()->image) }}" alt="image"
                                            width="150" height="150">
                                    </div>
                                @endif

                                <!-- Profile Edit Form -->
                                <form action="{{ route('profile.edit') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{-- image upload --}}
                                    <div class="mb-3 row">
                                        <label class="form-label col-md-5 col-3">Image Upload:</label>
                                        <div class=" col-md-6 col-8">
                                            <input type="file"
                                                class="form-control  @error('image')is-invalid @enderror" name="image">
                                        </div>
                                        @error('image')
                                            <div class="text-danger offset-md-5 offset-3">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!--Name -->
                                    <div class="mb-3 row">
                                        <label for="name" class="form-label col-md-5   col-3">Name:</label>
                                        <div class=" col-md-6 col-8">
                                            <input type="text" class="form-control  @error('name')is-invalid @enderror"
                                                id="name" name="name"
                                                value="{{ old('name', Auth::user()->name) }}">
                                        </div>
                                        @error('name')
                                            <div class="text-danger offset-md-5 offset-3">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!--Gender -->
                                    <div class="mb-3 row">
                                        <label for="gender" class="form-label col-md-5    col-3">Gender:</label>
                                        <div class=" col-md-6 col-8">
                                            <select class="form-select" aria-label="Default select example"
                                                name="gender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--Age -->
                                    <div class="mb-3 row">
                                        <label for ="age" class="form-label col-md-5  col-3">Age:</label>
                                        <div class=" col-md-6 col-8">
                                            <input type="text" class="form-control  @error('age')is-invalid @enderror"
                                                id="age" name="age"
                                                value="{{ old('age', Auth::user()->age) }}">
                                        </div>
                                        @error('age')
                                            <div class="text-danger offset-md-5 offset-3">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!--Phone -->
                                    <div class="mb-3 row">
                                        <label for ="phone" class="form-label col-md-5   col-3">Phone:</label>
                                        <div class=" col-md-6 col-8">
                                            <input type="text"
                                                class="form-control  @error('phone')is-invalid @enderror" id="phone"
                                                name="phone" value="{{ old('phone', Auth::user()->phone) }}">
                                        </div>
                                        @error('phone')
                                            <div class="text-danger offset-md-5 offset-3">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!--Address -->
                                    <div class="mb-3 row">
                                        <label for ="address" class="form-label col-md-5   col-3">Address:</label>
                                        <div class=" col-md-6 col-8">
                                            <textarea name="address" id="address" class="form-control" cols="30" rows="3">{{ old('address', Auth::user()->address) }}</textarea>
                                        </div>
                                    </div>
                                    <!--  Edit btn -->
                                    <div class=" float-end">
                                        <input type="submit" value="Save Change" class="btn btn-success">
                                    </div>
                                </form>

                            </div>

                            <!-- End Edit Profile Tab -->

                            <!-- Change Password Tab -->
                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form action="{{ route('profile.edit.password') }}" method="POST">
                                    @csrf
                                    <!--Old Password -->
                                    <div class=" mb-3 row">
                                        <label for="oldPassword" class="form-label col-md-5   col-3">Old Password:</label>
                                        <div class="password-input-container col-md-6 col-8">
                                            <input type="password"
                                                class="form-control password-input  @error('oldPassword')is-invalid @enderror"
                                                id="oldPassword" name="oldPassword"> <i
                                                class="toggle-password fa fa-eye"></i>
                                                <i class="toggle-password fa fa-eye-slash"></i>
                                        </div>
                                        @error('oldPassword')
                                            <div class=" col-md-6 col-8 text-danger offset-md-5 offset-3">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!--New Password -->
                                    <div class="mb-3 row">
                                        <label for="newPassword" class="form-label col-md-5   col-3">New Password:</label>
                                        <div class="password-input-container col-md-6 col-8">
                                            <input type="password"
                                                class="form-control password-input  @error('newPassword')is-invalid @enderror"
                                                id="newPassword" name="newPassword"> <i
                                                class="toggle-password fa fa-eye"></i>
                                                <i class="toggle-password fa fa-eye-slash"></i>
                                        </div>
                                        @error('newPassword')
                                            <div class=" col-md-6 col-8 text-danger offset-md-5 offset-3">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!--Comfirm Password -->
                                    <div class="mb-3 row">
                                        <label for="comfirmPassword" class="form-label col-md-5   col-3">Comfirm
                                            Password:</label>
                                        <div class="password-input-container col-md-6 col-8">
                                            <input type="password"
                                                class="form-control password-input  @error('comfirmPassword')is-invalid @enderror"
                                                id="comfirmPassword" name="comfirmPassword"> <i
                                                class="toggle-password fa fa-eye"></i>
                                                <i class="toggle-password fa fa-eye-slash"></i>
                                        </div>
                                        @error('comfirmPassword')
                                            <div class=" col-md-6 col-8 text-danger offset-md-5 offset-3">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!--  Edit btn -->
                                    <div class=" float-end">
                                        <input type="submit" value="Save Change" class="btn btn-success">
                                    </div>
                                </form>

                            </div>
                            <!-- End Change Password Tab -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Card Layout-->
            <script>
                //jquery
                $(document).ready(function() {
                    $(".toggle-password").click(function() {
                        var passwordInput = $($(this).siblings(".password-input"));
                        var icon = $(this);
                        if (passwordInput.attr("type") == "password") {
                            passwordInput.attr("type", "text");
                            icon.removeClass("fa-eye-slash").addClass("fa-eye");
                        } else {
                            passwordInput.attr("type", "password");
                            icon.removeClass("fa-eye").addClass("fa-eye-slash");
                        }
                    });
                });
            </script>


        </div>
    </section>

@endsection
