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
        Schema::create('copies_books', function (Blueprint $table) {
            $table->id('copie_book_id');
            $table->foreignId('book_id')
                ->nullable()->constrained('books', 'book_id')
                ->onDelete('set null');
            $table->foreignId('type_state_id')
                ->nullable()->constrained('types_state', 'type_state_id')
                ->onDelete('set null');
            $table->date('acquisition_date')->default(now());
            $table->text('location')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('copies_books');
    }
};
