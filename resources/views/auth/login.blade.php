<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('Logo Image/my_logo_image-removebg-preview.png') }}" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--  Google Fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <!--  botstrap  css cdn link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script>
               //jquery
      $(document).ready(function () {
        $(".toggle-password").click(function () {
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
    })
        </script>
    <style>
        .password-input-container {
            position: relative;
        }

        .password-input {
            padding-right: 32px;
        }

        .toggle-password {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            z-index: 9999;
        }
    </style>
</head>

<body style="background-color:grey">
    <div class="text-center my-3">
        <img class="inline-block" src="{{ asset('Logo Image/my_logo_image-removebg-preview.png') }}" width="80" height="80"
            alt="logo">
        <h1>Login Form</h1>
    </div>
    <!--  registration form -->
    <section class="mx-auto" style="width: 500px">
        <form method="POST" style="background-color: whitesmoke; box-shadow:2px 2px 5px 5px white; border-radius:7px"
            class="p-5" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="text" class="form-control @error('email')is-invalid @enderror" id="email"
                    name="email" placeholder="Enter your email..." value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger">*{{ $message }}</div>
                @enderror
            </div>

            <div class=" mb-3">
                <label for="password" class="form-label">Password:</label>
                <div class="password-input-container ">
                    <input type="password" class="form-control password-input @error('password')is-invalid @enderror"
                        id="password" name="password" placeholder="Enter your password..."
                        value="{{ old('password') }}">
                    <i class="toggle-password fa fa-eye"></i>
                    <i class="toggle-password fa fa-eye-slash"></i>
                    @error('password')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <div class="mt-4">
                    <input style="border-radius: 5px; border:none" class="bg-success py-2 px-3" type="submit"
                        value="login">
                </div>
            </div>
        </form>
    </section>
</body>
<!--  botstrap  js cdn link  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
<script>
</html>
