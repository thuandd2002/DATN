<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('m_title')->nullable();
            $table->string('m_slug')->nullable();
            $table->tinyInteger('m_parent_id')->default(0)->nullable()->index();
            $table->tinyInteger('m_type')->default(0)->nullable()->index();
            $table->tinyInteger('m_active')->nullable()->default(1)->index();
            $table->tinyInteger('m_hot')->nullable()->default(0);
            $table->tinyInteger('m_sort')->nullable()->default(0);
            $table->tinyInteger('m_type_count')->nullable()->default(0);
            $table->tinyInteger('m_type_seo')->nullable()->default(1)->index();
            $table->string('m_avatar')->nullable();
            $table->string('m_banner')->nullable();
            $table->string('m_title_seo')->nullable();
            $table->string('m_keyword_seo')->nullable();
            $table->string('m_description_seo')->nullable();
            $table->mediumText('m_description')->nullable();
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
        Schema::dropIfExists('menus');
    }
}
