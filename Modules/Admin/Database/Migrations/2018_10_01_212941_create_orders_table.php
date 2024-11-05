<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('o_guest_id')->index()->nullable();
            $table->integer('o_product_id')->nullabe()->default(0);
            $table->tinyInteger('o_submit')->default(0)->nullable();
            $table->tinyInteger('o_status')->default(0)->nullable();
            $table->string('o_messages')->nullable();
            $table->string('o_ip',20)->nullable();
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
        Schema::dropIfExists('order');
    }
}
