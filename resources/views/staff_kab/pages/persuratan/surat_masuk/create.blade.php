@extends('index')
@section('title', 'Admin Staff Surat Masuk')
@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Surat Masuk</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Surat Masuk</li>
            </ol>
        </div>
        <div class="ms-auto pageheader-btn">
            <a href="{{ url('/staff/kab/surat_masuk/create') }}" class="btn btn-success btn-icon text-white">
                <span>
                    <i class="fe fe-plus"></i>
                </span> Tambah Data
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Surat Masuk</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/staff/kab/surat_masuk') }}" class="needs-validation" novalidate>
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">No. Agenda</label>
                                <input type="text" class="form-control" id="validationCustom01" name="no_agenda"
                                    required>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Tanggal Surat</label>
                                <input type="date" class="form-control" id="validationCustom02" name="tanggal_surat"
                                    required>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-xl-6 col-lg-12 mb-3">
                                <label for="validationCustom03">Nomor Surat Masuk</label>
                                <input type="text" class="form-control" id="validationCustom03" name="nomor_surat_masuk"
                                    required>
                                <div class="invalid-feedback">Please provide a valid city.</div>
                            </div>
                            <div class="col-xl-6 col-lg-12 mb-3">
                                <label for="validationCustom05">Instansi Pengirim</label>
                                <input type="text" class="form-control" id="validationCustom05" name="instansi_pengirim"
                                    required>
                                <div class="invalid-feedback">Please provide a valid zip.</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-xl-6 col-lg-12 mb-3">
                                <label for="validationCustom03">Perihal/Hal</label>
                                <input type="text" class="form-control" id="validationCustom03" name="perihal" required>
                                <div class="invalid-feedback">Please provide a valid city.</div>
                            </div>
                            <div class="col-xl-6 col-lg-12 mb-3">
                                <label for="validationCustom05">Tanggal Diterima</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    <input type="date" class="form-control" id="validationCustom05"
                                        name="tanggal_diterima" required>
                                    <div class="invalid-feedback">Please provide a valid zip.</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-xl-3 col-lg-12 mb-3">
                                <label for="validationCustom03">Klasifikasi Lampiran</label>
                                <input type="text" class="form-control" id="validationCustom03"
                                    name="klasifikasi_lampiran" required>
                                <div class="invalid-feedback">Please provide a valid city.</div>
                            </div>
                            <div class="col-xl-3 col-lg-12 mb-3">
                                <label for="validationCustom05">Lampiran</label>
                                <input type="text" class="form-control" id="validationCustom05" name="lampiran" required>
                                <div class="invalid-feedback">Please provide a valid zip.</div>
                            </div>
                            <div class="col-xl-3 col-lg-12 mb-3">
                                <label for="validationCustom03">Status</label>
                                <input type="text" class="form-control" id="validationCustom03" name="status" required>
                                <div class="invalid-feedback">Please provide a valid city.</div>
                            </div>
                            <div class="col-xl-3 col-lg-12 mb-3">
                                <label for="validationCustom05">Sifat</label>
                                <input type="text" class="form-control" id="validationCustom05" name="sifat" required>
                                <div class="invalid-feedback">Please provide a valid zip.</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck"
                                    required>
                                <label class="form-check-label" for="invalidCheck">Agree to terms and conditions</label>
                                <div class="invalid-feedback">You must agree before submitting.</div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
