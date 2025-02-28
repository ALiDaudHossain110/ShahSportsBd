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
        Schema::create('homepage_carousel_images', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable(); //  field for storing image
            $table->string('caption')->nullable(); // Example field for caption
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_carousel_images');
    }
};
