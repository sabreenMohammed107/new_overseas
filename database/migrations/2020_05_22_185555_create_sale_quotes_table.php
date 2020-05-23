<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_quotes', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('quote_date', 6)->nullable();
            $table->string('quote_code', 250)->nullable();
            $table->integer('client_id')->unsigned()->nullable();
            $table->integer('ocean_air_type')->nullable();
            $table->integer('air_rate_id')->unsigned()->nullable();
            $table->dateTime('air_validity_date', 6)->nullable();
            $table->double('air_price')->nullable();
            $table->integer('air_currency_id')->unsigned()->nullable();
            $table->integer('air_aol_id')->unsigned()->nullable();
            $table->integer('air_aod_id')->unsigned()->nullable();
            $table->string('air_slide_range', 250)->nullable();
            $table->text('air_notes')->nullable();
            $table->integer('ocean_rate_id')->unsigned()->nullable();
            $table->double('ocean_price')->nullable();
            $table->dateTime('ocean_validity_date', 6)->nullable();
            $table->integer('ocean_currency_id')->unsigned()->nullable();
            $table->integer('ocean_pol_id')->unsigned()->nullable();
            $table->integer('ocean_pod_id')->unsigned()->nullable();
            $table->integer('ocean_container_id')->unsigned()->nullable();
            $table->integer('ocean_transit_time')->nullable();
            $table->text('ocean_notes')->nullable();
            $table->integer('trucking_rate_id')->unsigned()->nullable();
            $table->string('trucking_company', 250)->nullable();
            $table->dateTime('trucking_validity_date', 6)->nullable();
            $table->integer('trucking_pol_id')->unsigned()->nullable();
            $table->integer('trucking_pod_id')->unsigned()->nullable();
            $table->text('trucking_notes')->nullable();
            $table->double('faradany_price')->nullable();
            $table->integer('faradany_currency_id')->unsigned()->nullable();
            $table->double('trailer_price')->nullable();
            $table->integer('trailer_currency_id')->unsigned()->nullable();
            $table->double('grar_price')->nullable();
            $table->integer('grar_currency_id')->unsigned()->nullable();
            $table->double('hrf_price')->nullable();
            $table->integer('hrf_currency_id')->unsigned()->nullable();
            $table->double('clearance_price')->nullable();
            $table->integer('clearance_currency_id')->unsigned()->nullable();
            $table->text('clearance_notes')->nullable();
            $table->double('door_door_price')->nullable();
            $table->integer('door_door_currency_id')->unsigned()->nullable();
            $table->text('door_door_notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_quotes');
    }
}
