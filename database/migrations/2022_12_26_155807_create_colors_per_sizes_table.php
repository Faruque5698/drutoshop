<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorsPerSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colors_per_sizes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->nullable();
            $table->bigInteger('size_id')->nullable();
            $table->string('size')->nullable();
            $table->string('color_code')->nullable();
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
        Schema::dropIfExists('colors_per_sizes');
    }
}
