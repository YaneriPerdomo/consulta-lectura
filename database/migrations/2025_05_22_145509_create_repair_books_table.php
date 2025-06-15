<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('repair_books', function (Blueprint $table) {
            $table->id('repair_book_id');
            $table->foreignId('copie_book_id')->constrained('copies_books', 'copie_book_id')
                ->onDelete('cascade');
            $table->foreignId('damage_level_reading_id')
                ->constrained('damage_levels_reading', 'damage_level_reading_id')
                ->onDelete('cascade');
            $table->date('date_repaired');
            $table->date('date_delivered')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repair_books');
    }
};
