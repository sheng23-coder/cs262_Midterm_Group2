<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->string('breakfast_image')->nullable();
            $table->string('lunch_image')->nullable();
            $table->string('dinner_image')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropColumn([
                'breakfast_image',
                'lunch_image',
                'dinner_image'
            ]);
        });
    }
};