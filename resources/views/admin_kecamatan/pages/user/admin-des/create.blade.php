@extends('index')
@section('title', 'Admin Kecamatan')
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
                <form action="{{ url('/admin/kec/create/admin-des') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Nama Admin</label>
                        <input type="text" name="name" class="form-control" id="validationCustom01" value=""
                            placeholder="asd" required>
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom02">Email</label>
                        <input type="email" name="email" class="form-control" id="validationCustom02" value=""
                            placeholder="asd@mail.com" required>
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom02">Password</label>
                        <input type="password" name="password" class="form-control" id="validationCustom02" value=""
                            placeholder="asddd" required>
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="desa"> Kelurahan/Desa </label>
                        <select name="desa" class="form-control form-select select2" id="desa">
                            <option value="">- Pilih -</option>
                            @foreach ($desa as $item)
                                @php
                                    $isDisabled = $adminKecDesaId->contains($item->id);
                                @endphp
                                <option value="{{ $item->id }}" {{ $isDisabled ? 'disabled' : '' }}>
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
@section('script')
    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $("#kota_kab").change(function() {
                let kota_kab = $("#kota_kab").val(); // Mengambil nilai kota/kabupaten yang dipilih
                $.ajax({
                    url: "{{ url('/admin/wilayah/ambil_kecamatan') }}",
                    type: "GET",
                    data: {
                        kota_kab: kota_kab
                    },
                    success: function(res) {
                        $("#kecamatan").html(res);
                    },
                    error: function() {
                        alert('Gagal mengambil data kecamatan.');
                    }
                });
            });
            $("#kecamatan").change(function() {
                let kecamatan = $("#kecamatan").val();
                $.ajax({
                    url: "{{ url('/admin/wilayah/ambil_kelurahan') }}",
                    type: "GET",
                    data: {
                        kecamatan: kecamatan
                    },
                    success: function(res) {
                        $("#kelurahan").html(res);
                    },
                    error: function() {
                        alert('Gagal mengambil data kelurahan.');
                    }
                });
            });
        });
    </script> --}}
@endsection
