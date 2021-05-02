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
            $table->string('product_name')->nullable();
            $table->float('product_purchase_price')->nullable();
            $table->float('product_sell_price')->nullable();
            $table->float('product_old_price')->nullable();
            $table->integer('product_category_id')->nullable();
            $table->integer('product_sub_category_id')->nullable();
            $table->integer('product_sub_sub_category_id')->nullable();
            $table->integer('product_brand_id')->nullable();
            $table->text('product_main_image')->nullable();
            $table->text('product_image_one')->nullable();
            $table->text('product_image_two')->nullable();
            $table->text('product_image_three')->nullable();
            $table->text('product_image_four')->nullable();
            $table->text('product_image_five')->nullable();
            $table->text('product_long_description')->nullable();
            $table->text('product_sort_description')->nullable();
            $table->integer('product_qty')->nullable();
            $table->integer('product_status')->nullable();
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
