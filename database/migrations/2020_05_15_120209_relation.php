<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Relation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //  This is Realations for the clients Table ..
        Schema::table('clients', function (Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('countries');
        });

         //  This is Realations for the ports Table ..
         Schema::table('ports', function (Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('port_type_id')->references('id')->on('port_types');
        });


        //  This is Realations for the bank_accounts Table ..
        Schema::table('bank_accounts', function (Blueprint $table) {
            $table->foreign('currency_id')->references('id')->on('currencies');
        });


          //  This is Realations for the suppliers Table ..
          Schema::table('suppliers', function (Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('supplier_type_id')->references('id')->on('supplier_types');
        });

         //  This is Realations for the agents Table ..
         Schema::table('agents', function (Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('countries');
        });

         //  This is Realations for the carriers Table ..
         Schema::table('carriers', function (Blueprint $table) {
            $table->foreign('carrier_type_id')->references('id')->on('carrier_types');
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
