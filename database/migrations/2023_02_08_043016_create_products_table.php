<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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

            $table->string('productName');
            $table->text('description');
            $table->enum('productStatus', ['published', 'unPublished'])->default('unPublished');
            $table->enum('featuredProduct', ['yes', 'no'])->default('no');
            $table->string('productSlug');
            $table->string('metaTitle')->nullable();
            $table->string('metaDescription')->nullable();
            $table->string('metaKey')->nullable();
            $table->string('originalPrice');
            $table->string('sellingPrice');
            $table->enum('stock', ['inStock', 'outStock'])->default('instock');
            $table->integer('categoryId');


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
};
