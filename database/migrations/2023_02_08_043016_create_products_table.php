<?php

use App\Enums\ProductStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('status', 20)->default(ProductStatus::ACTIVE->name);
            $table->tinyInteger('is_featured')->default(0);
            $table->string('slug');
            $table->double('original_price')->nullable();
            $table->double('selling_price')->nullable();
            $table->foreignId('category_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
