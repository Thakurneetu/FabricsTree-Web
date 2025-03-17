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
        Schema::table('orders', function (Blueprint $table) {
          $table->string('qutation')->nullable();
          $table->string('track_link')->nullable();
          $table->integer('enquiry_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
          $table->dropColumn('qutation');
          $table->dropColumn('track_link');
          $table->dropColumn('enquiry_id');
        });
    }
};
