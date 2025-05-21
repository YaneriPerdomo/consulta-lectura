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
        Schema::create('books', function (Blueprint $table) {
            $table->id('book_id');
            $table->foreignId('author_id')
                ->nullable()->constrained('authors', 'author_id')
                ->onDelete('set null');
            $table->foreignId('editorial_id')
                ->nullable()->constrained('editorials', 'editorial_id')
                ->onDelete('set null');
            $table->foreignId('language_id')
                ->nullable()->constrained('languages', 'language_id')
                ->onDelete('set null');
            $table->foreignId('room_id')
                ->nullable()->constrained('rooms', 'room_id')
                ->onDelete('set null');
            $table->foreignId('employee_id')
                ->nullable()->constrained('employees', 'empleyee_id')
                ->onDelete('set null');
            $table->string('title', 60)->unique();
            $table->string('sub_title', 90)->nullable();
            $table->string('translator', 60)->nullable();
            $table->text('description');
            $table->string('ISBN', 13)->unique();
            $table->integer('page_number')->unsigned()->nullable();
            $table->date('publication_date');
            $table->string('image_path')->nullable()->default('default');
            $table->text('location')->nullable();
            $table->string('slug', 60)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
