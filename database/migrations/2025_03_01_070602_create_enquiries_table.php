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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->enum('enquery_type', ['custom', 'selected'])->default('selected');
            $table->integer('customer_id');
            $table->integer('category_id')->nullable();
            $table->integer('subcategory_id')->nullable()->index();
            $table->string('width')->nullable();
            $table->string('warp')->nullable();
            $table->string('weft')->nullable();
            $table->string('count')->nullable();
            $table->string('reed')->nullable();
            $table->string('pick')->nullable();
            $table->enum('status', ['submitted', 'invoiced', 'accepted', 'invoked'])->default('submitted');
            $table->string('invoke_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
