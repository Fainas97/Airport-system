<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirportCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airport_company', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('airport_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();

            $table->foreign('airport_id')->references('id')
            ->on('airports');
            $table->foreign('company_id')->references('id')
            ->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airport_company_airport_id_foreign');
        Schema::dropIfExists('airport_company_company_id_foreign');
        Schema::dropIfExists('airport_company');
    }
}
