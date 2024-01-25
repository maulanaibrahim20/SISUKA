@extends('auth.index_login')
@section('title', 'Register Cover - Pages | Vuexy - Bootstrap Admin Template')
@section('content')
    <div class="page login-page">
        <div>
            <!-- CONTAINER OPEN -->
            <div class="col col-login mx-auto mt-7">
                <div class="text-center">
                    <img src="{{ url('/assets') }}/images/brand/logo.png" class="header-brand-img" alt="">
                    <h1>SISUKA</h1>
                </div>
            </div>
            <div class="container-login100">
                <div class="wrap-login100 p-0">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register.process') }}" class="login100-form validate-form">
                            @csrf
                            <span class="login100-form-title">
                                Registration
                            </span>
                            <div class="wrap-input100 validate-input" data-bs-validate = "Valid name is required: asd">
                                <input class="input100" type="text" name="name" placeholder="Name">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="mdi mdi-account" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input"
                                data-bs-validate = "Valid email is required: ex@abc.xyz">
                                <input class="input100" type="email" name="email" placeholder="Email">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-bs-validate = "Password is required">
                                <input class="input100" type="password" name="password" placeholder="Password">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="zmdi zmdi-lock" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-bs-validate = "Password is required">
                                <input class="input100" type="password" name="confirm_password" id="confirm_password"
                                    placeholder="Password">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="zmdi zmdi-lock" aria-hidden="true"></i>
                                </span>
                            </div>
                            <label class="custom-control custom-checkbox mt-4">
                                <input type="checkbox" class="custom-control-input">
                                <span class="custom-control-label">Agree the <a href="terms.html">terms and
                                        policy</a></span>
                            </label>
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="container-login100-form-btn">
                                <button type="submit" class="login100-form-btn btn-primary">
                                    Register
                                </button>
                            </div>
                            <div class="text-center pt-3">
                                <p class="text-dark mb-0">Already have account?<a href="{{ url('/login') }}"
                                        class="text-primary ms-1">Sign In</a></p>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center my-3">
                            <a href="" class="social-login  text-center me-4">
                                <i class="fa fa-google"></i>
                            </a>
                            <a href="" class="social-login  text-center me-4">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="" class="social-login  text-center">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
@endsection
