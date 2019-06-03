<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('name');
            $table->string('slug');
            $table->string('cpu');
            $table->string('ram');
            $table->string('storage');
            $table->string('display');
            $table->string('vga');
            $table->string('battery');
            $table->string('weight');
            $table->string('material');
            $table->string('kind');
            $table->string('condition');
            $table->integer('price');
            $table->string('promotion');
            $table->tinyInteger('status');
            $table->tinyInteger('featured');
            $table->string('warranty');
            $table->text('description');
            $table->string('img');
            $table->bigInteger('category')->unsigned();
            $table->foreign('category')
                ->references('cate_id')
                ->on('category')
                ->onDelete('cascade');
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
