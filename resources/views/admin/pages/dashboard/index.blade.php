@extends('index')
@section('title', 'Dashboard Admin')
@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Dashboard</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h6 class="">Admin Kecamatan</h6>
                                    <h3 class="mb-2 number-font">{{ $jumlah_admin_kecamatan }}</h3>
                                    <p class="text-muted mb-0">
                                        <span class="text-primary"><i class="fa fa-user text-primary me-1"></i>
                                            3%</span> last month
                                    </p>
                                </div>
                                <div class="col col-auto">
                                    <div class="counter-icon bg-primary-gradient box-shadow-primary brround ms-auto">
                                        <i class="fe fe-user text-white mb-5 "></i>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h6 class="">Admin Desa</h6>
                                    <h3 class="mb-2 number-font">{{ $jumlah_admin_desa }}</h3>
                                    <p class="text-muted mb-0">
                                        <span class="text-secondary"><i class="fa fa-paint-brush text-secondary me-1"></i>
                                            3%</span> last
                                        month
                                    </p>
                                </div>
                                <div class="col col-auto">
                                    <div class="counter-icon bg-danger-gradient box-shadow-danger brround  ms-auto">
                                        <i class="fa fa-paint-brush text-white mb-5 "></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.pages.dashboard.user')


    {{-- <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Total Transactions</h3>
                </div>
                <div class="card-body pb-0">
                    <div id="chartArea" class="chart-donut"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
            <div class="card custom-card ">
                <div class="card-header">
                    <h3 class="card-title">Recent Orders</h3>
                </div>
                <div class="card-body pt-0 ps-0 pe-0">
                    <div id="recentorders" class="apex-charts ht-150"></div>
                    <div class="row sales-product-infomation pb-0 mb-0 mx-auto wd-100p mt-6">
                        <div class="col-md-6 col justify-content-center text-center">
                            <p class="mb-0 d-flex justify-content-center"><span class="legend bg-primary"></span>Delivered
                            </p>
                            <h3 class="mb-1 fw-bold">5238</h3>
                            <div class="d-flex justify-content-center ">
                                <p class="text-muted mb-0">Last 6 months</p>
                            </div>
                        </div>
                        <div class="col-md-6 col text-center float-end">
                            <p class="mb-0 d-flex justify-content-center "><span
                                    class="legend bg-background2"></span>Cancelled</p>
                            <h3 class="mb-1 fw-bold">3467</h3>
                            <div class="d-flex justify-content-center ">
                                <p class="text-muted mb-0">Last 6 months</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

@endsection
