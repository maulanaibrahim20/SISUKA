@extends('index')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">{{ $page_nonActive }}/</span>
            {{ $page_active }}
        </h4>
        <div class="col-md">
            <div class="card">
                <h5 class="card-header">{{ $title }}</h5>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ url('/admin/create/owner') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="bs-validation-name">Nama Perusahaan</label>
                            <input type="text" name="nama_perusahaan" class="form-control" id="bs-validation-name"
                                placeholder="xxx Salon" required />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter your Perusahaan.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="bs-validation-name">Name</label>
                            <input type="text" name="name" class="form-control" id="bs-validation-name"
                                placeholder="John Doe" required />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter your name.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="bs-validation-email">Email</label>
                            <input type="email" name="email" id="bs-validation-email" class="form-control"
                                placeholder="john.doe" aria-label="john.doe" required />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter a valid email</div>
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="bs-validation-password">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" name="password" id="bs-validation-password" class="form-control"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    required />
                                <span class="input-group-text cursor-pointer" id="basic-default-password4"><i
                                        class="ti ti-eye-off"></i></span>
                            </div>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter your password.</div>
                        </div>
                        <div class="mb-3">
                            <label class="d-block form-label">Jenis Kelamin</label>
                            <div class="form-check mb-2">
                                <input type="radio" id="bs-validation-radio-male" value="laki-laki" name="jk"
                                    class="form-check-input" required />
                                <label class="form-check-label" for="bs-validation-radio-male">Laki Laki</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="bs-validation-radio-female" value="perempuan" name="jk"
                                    class="form-check-input" required />
                                <label class="form-check-label" for="bs-validation-radio-female">Perempuan</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kota_kab"> Kota/Kab </label>
                            <select name="kota_kab" class="form-control" id="kota_kab">
                                <option value="">- Pilih -</option>
                                @foreach ($kota_kab as $item)
                                    <option value="{{ $item['id'] }}">
                                        {{ $item['name'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kecamatan"> Kecamatan </label>
                            <select name="kecamatan" class="form-control" id="kecamatan">
                                <option value="">- Pilih -</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Kelurahan"> Kelurahan </label>
                            <select name="kelurahan" class="form-control" id="kelurahan">
                                <option value="">- Pilih -</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="bs-validation-email">Alamat</label>
                            <input type="text" name="alamat" id="bs-validation-email" class="form-control"
                                placeholder="Indramayu" aria-label="john.doe" required />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter a valid Alamat</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="bs-validation-email">Nomer HP</label>
                            <input type="number" name="no_hp" id="bs-validation-email" class="form-control"
                                placeholder="08xxxxxxx" aria-label="john.doe" required />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter a valid Nomor HP</div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <a href="{{ url('/admin/create-client/index') }}" type="submit"
                                    class="btn btn-warning"><i class="fa fa-arrow-left"></i>Back</a>
                                <button type="submit" class="btn btn-primary ms-2">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
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
    </script>
@endsection
