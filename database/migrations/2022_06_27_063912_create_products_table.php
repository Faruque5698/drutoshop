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
            $table->foreignId('user_id')->constrained();
            $table->string('product_name', 255);
            $table->integer('brand_id')->nullable();
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->integer('size_id')->nullable();
            $table->integer('size_qty')->nullable();
            $table->integer('color_id')->nullable();
            $table->integer('color_qty')->nullable();
            $table->float('price',10,2);
            $table->integer('quantity');
            $table->float('discount_price',10,2);
            $table->text('discription');
            $table->string('image');
            $table->string('slug');
            $table->string('sku');
            $table->string('discount_type');
            $table->float('total_price',10,2);
            $table->string('future_product')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
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
