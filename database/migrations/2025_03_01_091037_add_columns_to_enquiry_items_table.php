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
        Schema::table('enquiry_items', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->text('key_features')->nullable();
            $table->text('disclaimer')->nullable();
            $table->integer('category_id')->nullable()->index();
            $table->integer('subcategory_id')->nullable()->index();
            $table->integer('requirement_id')->nullable()->index();
            $table->string('width')->nullable();
            $table->string('warp')->nullable();
            $table->string('weft')->nullable();
            $table->string('count')->nullable();
            $table->string('reed')->nullable();
            $table->string('pick')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enquiry_items', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('subtitle');
            $table->dropColumn('description');
            $table->dropColumn('key_features');
            $table->dropColumn('disclaimer');
            $table->dropColumn('category_id');
            $table->dropColumn('subcategory_id');
            $table->dropColumn('requirement_id');
            $table->dropColumn('width');
            $table->dropColumn('warp');
            $table->dropColumn('weft');
            $table->dropColumn('count');
            $table->dropColumn('reed');
            $table->dropColumn('pick');
        });
    }
};
