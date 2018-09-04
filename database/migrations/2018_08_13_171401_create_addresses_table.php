<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('city');
            $table->string('address');
            $table->string('address_two')->nullable();
            $table->string('full_name');
            $table->Integer('zip_code');
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();     
            $table->Integer('addressable_id')->unsigned();
            $table->string('addressable_type');
            $table->Integer('country_id');
            $table->softDeletes();
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
        Schema::dropIfExists('addresses');
    }
}
