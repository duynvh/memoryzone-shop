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
            $table->string('name')->unique()->default('');
            $table->string('alias')->default('');
            $table->string('model')->default('');
            $table->string('keyword')->default('');
            $table->integer('stock')->default(0);
            $table->integer('selled')->default(0);
            $table->integer('rating')->default(0);
            $table->integer('person_rating')->default(0);
            $table->integer('view')->default(0);
            $table->integer('price_old')->default(0);
            $table->integer('price_new')->default(0);
            $table->boolean('hot')->default(0);
            $table->boolean('new')->default(0);
            $table->longText('description')->nullable();
            $table->longText('contents')->nullable();
            $table->string('image')->default('');
            $table->unsignedInteger('type_product_id')->default(0);
            $table->foreign('type_product_id')->references('id')->on('type_products')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
