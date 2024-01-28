@extends('index')
@section('title', 'Edit Profile')
@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Profile : {{ $profile->name }}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
            </ol>
        </div>
    </div>
    <div class="row">
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif
        <div class="col-xl-4 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Password</div>
                </div>
                <form action="{{ url('/admin/kab/profile/proccess_update_password/' . $profile->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <img alt="User Avatar" class="rounded-circle avatar-lg me-2"
                                src="{{ url('/assets') }}/images/users/8.jpg">
                            <div class="ms-auto mt-xl-2 mt-lg-0 me-lg-2">
                                <a href="editprofile.html" class="btn btn-primary btn-sm mt-1 mb-1"><i
                                        class="fe fe-camera me-1 float-start"></i>Edit profile</a>
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm mt-1 mb-1"><i
                                        class="fe fe-camera-off me-1 float-start"></i>Delete profile</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Current Password</label>
                            <input type="password" name="current_password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">New Password</label>
                            <input type="password" name="new_password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="new_password_confirmation" class="form-control" required>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ url('/admin/kab/profile') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xl-8 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Profile</h3>
                </div>
                <form action="{{ url('/admin/kab/profile/proccess_edit_profile/' . $profile->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputname">Name</label>
                                    <input value="{{ $profile->name }}" type="text" class="form-control"
                                        id="exampleInputname" name="name" placeholder="First Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input value="{{ $profile->email }}" type="email" name="email" class="form-control"
                                id="exampleInputEmail1" placeholder="email address">
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-success mt-1">Save</button>
                        <button type="cancel" class="btn btn-danger mt-1">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
