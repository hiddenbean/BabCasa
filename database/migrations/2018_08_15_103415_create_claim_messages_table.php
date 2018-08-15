<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaimMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claim_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->text('message');
            $table->string('status');
            $table->string('claim_messageable_type');
            $table->integer('claim_messageable_id');
            $table->integer('claim_id');
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
        Schema::dropIfExists('claim_messages');
    }
}
