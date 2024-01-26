@extends('index')
@section('title', 'Admin Kecamatan')
@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Table Data Admin Desa</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Admin Desa</li>
            </ol>
        </div>
        <div class="ms-auto pageheader-btn">
            <a href="{{ url('/admin/kec/create/admin-des/create') }}" class="btn btn-success btn-icon text-white">
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
                    <h3 class="card-title">Table Data Admin Desa</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th style="width:80px;"><strong>No.</strong></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Desa</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admindes as $data)
                                    <tr>
                                        <td><strong>{{ $loop->iteration }}</strong></td>
                                        <td>{{ $data->userdes->name }}</td>
                                        <td>{{ $data->userdes->email }}</td>
                                        <td>
                                            @foreach ($desa as $item)
                                                @if ($item['id'] == $data['desa'])
                                                    {{ $item['name'] }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ url('/admin/kec/create/admin-des/' . $data->id . '/edit') }}"
                                                class="btn btn-icon btn-warning"><i class="fe fe-edit"></i></a>
                                            <form style="display: inline;"
                                                action="{{ url('/admin/kec/create/admin-des/' . $data->id) }}"
                                                method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" data-id="{{ $data->id }}"
                                                    class="btn btn-danger  deleteBtn">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Menggunakan SweetAlert untuk konfirmasi
            $('.deleteBtn').on('click', function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika pengguna menekan OK, kirimkan formulir
                        $('#deleteForm' + id).submit();
                    }
                });
            });
        });
    </script>
@endsection
