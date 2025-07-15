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
            $table->string('name'); // Groundnut Natural Oil - 1 Litre
            $table->string('slug'); // Groundnut Natural Oil - 1 Litre
            $table->string('category_id'); // Groundnut Natural Oil - 1 Litre
            $table->decimal('price', 8, 2); // ₹370
            $table->string('brand')->nullable(); // DePAL
            $table->string('diet_type')->nullable(); // Plant Based
            $table->string('flavour')->nullable(); // Natural Nutty Flavour
            $table->integer('net_content_volume')->nullable(); // 1000 Millilitres
            $table->string('special_feature')->nullable(); // Wood Pressed
            $table->integer('liquid_volume')->nullable(); // 1000 Millilitres
            $table->integer('package_quantity')->default(1); // 1
            $table->integer('shelf_life_days')->nullable(); // 90 Days
            $table->string('item_form')->nullable(); // Liquid
            $table->string('speciality')->nullable(); // Preservatives Free, Artificial Flavor Free, Natural
            $table->text('description')->nullable(); // The "About this item" block
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
