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
        Schema::create('borrowed_books', function (Blueprint $table) {
            $table->id('borrowed_book_id');
            $table->foreignId('copie_book_id')->constrained('copies_books', 'copie_book_id')
            ->onDelete('cascade');
            $table->foreignId('person_id')
            ->nullable()->constrained('persons', 'person_id')
            ->onDelete('set null');
            $table->foreignId('employee_id')
            ->nullable()->constrained('employees', 'employee_id')
            ->onDelete('set null');
            $table->date('loan_date');
            $table->date('expected_return_date');
            $table->date('actual_return_date')->nullable();  
            $table->enum('status', ['borrowed', 'returned', 'overdue', 'lost'])->default('borrowed');  
             
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowed_books');
    }
};
