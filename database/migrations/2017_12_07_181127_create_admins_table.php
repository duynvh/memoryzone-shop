<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique()->default('');
            $table->string('full_name')->default('');;
            $table->string('email')->unique()->default('');
            $table->string('password')->default('');
            $table->string('avatar')->default('');
            $table->string('phone')->default('');
            $table->string('address')->default('');
            $table->text('info')->nullable();
            $table->boolean('sex')->default(0);
            $table->boolean('active')->default(0);
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
        Schema::dropIfExists('admins');
    }
}
