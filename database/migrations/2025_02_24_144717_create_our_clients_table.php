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
        Schema::create('our_clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_name')->nullable(); //  field for storing image
            $table->string('client_logo')->nullable(); //  field for storing image
            $table->string('contact_number')->nullable(); //  field for storing image
            $table->string('email')->nullable()->unique(); //  field for storing image

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_clients');
    }
};
