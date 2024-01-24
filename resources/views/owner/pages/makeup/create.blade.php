@extends('index')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Basic Inputs</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header">Default</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="name@example.com" />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlReadOnlyInput1" class="form-label">Read only</label>
                            <input class="form-control" type="text" id="exampleFormControlReadOnlyInput1"
                                placeholder="Readonly input here..." readonly />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlReadOnlyInputPlain1" class="form-label">Read plain</label>
                            <input type="text" readonly class="form-control-plaintext"
                                id="exampleFormControlReadOnlyInputPlain1" value="email@example.com" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header">File Upload</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Default file input example</label>
                            <input class="form-control" type="file" id="formFile" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
