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
        Schema::table('order_items', function (Blueprint $table) {
            $table->integer('order_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('color_code')->nullable();
            $table->integer('category_id')->nullable()->index();
            $table->integer('requirement_id')->nullable()->index();
            $table->integer('subcategory_id')->nullable()->index();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->text('key_features')->nullable();
            $table->text('disclaimer')->nullable();
            $table->string('width')->nullable();
            $table->string('warp')->nullable();
            $table->string('weft')->nullable();
            $table->string('count')->nullable();
            $table->string('reed')->nullable();
            $table->string('pick')->nullable();
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
