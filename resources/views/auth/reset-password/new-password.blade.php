@extends('auth.index_login')
@section('title', 'New Password - Pages | Vuexy - Bootstrap Admin Template')
@section('content')
    <div class="page login-page">
        <div>

            <!-- CONTAINER OPEN -->
            <div class="col col-login mx-auto mt-7">
                <div class="text-center">
                    <img src="{{ url('/assets') }}/images/polindra.png" class="header-brand-img" alt="">
                </div>
            </div>
            <div class="container-login100">
                <div class="row">
                    <div class="col col-login mx-auto">
                        <form class="card shadow-none" method="post">
                            <div class="card-body">
                                <div class="text-center">
                                    <span class="login100-form-title">
                                        New Password
                                    </span>
                                    <p class="text-muted">Enter the email address registered on your account</p>
                                </div>
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
                                    <div class="alert alert-danger">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form id="formAuthentication" class="mb-3"
                                    action="{{ route('new-password.process', ['token' => request('token'), 'email' => request('email')]) }} "
                                    method="POST" novalidate>
                                    @csrf
                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label" for="password">New Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control" name="password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="password" />
                                            <span class="input-group-text cursor-pointer"><i
                                                    class="ti ti-eye-off"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label" for="confirm-password">Confirm Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="confirm_password" class="form-control"
                                                name="confirm_password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="password" />
                                            <span class="input-group-text cursor-pointer"><i
                                                    class="ti ti-eye-off"></i></span>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary d-grid w-100 mb-3">Set new
                                        password</button>
                                    <div class="text-center">
                                        <a href="auth-login-cover.html">
                                            <i class="ti ti-chevron-left scaleX-n1-rtl"></i>
                                            Back to login
                                        </a>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
    @endsection
