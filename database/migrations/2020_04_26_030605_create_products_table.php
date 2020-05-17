<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('title');
            $table->string('sub_title');
            $table->integer('category_id')->unsigned();
            $table->string('brand');
            $table->integer('unit_id')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->double('mrp_price');
            $table->double('price');
            $table->integer('image_id')->unsigned();
            $table->integer('unit_in_stock')->unsigned();
            $table->integer('in_stock')->unsigned();
            $table->text('about_product')->nullable();
            $table->text('uses')->nullable();
            $table->text('benefits')->nullable();
            $table->string('status');
            $table->string('isAvailable');
            $table->timestamps();
            $table->softDeletes();
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
