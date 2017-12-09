<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique()->default('');
            $table->string('alias')->default('');
            $table->unsignedInteger('type_product_group_id')->default(0);
            $table->foreign('type_product_group_id')->references('id')->on('type_product_groups')->onDelete('cascade');
            $table->boolean('status')->default(0);
            $table->integer('order_by')->default(0);
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
        Schema::dropIfExists('type_products');
    }
}
