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
            $table->string('product_name');
            $table->integer('old_price');
            $table->integer('new_price')->nullable();
            $table->text('short_description');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->string('product_weight')->nullable();
            $table->string('product_dimension')->nullable();
            $table->string('product_materials')->nullable();
            $table->string('product_other_info')->nullable();
            $table->longtext('long_description')->nullable();
            $table->string('product_slug');
            $table->string('product_sku');
            $table->text('product_image')->default('default_product_image.jpg');
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
