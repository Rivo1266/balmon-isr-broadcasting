<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Broadcasting extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'license_id_mon_query',
        'curr_lic_num',
        'clnt_id',
        'appl_id',
        'clnt_name',
        'stn_name',
        'subservice',
        'freq',
        'erp_pwr_dbm',
        'bwidth',
        'bhp',
        'eq_mdl',
        'ant_mdl',
        'hgt_ant',
        'master_plzn_cod',
        'stn_addr',
        'sid_long',
        'sid_lat',
        'city',
        'masa_laku',
        'mon_query',
    ];
}
