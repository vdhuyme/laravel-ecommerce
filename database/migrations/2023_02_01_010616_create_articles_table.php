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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            $table->string('articleTitle');
            $table->string('articleSlug');
            $table->longText('articleContent');
            $table->string('articleImage');
            $table->string('shortContent');
            $table->string('metaDescription')->nullable();
            $table->string('metaKey')->nullable();
            $table->string('metaTitle')->nullable();
            $table->integer('userId');
            $table->enum('featuredArticle', ['yes', 'no'])->default('no');

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
        Schema::dropIfExists('articles');
    }
};
