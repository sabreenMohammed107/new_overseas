<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OceanRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       //  This is Realations for the ocean_freight_rates Table ..
       Schema::table('ocean_freight_rates', function (Blueprint $table) {
        $table->foreign('carrier_id')->references('id')->on('carriers');
        $table->foreign('pol_id')->references('id')->on('port_types');
        $table->foreign('pod_id')->references('id')->on('port_types');
        $table->foreign('container_id')->references('id')->on('containers');
        $table->foreign('currency_id')->references('id')->on('currencies');
    });

     //  This is Realations for the trucking_rates Table ..
     Schema::table('trucking_rates', function (Blueprint $table) {
        $table->foreign('pol_id')->references('id')->on('port_types');
        $table->foreign('pod_id')->references('id')->on('port_types');
        $table->foreign('faradany_currency_id')->references('id')->on('currencies');
        $table->foreign('trailer_currency_id')->references('id')->on('currencies');
        $table->foreign('grar_currency_id')->references('id')->on('currencies');
        $table->foreign('hrf_currency_id')->references('id')->on('currencies');
    });

    //  This is Realations for the air_rates Table ..
    Schema::table('air_rates', function (Blueprint $table) {
        $table->foreign('air_carrier_id')->references('id')->on('carriers');
        $table->foreign('currency_id')->references('id')->on('currencies');
        $table->foreign('aol_id')->references('id')->on('port_types');
        $table->foreign('aod_id')->references('id')->on('port_types');
      
    });

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
