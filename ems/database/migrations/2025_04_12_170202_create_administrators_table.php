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
        Schema::create('administrators', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name');
            $table->string('email')->unique(); // Ensure unique emails
            $table->date('date_of_birth'); 
            $table->char('sex')->nullable(); 
            $table->string('profile_picture')->nullable(); 
            $table->string('password');
            $table->decimal('salary', 10, 0);
            $table->string('department_name');
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrators');
    }
};
