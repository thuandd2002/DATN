<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('if_company',255)->nullable();
            $table->char('if_phone',20)->nullable();
            $table->char('if_fax',20)->nullable();
            $table->string('if_address',255)->nullable();
            $table->string('if_email',255)->nullable();
            $table->char('if_email_drive',20)->nullable()->default('smtp');
            $table->char('if_email_host',20)->nullable()->default('smtp.gmail.com');
            $table->char('if_email_port',20)->nullable()->default('587');
            $table->char('if_email_encryption',20)->nullable()->default('tls');
            $table->string('if_time_job',255)->nullable();
            $table->tinyInteger('if_seo')->default(0)->index()->nullable();
            $table->string('if_logo',255)->nullable();
            $table->string('if_facebook',255)->nullable();
            $table->string('if_google',255)->nullable();
            $table->string('if_youtobe',255)->nullable();
            $table->string('if_email_send',255)->nullable();
            $table->string('if_email_password',255)->nullable();
            $table->string('if_meta_description',255)->nullable();
            $table->string('if_meta_title',255)->nullable();
            $table->string('if_meta_keywords',255)->nullable();
            $table->mediumText('if_google_map',255)->nullable();

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
        Schema::dropIfExists('informations');
    }
}
