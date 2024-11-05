<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pro_name',191)->nullable();
            $table->string('pro_slug',191)->nullable();
            $table->bigInteger('pro_price')->nullable()->default(0);
            $table->integer('pro_menu_id')->default(0)->nullable()->index();
            $table->tinyInteger('pro_type')->default(0)->nullable()->index();
            $table->tinyInteger('pro_active')->default(0)->nullable()->index();
            $table->tinyInteger('pro_position')->default(0)->nullable();
            $table->tinyInteger('pro_source')->default(0)->nullable()->comment('Nguồn gốc ,xuất xứ ');
            $table->string('pro_description',300)->nullable();
            $table->char('pro_year_output',10)->nullable();
            $table->longText('pro_content')->nullable();
            $table->longText('pro_specifications')->nullable();
            $table->string('pro_title_seo',70)->nullable();
            $table->string('pro_keyword_seo',160)->nullable();
            $table->string('pro_description_seo',160)->nullable();
            $table->string('pro_avatar')->nullable();
            $table->integer('pro_view')->nullable()->default(0);
            $table->integer('pro_admin_id')->nullable()->default(0)->index();
            $table->integer('pro_point_rating')->nullable()->default(0);
            $table->integer('pro_total_ratings')->nullable()->default(0);
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
        Schema::dropIfExists('products');
    }
}
