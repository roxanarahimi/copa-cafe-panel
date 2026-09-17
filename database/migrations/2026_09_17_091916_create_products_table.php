<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('index')->default(0);
            $table->integer('product_category_id');
            $table->string('title');
            $table->string('title_en')->nullable();
            $table->string('subTitle');
            $table->string('subTitle_en')->nullable();
            $table->text('text')->nullable();
            $table->text('text_en')->nullable();
            $table->text('image1')->nullable();
            $table->text('image2')->nullable();
            $table->boolean('visible')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
