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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            // $table->unsignedInteger('category_id')->nullable();
            // $table->unsignedInteger('publisher_id')->nullable();
            $table->string('title');
            $table->string('isbn')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('publish_year')->nullable();
            $table->unsignedInteger('number_of_pages');
            $table->unsignedInteger('number_of_copies');
            $table->decimal('price', 8, 2);
            $table->string('cover_image');
            $table->foreignId('publisher_id')->nullable()->references('id')->on('publishers')->onDelete('set null');
            $table->foreignId('category_id')->nullable()->references('id')->on('categories')->onDelete('set null');

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
        Schema::dropIfExists('books');
    }
};
