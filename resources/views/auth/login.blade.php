@extends('layouts.master-without-nav')

@section('title')
@lang('translation.Login')
@endsection

@section('body')
<style>
    html,
    body {
        height: 100%;
    }
</style>

<body>
    @endsection

    @section('content')
    <div class="container-fluid h-100 d-flex flex-column">
        <div class="row h-100">
            <div class="col-sm-8"
                style="background-image: url('assets/images/login_background.jpg'); background-size: cover;"></div>
            <div class="col-sm-4">
                <div class="p-5">
                    <div class="text-center">
                        <img src="assets/images/logo_dark.png" alt="logo" width="50%">
                    </div>
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="username">Email</label>
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                @if (old('email')) value="{{ old('email') }}" @else value="" @endif id="username"
                                placeholder="Enter username" autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="userpassword">Password</label>
                            <input type="password" name="password"
                                class="form-control  @error('password') is-invalid @enderror" id="userpassword" value=""
                                placeholder="Enter password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="custom-control custom-checkbox text-center mb-5">
                            <input type="checkbox" class="custom-control-input" id="keepMe">
                            <label class="custom-control-label" for="keepMe">Keep me logged in on this device</label>
                        </div>

                        <div class="mt-3">
                            <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log
                                In</button>
                        </div>

                        <div class="mt-4 text-center">
                            <a href="password/reset" class="text-muted"><i class="mdi mdi-lock mr-1"></i>
                                Forgot your password?</a>
                        </div>

                        <div class="mt-5 text-center">
                            © <script>
                                document.write(new Date().getFullYear())
        
                            </script> Ugro. Developed by <i class="mdi mdi-heart text-danger"></i> Tom Valentino</p>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    @endsection