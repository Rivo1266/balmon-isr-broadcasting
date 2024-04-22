@extends('layouts.app', ['title' => 'Data Broadcasting'])

@push('style')
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid pt-4 px-4">
        <form id="import" action="{{ route('broadcastings.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="import_file" class="form-label">Import File :</label>
                <input class="form-control" type="file" name="import_file" id="import_file">
            </div>
            <button type="submit" class="btn btn-primary mb-3"><i class="fa fa-upload me-2"></i>Import</button>
        </form>
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Data Broadcasting</h6>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="tbl-broadcasting">
                        <thead>
                            <tr>
                                <th scope="col">LICENSE_ID_MON_QUERY</th>
                                <th scope="col">CLNT_ID</th>
                                <th scope="col">APPL_ID</th>
                                <th scope="col">ERP_PWR_DBM</th>
                                <th scope="col">BWIDTH</th>
                                <th scope="col">BHP</th>
                                <th scope="col">EQ_MDL</th>
                                <th scope="col">ANT_MDL</th>
                                <th scope="col">HGT_ANT</th>
                                <th scope="col">MASTER_PLZN_CODE</th>
                                <th scope="col">SID_LONG</th>
                                <th scope="col">SID_LAT</th>
                                <th scope="col">MON_QUERY</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($broadcastings as $broadcasting)
                                <tr>
                                    <td>{{ $broadcasting->license_id_mon_query }}</td>
                                    <td>{{ $broadcasting->clnt_id }}</td>
                                    <td>{{ $broadcasting->appl_id }}</td>
                                    <td>{{ $broadcasting->erp_pwr_dbm }}</td>
                                    <td>{{ $broadcasting->bwidth }}</td>
                                    <td>{{ $broadcasting->bhp }}</td>
                                    <td>{{ $broadcasting->eq_mdl }}</td>
                                    <td>{{ $broadcasting->ant_mdl }}</td>
                                    <td>{{ $broadcasting->hgt_ant }}</td>
                                    <td>{{ $broadcasting->master_plzn_code }}</td>
                                    <td>{{ $broadcasting->sid_long }}</td>
                                    <td>{{ $broadcasting->sid_lat }}</td>
                                    <td>{{ $broadcasting->mon_query }}</td>               
                                    <td>
                                        <div
                                            class="d-grid
                                            gap-2 d-md-block text-center">
                                            <a href="{{ route('broadcastings.edit', $broadcasting->id) }}"
                                                class="btn btn-warning btn-sm mx-2"><i class="fas fa-edit"></i> Edit</a>
                                            <form action="{{ route('broadcastings.destroy', $broadcasting->id) }}"
                                                method="POST">
                                                <input type="hidden" name="_method" value="DELETE" />
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                <button class="btn btn-danger btn-sm show_confirm" type="submit"><i
                                                        class="fa fa-trash"></i>
                                                    Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        new DataTable('#tbl-broadcasting')
    </script>
    <script src="{{ asset('dashmin') }}/assets/js/sweetalert2.all.min.js"></script>

    <script>
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();

            Swal.fire({
                    title: "Apakah Anda Yakin Ingin Menghapus Data Berikut?",
                    text: "Data Yang Dihapus Tidak Dapat Dikembalikan.",
                    icon: "warning",
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonColor: "#28a745",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Hapus",
                    cancelButtonText: "Batal",
                })
                .then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        form.submit();
                    }
                });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#import').on('submit', function(e) {
                e.preventDefault(); // Prevent the form from submitting normally
                let timerInterval;
                Swal.fire({
                    title: "Data Sedang Diimport..",
                    timer: 360000,
                    allowOutsideClick: false,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading();
                        const timer = Swal.getPopup().querySelector("b");
                        timerInterval = setInterval(() => {
                            timer.textContent = `${Swal.getTimerLeft()}`;
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                    },
                    onBeforeOpen: () => {
                        Swal.showLoading();
                    }
                });
                setTimeout(() => {
                    e.target.submit();
                }, 500);
            });
        });
    </script>
@endpush
