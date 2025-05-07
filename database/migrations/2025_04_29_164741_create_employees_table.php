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
        Schema::create('employees', function (Blueprint $table) {
            $table->id('employee_id');
            $table->foreignId('identity_card_id')->nullable()->constrained('identity_cards', 'identity_card_id')/*->onDelete('cascade') */;
            $table->foreignId('user_id')->nullable()->constrained('users', 'user_id')->onDelete('cascade');
            $table->foreignId('room_id')->nullable()->constrained('rooms', 'room_id')->onDelete('cascade');
            $table->string('name', 55);
            $table->string('lastname', 55);
            $table->string('cedula', 10)->unique()->nullable();
            $table->string('email', 255)->unique();
            $table->string('number', 13)->nullable()->unique();
            $table->dateTime('low_data')->nullable()->default(null);
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
