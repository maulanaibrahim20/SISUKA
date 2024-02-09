<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Table Data Pengguna</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-bordered text-nowrap mb-0">
                        <thead class="border-top">
                            <tr>
                                <th class="bg-transparent border-bottom-0 w-5">S.no</th>
                                <th class="bg-transparent border-bottom-0">Name</th>
                                <th class="bg-transparent border-bottom-0">Role</th>
                                <th class="bg-transparent border-bottom-0">Kecamatan</th>
                                <th class="bg-transparent border-bottom-0">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $data)
                                <tr class="border-bottom">
                                    <td class="text-muted fs-15 fw-semibold text-center">{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <span class="avatar avatar-md brround mt-1"
                                                style="background-image: url({{ url('assets') }}/images/users/11.jpg)"></span>
                                            <div class="ms-2 mt-0 mt-sm-2 d-block">
                                                <h6 class="mb-0 fs-14 fw-semibold">{{ $data->name }}</h6>
                                                <span class="fs-12 text-muted">{{ $data->email }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-muted fs-15 fw-semibold">
                                        @foreach ($data->roles as $role)
                                            {{ $role->name }}
                                        @endforeach
                                    </td>
                                    <td class="text-muted fs-15 fw-semibold">
                                        @if ($data->adminKec)
                                            Kecamatan : {{ $kecamatanData[$data->id] }}
                                        @elseif ($data->adminDes)
                                            Desa : {{ $desaData[$data->id] }} Kecamatan :
                                            {{ $kecamatanData[$data->id] }}
                                        @else
                                            Kabupaten : Indramayu
                                        @endif
                                    </td>
                                    <td class="text-success fs-15 fw-semibold">
                                        {{ $data->last_login ? date('l, d F Y H:i', strtotime($data->last_login)) : '-' }}
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
