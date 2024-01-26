@extends('index')
@section('title', 'Admin Kecamatan Update Admin Desa' . Auth::user()->name)
@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Create Admin</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Admin</li>
            </ol>
        </div>
    </div>
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{ url('/admin/kec/create/admin-des/' . $user->id) }}" method="POST" class="needs-validation"
                    novalidate>
                    @csrf
                    @method('PUT')
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Nama Admin</label>
                        <input value="{{ $user->userdes->name }}" type="text" name="name" class="form-control"
                            id="validationCustom01" value="" placeholder="asd" required>
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom02">Email</label>
                        <input value="{{ $user->userdes->email }}" type="email" name="email" class="form-control"
                            id="validationCustom02" value="" placeholder="asd@mail.com" required>
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="desa"> Kelurahan/Desa </label>
                        <select name="desa" class="form-control" id="desa">
                            <option value="">- Pilih -</option>
                            @foreach ($desa as $item)
                                <option value="{{ $item['id'] }}" @if ($item['id'] == $user['desa']) selected @endif>
                                    {{ $item['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <a href="{{ url('/admin/kec/create/admin-des') }}" class="btn btn-warning"><i
                                    class="fa fa-arrow-left"></i>Back</a>
                            <button type="submit" class="btn btn-primary ms-2">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
