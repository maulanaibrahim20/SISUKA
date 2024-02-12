@extends('index')
@section('title', 'Staff Desa')
@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Staff Desa</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Staff Desa</li>
            </ol>
        </div>
        <div class="ms-auto pageheader-btn">
            <a href="{{ url('/admin/des/create/staff/create') }}" class="btn btn-success btn-icon text-white">
                <span>
                    <i class="fe fe-plus"></i>
                </span> Tambah Data
            </a>
        </div>
    </div>
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Table Data Staff Desa</h3>
                </div>
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
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th style="width:80px;"><strong>No.</strong></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Jabatan</th>
                                    <th>Kab/Kec</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($staff as $data)
                                    <tr>
                                        <td><strong>{{ $loop->iteration }}</strong></td>
                                        <td>{{ $data->user->name }}</td>
                                        <td>{{ $data->user->email }}</td>
                                        <td>{{ $data->jabatan->name }}</td>
                                        <td>{{ $data->user->email }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('/admin/kab/create/staff/' . $data->id . '/edit') }}"
                                                class="btn btn-icon btn-warning"><i class="fe fe-edit"></i></a>
                                            <form style="display: inline;"
                                                action="{{ url('/admin/kab/create/staff/' . $data->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" data-id="{{ $data->id }}"
                                                    class="btn btn-danger  deleteBtn">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
