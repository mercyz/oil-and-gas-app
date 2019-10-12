@extends('layouts.simple')

@section('content')

<!-- Page Content -->
                <div class="hero-static">
                    <div class="content">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-4">
                                <!-- Sign Up Block -->
                                <div class="block block-themed block-fx-shadow mb-0">
                                    <div class="block-header ">
                                        <h3 class="block-title">Create Account</h3>
                                        <div class="block-options">
                                            <a class="btn-block-option font-size-sm" href="javascript:void(0)" data-toggle="modal" data-target="#one-signup-terms">View Terms</a>
                                            <a class="btn-block-option" href="op_auth_signin.html" data-toggle="tooltip" data-placement="left" title="Sign In">
                                                <i class="fa fa-sign-in-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <div class="p-sm-3 px-lg-4 py-lg-5">
                                            <h1 class="mb-2">Surevisco</h1>
                                            <p>Please fill the following details to create a new account.</p>

                                            <!-- Sign Up Form -->
                                            <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _es6/pages/op_auth_signup.js) -->
                                            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                            <form class="js-validation-signup" action="{{ route('register') }}" method="POST">
                                                @csrf

                                                <div class="py-3">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-lg form-control-alt @error('name') is-invalid @enderror" value="{{ old('firstname') }}" name="firstname" placeholder="First Name" required autocomplete="firstname" autofocus>

                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-lg form-control-alt @error('name') is-invalid @enderror" value="{{ old('lastname') }}" name="lastname" placeholder="Last Name" required autocomplete="lastname" autofocus>

                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" class="form-control form-control-lg form-control-alt @error('email') is-invalid @enderror" id="signup-email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control form-control-lg form-control-alt @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password" placeholder="Password">

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control form-control-lg form-control-alt" id="password-confirm" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="signup-terms" name="signup-terms">
                                                            <label class="custom-control-label font-w400" for="signup-terms">I agree to Terms &amp; Conditions</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6 col-xl-5">
                                                        <button type="submit" class="btn btn-block btn-primary">
                                                            <i class="fa fa-fw fa-plus mr-1"></i> Sign Up
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- END Sign Up Form -->
                                        </div>
                                    </div>
                                </div>
                                <!-- END Sign Up Block -->
                            </div>
                        </div>
                    </div>
                    <div class="content content-full font-size-sm text-muted text-center">
                        <strong>Surevisco Limited</strong> &copy; <span data-toggle="year-copy"></span>
                    </div>
                </div>
                <!-- END Page Content -->


@endsection
