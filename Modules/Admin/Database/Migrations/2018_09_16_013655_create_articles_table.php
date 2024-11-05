<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('a_title',70)->nullable();
            $table->string('a_slug',100)->nullable();
            $table->integer('a_menu_id')->index()->default(0)->nullable();
            $table->string('a_description',300)->nullable();
            $table->string('a_avatar')->nullable();
            $table->longText('a_content')->nullable();
            $table->integer('a_admin_id')->nullable()->default(0)->index();
            $table->integer('a_auth_id')->nullable()->default(0)->index();
            $table->integer('a_view')->nullable()->default(0);
            $table->tinyInteger('a_active')->default(1)->index()->nullable();
            $table->tinyInteger('a_hot')->default(0)->index()->nullable();
            $table->integer('a_point_rating')->default(0)->nullable()->index();
            $table->integer('a_total_ratings')->default(0)->nullable()->index();
            $table->string('a_title_seo',70)->nullable();
            $table->string('a_keyword_seo',160)->nullable();
            $table->string('a_description_seo',160)->nullable();
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
        Schema::dropIfExists('articles');
    }
}
