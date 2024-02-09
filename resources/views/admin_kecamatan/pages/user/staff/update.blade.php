@extends('index')
@section('title', 'Tambah Staff Kecamatan')
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
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ url('/admin/kec/create/staff/' . $staff->id) }}" method="POST" class="needs-validation"
                    novalidate>
                    @method('PUT')
                    @csrf
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Nama Staff</label>
                        <input type="text" name="name" class="form-control" id="validationCustom01"
                            value="{{ $staff->user->name }}" placeholder="asd" required>
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="bg-danger-transparent-2 text-success px-4 py-2 br-3 mb-4">example :
                            staff.kec.(jabatan)@example.com
                        </div>
                        <label for="validationCustom02">Email</label>
                        <input type="email" name="email" class="form-control" id="validationCustom02"
                            value="{{ $staff->user->email }}" placeholder="asd@mail.com" required>
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="jabatan">Jabatan</label>
                        <select name="jabatan" class="form-control form-select select2" data-bs-placeholder="Pilih Jabatan"
                            id="jabatan">
                            <option value="">- Pilih -</option>
                            @foreach ($jabatan as $item)
                                <option value="{{ $item->id }}"
                                    {{ $staff->jabatan_kecamatan_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <a href="{{ url('/superadmin/create/admin') }}" type="submit" class="btn btn-warning"><i
                                    class="fa fa-arrow-left"></i>Back</a>
                            <button type="submit" class="btn btn-primary ms-2">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
