<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->text('shippingAddress');
            $table->text('note')->nullable();

            $table->integer('userId');
            $table->string('trackingNumber');
            $table->enum('status', ['pending', 'accepted', 'inDelivery', 'success', 'cancel', 'refund'])->default('pending');
            $table->string('paymentMode');
            $table->string('paymentId')->nullable();

            $table->string('total');
            $table->string('userEmail');
            $table->string('phoneNumber');
            $table->string('userName');

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
        Schema::dropIfExists('orders');
    }
};
