<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeywordLibrarysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keyword_librarys', function (Blueprint $table) {
            $table->increments('id');
            $table->char('kwl_name',50);
            $table->char('kwl_slug')->unique()->index();
            $table->integer('kwl_hit')->default(0)->nullable()->index();
            $table->integer('kwl_admin_id')->nullable()->default(0);
            $table->tinyInteger('kwl_count_word')->default(0)->nullable();
            $table->tinyInteger('kwl_active')->default(1)->nullable()->index();
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
        Schema::dropIfExists('keyword_librarys');
    }
}
