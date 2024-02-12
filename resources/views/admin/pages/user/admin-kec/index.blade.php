@extends('index')
@section('title', 'Admin Kecamatan')
@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Data Admin Kecamatan</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admin Kecamatan</li>
            </ol>
        </div>
        <div class="ms-auto pageheader-btn">
            <a href="{{ url('/admin/kab/create/admin-kec/create') }}" class="btn btn-success btn-icon text-white">
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
                    <h3 class="card-title">Table Data Admin Kecamatan</h3>
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
                                    <th>kecamatan</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($adminkec as $data)
                                    <tr>
                                        <td><strong>{{ $loop->iteration }}</strong></td>
                                        <td>{{ $data->userkec->name }}</td>
                                        <td>{{ $data->userkec->email }}</td>
                                        <td>
                                            @foreach ($kecamatan as $item)
                                                @if ($item['id'] == $data['kecamatan'])
                                                    {{ $item['name'] }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ url('/admin/kab/create/admin-kec/' . $data->id . '/edit') }}"
                                                class="btn btn-icon btn-warning"><i class="fe fe-edit"></i></a>
                                            <form style="display: inline;"
                                                action="{{ url('/admin/kab/create/admin-kec/' . $data->id) }}"
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

    {{-- Start Modal View --}}
    {{-- @foreach ($user as $view)
        <div class="modal fade" id="modalCenter{{ $view->id_owner }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Modal Data : {{ $view->user->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th scope="row">Nama Perusahaan</th>
                                    <td>{{ $view->nama_perusahaan }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">ID OWNER</th>
                                    <td>{{ $view->id_owner }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td>{{ $view->user->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Jenis Kelamin</th>
                                    <td>{{ $view->jk }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Provinsi</th>
                                    <td>{{ $view->kota_kab }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Alamat</th>
                                    <td>{{ $view->alamat }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">No Hp</th>
                                    <td>{{ $view->no_hp }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach --}}
    {{-- End Modal View --}}
@endsection

@section('script')
    <script>
        // Menangkap klik tombol hapus
        $('.deleteBtn').on('click', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            // Tampilkan dialog konfirmasi
            Swal.fire({
                title: 'Anda yakin ingin menghapus?',
                text: "Tindakan ini tidak dapat dibatalkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                // Jika pengguna menekan tombol "Ya, hapus!"
                if (result.isConfirmed) {
                    // Kirimkan form untuk menghapus data
                    $(this).closest('form').submit();
                }
            });
        });
    </script>
@endsection
