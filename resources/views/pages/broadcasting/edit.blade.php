@extends('layouts.app', ['title' => 'Edit Broadcasting'])

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Isi Data Broadcasting</h6>
                    <form action="{{ route('broadcastings.update', $broadcasting->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="license_id_mon_query" class="form-label">LICENSE_ID_MON_QUERY</label>
                            <input type="text" name="license_id_mon_query" class="form-control" id="license_id_mon_query"
                                value="{{ $broadcasting->license_id_mon_query }}">
                        </div>
                        <div class="mb-3">
                            <label for="clnt_id" class="form-label">CLNT_ID</label>
                            <input type="number" name="clnt_id" class="form-control" id="clnt_id"
                                value="{{ $broadcasting->clnt_id }}">
                        </div>
                        <div class="mb-3">
                            <label for="appl_id" class="form-label">APPL_ID</label>
                            <input type="number" name="appl_id" class="form-control" id="appl_id"
                                value="{{ $broadcasting->appl_id }}">
                        </div>
                        <div class="mb-3">
                            <label for="erp_pwr_dbm" class="form-label">ERP_PWR_DBM</label>
                            <input type="text" name="erp_pwr_dbm" class="form-control" id="erp_pwr_dbm"
                                value="{{ $broadcasting->erp_pwr_dbm }}">
                        </div>
                        <div class="mb-3">
                            <label for="bwidth" class="form-label">BWIDTH</label>
                            <input type="text" name="bwidth" class="form-control" id="bwidth"
                                value="{{ $broadcasting->bwidth }}">
                        </div>
                        <div class="mb-3">
                            <label for="bhp" class="form-label">BHP</label>
                            <input type="text" name="bhp" class="form-control" id="bhp"
                                value="{{ $broadcasting->bhp }}">
                        </div>
                        <div class="mb-3">
                            <label for="eq_mdl" class="form-label">EQ_MDL</label>
                            <input type="text" name="eq_mdl" class="form-control" id="eq_mdl"
                                value="{{ $broadcasting->eq_mdl }}">
                        </div>
                        <div class="mb-3">
                            <label for="ant_mdl" class="form-label">ANT_MDL</label>
                            <input type="text" name="ant_mdl" class="form-control" id="ant_mdl"
                                value="{{ $broadcasting->ant_mdl }}">
                        </div>
                        <div class="mb-3">
                            <label for="hgt_ant" class="form-label">HGT_ANT</label>
                            <input type="text" name="hgt_ant" class="form-control" id="hgt_ant"
                                value="{{ $broadcasting->hgt_ant }}">
                        </div>
                        <div class="mb-3">
                            <label for="master_plzn_code" class="form-label">MASTER_PLZN_CODE</label>
                            <input type="text" name="master_plzn_code" class="form-control" id="master_plzn_code"
                                value="{{ $broadcasting->master_plzn_code }}">
                        </div>
                        <div class="mb-3">
                            <label for="sid_long" class="form-label">SID_LONG</label>
                            <input type="text" name="sid_long" class="form-control" id="sid_long"
                                value="{{ $broadcasting->sid_long }}">
                        </div>
                        <div class="mb-3">
                            <label for="sid_lat" class="form-label">SID_LAT</label>
                            <input type="text" name="sid_lat" class="form-control" id="sid_lat"
                                value="{{ $broadcasting->sid_lat }}">
                        </div>
                        <div class="mb-3">
                            <label for="mon_query" class="form-label">MON_QUERY</label>
                            <input type="date" name="sid_lat" class="form-control" id="mon_query"
                                value="{{ $broadcasting->mon_query }}">
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save me-2"></i>Simpan</button>
                        <button type="reset" class="btn btn-outline-primary m-2"><i
                                class="fa fa-eraser me-2"></i>Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
