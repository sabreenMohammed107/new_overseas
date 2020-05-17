<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTruckingRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trucking_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('trucking_company', 250)->nullable();
            $table->integer('pol_id')->unsigned()->nullable();
            $table->integer('pod_id')->unsigned()->nullable();
            $table->double('faradany_price')->nullable();
            $table->integer('faradany_currency_id')->unsigned()->nullable();
            $table->double('trailer_price')->nullable();
            $table->integer('trailer_currency_id')->unsigned()->nullable();
            $table->double('grar_price')->nullable();
            $table->integer('grar_currency_id')->unsigned()->nullable();
            $table->double('hrf_price')->nullable();
            $table->integer('hrf_currency_id')->unsigned()->nullable();
            $table->integer('transit_time')->nullable();
            $table->dateTime('validity_date', 6)->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('trucking_rates');
    }
}
