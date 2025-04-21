<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_company_policies_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyPoliciesTable extends Migration
{
    public function up()
    {
        Schema::create('company_policies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('file_path');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('company_policies');
    }
}