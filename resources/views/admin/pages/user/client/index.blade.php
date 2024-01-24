@extends('index')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div
            class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row py-3 mb-4">
            <h5 class="card-title mb-sm-0 me-2"><span class="text-muted fw-light">Create Account User /</span> Create Client
                Table
            </h5>
            <div class="action-btns">
                <a href="{{ url('/admin/create/client/create') }}" class="btn btn-primary fa fa-plus"> Add New
                    Client</a>
            </div>
        </div>
        <!-- Basic Bootstrap Table -->
        <div class="card">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <h5 class="card-header">{{ $title }}</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>ID Customer</th>
                            <th>Nama Client</th>
                            <th>Email Client</th>
                            <th>status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($user as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->id_customer }}</td>
                                <td>{{ $data->user->name }}</td>
                                <td>{{ $data->user->email }}</td>
                                <td>
                                    @if ($data->user->email_verified_at)
                                        <span class="badge bg-label-success me-1">Verified</span>
                                    @else
                                        <span class="badge bg-label-danger me-1">Not Verified</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('/admin/create/client/' . $data->id_customer . '/edit') }}"
                                        class="btn btn-warning"><i class="ti ti-edit"></i></a>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalCenter{{ $data->id_customer }}">
                                        <i class="ti ti-eye"></i></button>
                                    <form id="deleteForm{{ $data->id_customer }}"
                                        action="{{ url('/admin/create/client/' . $data->id_customer) }}"
                                        style="display: inline;" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-danger deleteBtn"
                                            data-id="{{ $data->id_customer }}"><i class="ti ti-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Start Modal View --}}
    @foreach ($user as $view)
        <div class="modal fade" id="modalCenter{{ $view->id_customer }}" tabindex="-1" aria-hidden="true">
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
                                    <th scope="row">ID_CUSTOMER</th>
                                    <td>{{ $view->id_customer }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td>{{ $view->user->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Pekerjaan</th>
                                    <td>{{ $view->pekerjaan }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Jenis Kelamin</th>
                                    <td>{{ $view->jk }}</td>
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
    @endforeach
    {{-- End Modal View --}}
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
