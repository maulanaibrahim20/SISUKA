@extends('index')
@section('content')
    <div id="bootstrapToast" class="bs-toast toast toast-ex animate__animated my-2" role="alert" aria-live="assertive"
        aria-atomic="true" data-bs-delay="2000">
        <div class="toast-header">
            <i class="ti ti-bell ti-xs me-2"></i>
            <div class="me-auto fw-semibold">Bootstrap</div>
            <small class="text-muted">11 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">Hello, world! This is a toast message.</div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Dashboard Admin</h1>
            </div>
        </div>
    </div>
@endsection
