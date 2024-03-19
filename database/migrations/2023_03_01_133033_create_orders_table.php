<?php

use App\Enums\OrderStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('note', 400)->nullable();
            $table->string('tracking_number', 20);
            $table->string('status', 20)->default(OrderStatus::PENDING->name);
            $table->string('email');
            $table->string('phone_number', 10);
            $table->string('name', 50);
            $table->string('address', 120);
            $table->double('total_amount');
            $table->string('payment_method', 12);
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
