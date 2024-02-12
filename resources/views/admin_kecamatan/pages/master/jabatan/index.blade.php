@extends('index')
@section('title', 'Master Kecamatan')
@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Master Jabatan</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Jabatan</li>
            </ol>
        </div>
        <div class="ms-auto pageheader-btn">
            <a href="#modaldemo8" class="btn btn-success btn-icon text-white" data-bs-effect="effect-scale"
                data-bs-toggle="modal">
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
                    <h3 class="card-title">Table Data Jabatan</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th style="width:80px;"><strong>Id</strong></th>
                                    <th>Name</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jabatan as $data)
                                    <tr>
                                        <td><strong>{{ $loop->iteration }}</strong></td>
                                        <td>{{ $data->name }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-icon btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#EditModal{{ $data->id }}"><i
                                                    class="fe fe-edit"></i></a>
                                            <form style="display: inline;"
                                                action="{{ url('/admin/kec/master/jabatan/' . $data->id) }}" method="post">
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

    {{-- start modal tambah --}}
    <div class="modal fade" id="modaldemo8">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Edit Data
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation was-validated" method="POST" action="{{ url('/admin/kec/master/jabatan') }}">
                    @csrf <!-- Fungsi Pengamanan -->
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Nama Jabatan</label>
                                <input class="form-control mb-4" placeholder="Masukan Nama Role" required=""
                                    type="text" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end modal tambah --}}

    {{-- start modal edit --}}
    @foreach ($jabatan as $edit)
        <div class="modal fade" id="EditModal{{ $edit->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Edit Data
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="needs-validation was-validated" method="POST"
                        action="{{ url('/admin/kec/master/jabatan/' . $edit->id) }}">
                        @method('PUT')
                        @csrf <!-- Fungsi Pengamanan -->
                        <div class="modal-body">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Nama Jabatan</label>
                                    <input class="form-control mb-4" placeholder="Masukan Nama Role" required=""
                                        type="text" name="name" value="{{ $edit->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    {{-- end modal edit --}}
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
