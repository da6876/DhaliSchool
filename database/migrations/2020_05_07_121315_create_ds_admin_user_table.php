<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDsAdminUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ds_admin_user', function (Blueprint $table) {
            $table->increments('admin_id');
            $table->string('admin_userName', 20)->unique();
            $table->string('admin_password');
            $table->string('admin_name', 25);
            $table->boolean('admin_gender')->default(1)->comment('0=Female|1=Male');
            $table->string('admin_phone', 14);
            $table->string('admin_email', 30);
            $table->string('address');
            $table->string('admin_image');
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
        Schema::dropIfExists('ds_admin_user');
    }
}
