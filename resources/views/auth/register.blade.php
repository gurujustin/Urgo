@extends('layouts.master-without-nav')

@section('title')
@lang('translation.Register')
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
                    <form method="POST" class="form-horizontal mt-4" action="{{ route('register') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                        value="{{ old('first_name') }}" required name="first_name" id="first_name"
                                        placeholder="Enter first name">
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                        value="{{ old('last_name') }}" required name="last_name" id="last_name"
                                        placeholder="Enter last name">
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="useremail">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" id="useremail" name="email" required
                                placeholder="Enter email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label for="userpassword">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" required id="userpassword" placeholder="Enter password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="userpassword">Confirm Password</label>
                            <input id="password-confirm" type="password" name="password_confirmation"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                placeholder="Enter Confirm password">
                        </div>

                        {{-- <div class="form-group">
                                            <label for="userdob">Date of Birth</label>
                                            <input type="date" max="17-07-2020"
                                                class="form-control @error('dob') is-invalid @enderror" name="dob" required
                                                id="datepicker" placeholder="Enter Birthdate">
                                            @error('dob')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="avatar">Profile Picture</label>
                    <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" required
                        id="avatar">
                    @error('avatar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> --}}

                <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_SITE_KEY') }}"></div>
                    @if ($errors->has('g-recaptcha-response'))
                    <span class="invalid-feedback" style="display: block;">
                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit"><i
                            class="fas fa-user-plus"></i>&nbsp;&nbsp;Register </button>
                </div>

                <div class="mt-5 text-center">
                    <p>Already have an account ? <a href="{{ url('login') }}" class="font-weight-medium text-primary">
                            Login </a> </p>
                    <p>© <script>
                            document.write(new Date().getFullYear())
                
                        </script> Urgo. Developed by <i class="mdi mdi-heart text-danger"></i> Tom Valentino</p>
                </div>


                </form>
            </div>

        </div>
    </div>
    </div>
    @endsection
    @section('script')
    <script src='https://www.google.com/recaptcha/api.js'></script>
    @endsection