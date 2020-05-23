<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SaleRelation extends Migration
{
    /**
     * Run the migrations.
     * 
     * 
     * 
     *
     * @return void
     */
    public function up()
    {
       //  This is Realations for the sale_quotes Table ..
       Schema::table('sale_quotes', function (Blueprint $table) {
        $table->foreign('client_id')->references('id')->on('clients');
        $table->foreign('air_rate_id')->references('id')->on('air_rates');
        $table->foreign('air_currency_id')->references('id')->on('currencies');
        $table->foreign('air_aol_id')->references('id')->on('ports');
        $table->foreign('air_aod_id')->references('id')->on('ports');


        $table->foreign('ocean_rate_id')->references('id')->on('ocean_freight_rates');
        $table->foreign('ocean_currency_id')->references('id')->on('currencies');
        $table->foreign('ocean_pol_id')->references('id')->on('ports');
        $table->foreign('ocean_pod_id')->references('id')->on('ports');
        $table->foreign('ocean_container_id')->references('id')->on('containers');




        $table->foreign('trucking_rate_id')->references('id')->on('trucking_rates');
        $table->foreign('trucking_pol_id')->references('id')->on('ports');
        $table->foreign('trucking_pod_id')->references('id')->on('ports');
        $table->foreign('faradany_currency_id')->references('id')->on('currencies');
        $table->foreign('trailer_currency_id')->references('id')->on('currencies');



        $table->foreign('grar_currency_id')->references('id')->on('currencies');
        $table->foreign('hrf_currency_id')->references('id')->on('currencies');
        $table->foreign('clearance_currency_id')->references('id')->on('currencies');
        $table->foreign('door_door_currency_id')->references('id')->on('currencies');
      
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
