@extends('index')
@section('title', 'Update Admin Kecamatan')
@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Update Admin Kecamatan</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Admin Kecamatan</li>
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
                <form action="{{ url('/admin/kab/create/admin-kec/' . $user->id) }}" method="POST" class="needs-validation"
                    novalidate>
                    @method('PUT')
                    @csrf
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Nama Admin</label>
                        <input value="{{ $user->userkec->name }}" type="text" name="name" class="form-control"
                            id="validationCustom01" value="" placeholder="asd" required>
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom02">Email</label>
                        <input value="{{ $user->userkec->email }}" type="email" name="email" class="form-control"
                            id="validationCustom02" value="" placeholder="asd@mail.com" required>
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="kecamatan"> Kecamatan </label>
                        <select name="kecamatan" class="form-control form-select select2" id="kecamatan">
                            <option value="">- Pilih -</option>
                            @foreach ($kecamatan as $item)
                                @php
                                    $isDisabled = $adminKecId->contains($item->id);
                                @endphp
                                <option value="{{ $item['id'] }}"
                                    {{ $isDisabled && $item['id'] != $user['kecamatan'] ? 'disabled' : '' }}
                                    @if ($item['id'] == $user['kecamatan']) selected @endif>
                                    {{ $item['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <a href="{{ url('/admin/kab/create/admin-kec') }}" type="submit" class="btn btn-warning"><i
                                    class="fa fa-arrow-left"></i>Back</a>
                            <button type="submit" class="btn btn-primary ms-2">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
