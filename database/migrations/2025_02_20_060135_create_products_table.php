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
            $table->string('name');
            $table->string('model_no');
            $table->longText('about_the_product');
            $table->integer("cost_price")->nullable()->default(null);
            $table->integer("sell_price")->nullable()->default(null);
            $table->integer("lowest_selling_price")->nullable()->default(null);	
            $table->integer("discount_percentage")->nullable()->default(0);
            $table->integer("stock_quantity")->nullable()->default(null);

            $table->json("foreignkey_product_genre_iD")->nullable()->default(null);
            $table->json("foreignkey_product_type_iD")->nullable()->default(null);
            $table->json("foreignkey_subcategory_iD")->nullable()->default(null);
            $table->integer("foreignkey_brand_iD")->nullable()->default(null);
            $table->json("foreignkey_productsegment_iD")->nullable()->default(null);

            $table->string('image1')->nullable(); //  field for storing image
            $table->string('image2')->nullable(); //  field for storing image
            $table->string('image3')->nullable(); //  field for storing image
            $table->string('image4')->nullable(); //  field for storing image
            $table->string('image5')->nullable(); //  field for storing image
            $table->string('image6')->nullable(); //  field for storing image
            $table->string('image7')->nullable(); //  field for storing image

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
