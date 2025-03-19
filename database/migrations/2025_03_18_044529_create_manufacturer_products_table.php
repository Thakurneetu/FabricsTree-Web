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
        Schema::create('manufacturer_products', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id')->index();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->text('key_features')->nullable();
            $table->text('disclaimer')->nullable();
            $table->integer('category_id')->nullable()->index();
            $table->integer('requirement_id')->nullable()->index();
            $table->integer('subcategory_id')->nullable()->index();
            $table->string('width')->nullable();
            $table->string('count')->nullable();
            $table->string('reed')->nullable();
            $table->string('pick')->nullable();
            $table->string('wrap')->nullable();
            $table->string('weft')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manufacturer_products');
    }
};
