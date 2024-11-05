<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('email',50)->unique()->index();
            $table->char('phone',50)->nullable();
            $table->string('address',50)->nullable();
            $table->char('city',50)->nullable();
            $table->tinyInteger('age')->nullable()->default(0);
            $table->string('avatar')->nullable();
            $table->integer('admin_id')->index()->nullable();
            $table->char('password',100);
            $table->boolean('confirmed')->default(0)->comment('check veriemail chua')->index();
            $table->string('confirmation_code',100)->nullable()->comment('token')->index();
            $table->tinyInteger('active')->nullable()->default(1)->index();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
