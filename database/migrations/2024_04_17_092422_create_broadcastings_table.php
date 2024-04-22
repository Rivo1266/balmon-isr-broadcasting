<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('broadcastings', function (Blueprint $table) {
            $table->id();
            $table->string('license_id_mon_query')->unique();
            $table->string('curr_lic_num')->nullable();
            $table->bigInteger('clnt_id')->nullable();
            $table->bigInteger('appl_id')->nullable();
            $table->string('clnt_name')->nullable();
            $table->string('stn_name')->nullable();
            $table->string('subservice')->nullable();
            $table->double('freq')->nullable();
            $table->double('erp_pwr_dbm')->nullable();
            $table->bigInteger('bwidth')->nullable();
            $table->bigInteger('bhp')->nullable();
            $table->string('eq_mdl')->nullable();
            $table->string('ant_mdl')->nullable();
            $table->integer('hgt_ant')->nullable();
            $table->string('master_plzn_cod')->nullable();
            $table->string('stn_addr')->nullable();
            $table->double('sid_long')->nullable();
            $table->double('sid_lat')->nullable();
            $table->string('city')->nullable();
            $table->date('masa_laku')->nullable();
            $table->date('mon_query')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('broadcastings');
    }
};
