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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();

            $table->string('userName')->nullable();
            $table->string('email')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->string('houseNumber');
            $table->integer('userId');
            $table->integer('provinceId');
            $table->integer('districtId');
            $table->integer('wardId');

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
        Schema::dropIfExists('addresses');
    }
};
