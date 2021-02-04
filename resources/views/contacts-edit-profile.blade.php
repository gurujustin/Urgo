@extends('layouts.master-without-nav')

@section('title')
    @lang('translation.Edit_Details')
@endsection

@section('body')

    <body>
    @endsection

    @section('content')

        <div class="home-btn d-none d-sm-block">
            <a href="{{ url('index') }}" class="text-dark"><i class="fas fa-home h2"></i></a>
        </div>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-primary">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Edit Details</h5>
                                            <p>Get your free Skote account now.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div>
                                    <a href="{{ url('index') }}">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <form method="POST" class="form-horizontal mt-4" action="/contacts-profile"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('post')

                                        @if (session('error') !== null)
                                            <div class="alert alert-danger">
                                                <strong>{{ session('error') ?? '' }}</strong>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label for="useremail">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                value="{{ Auth::user()->email }}" id="useremail" name="email" required
                                                placeholder="Enter email" disabled>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                value="{{ Auth::user()->name }}" required name="name" id="username"
                                                placeholder="Enter username">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        {{--<div class="form-group">
                                            <label for="userpassword">Password</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="{{ Auth::user()->password }}" required id="userpassword"
                                                placeholder="Enter password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="userpassword">Confirm Password</label>
                                            <input id="password-confirm" type="password" name="password_confirmation"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required placeholder="Enter password">
                                        </div> --}}

                                        <div class="form-group">
                                            <label for="userdob">Date of Birth</label>
                                            <input type="date" max="17-07-2020"
                                                class="form-control @error('dob') is-invalid @enderror" name="dob"
                                                value="{{ Auth::user()->dob }}" required id="datepicker"
                                                placeholder="Enter Birthdate">
                                            @error('dob')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="avatar">Profile Picture</label>
                                            <img src="{{ asset(Auth::user()->avatar) }}" alt=""
                                                class="img-thumbnail rounded-circle" style="width:70px; height=70px">
                                            <input type="file" class="form-control @error('avatar') is-invalid @enderror"
                                                name="avatar" id="avatar">
                                            @error('avatar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-primary btn-block waves-effect waves-light"
                                                type="submit">Update</button>
                                        </div>

                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
