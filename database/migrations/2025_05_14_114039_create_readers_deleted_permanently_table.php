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
        Schema::create('readers_deleted_permanently', function (Blueprint $table) {
            $table->id('readers_deleted_permanently_id');
            $table->boolean('readers_deleted_permanently')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('readers_deleted_permanently');
    }
};
