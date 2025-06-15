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
        Schema::create('personal_loan_histories', function (Blueprint $table) {
            $table->id('personal_loan_historie_id');
            $table->foreignId('room_id')
                ->nullable()->constrained('rooms', 'room_id')
                ->onDelete('set null');
            $table->foreignId('person_id')
                ->constrained('persons', 'person_id')
                ->onDelete('cascade');
            $table->text('message');
            $table->dateTime('date_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_loan_histories');
    }
};
