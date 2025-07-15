<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
             $table->id(); // id
            $table->string('name'); // Category name
            $table->string('slug')->unique(); // URL-friendly slug
            $table->text('description')->nullable(); // Optional category description
            $table->string('meta_key')->nullable(); // SEO meta keywords
            $table->text('meta_description')->nullable(); // SEO meta description
            $table->timestamps(); // created_at & updated_at
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
        Schema::dropIfExists('categories');
    }
}
