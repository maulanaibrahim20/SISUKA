@extends('auth.index_login')
@section('title', 'Login Cover - Pages | Vuexy - Bootstrap Admin Template')
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
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif
                    @if (session('danger'))
                        <div class="alert alert-danger">
                            {{ session('danger') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('login.process') }}" method="POST" class="login100-form validate-form">
                            @csrf
                            <span class="login100-form-title">
                                Login
                            </span>
                            <div class="wrap-input100 validate-input"
                                data-bs-validate = "Valid email is required: ex@abc.xyz">
                                <input value="{{ old('email') }}" class="input100" type="email" name="email"
                                    placeholder="Example@mail.com">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-bs-validate = "Password is required">
                                <input class="input100" type="password" name="password" placeholder="Password">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="zmdi zmdi-lock" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="text-end pt-1">
                                <p class="mb-0"><a href="{{ route('reset-password.index') }}"
                                        class="text-primary ms-1">Forgot
                                        Password?</a></p>
                            </div>
                            <div class="container-login100-form-btn">
                                <button type="submit" class="login100-form-btn btn-primary">
                                    Login
                                </button>
                            </div>
                            <div class="text-center pt-3">
                                <p class="text-dark mb-0">Belum Punya Akun?<a href="{{ url('/register') }}"
                                        class="text-primary ms-1">Buat Akun</a></p>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
@endsection
