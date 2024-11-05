<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commens', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('cm_content')->nullable();
            $table->integer('cm_user_id')->nullable();
            $table->integer('cm_admin_id')->nullable();
            $table->integer('cm_parent_id')->nullable();
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
        Schema::dropIfExists('commens');
    }
}
