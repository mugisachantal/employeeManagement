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
            $table->id();
            $table->string('name'); // VARCHAR
            $table->string('email')->unique(); // Unique VARCHAR
            $table->date('date_of_birth')->nullable(); // Integer, can be NULL
            $table->char('sex')->default(true); // BOOLEAN with a default value
            $table->string('profile_picture'); 
            $table->string('password');
            $table->decimal('salary', 12, 0);
            $table->string('department_name');
            
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
