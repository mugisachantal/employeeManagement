<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeExperienceColumnTypeInVacanciesTable extends Migration
{
    public function up()
    {
        Schema::table('vacancies', function (Blueprint $table) {
            $table->text('experience')->change();
        });
    }

    public function down()
    {
        Schema::table('vacancies', function (Blueprint $table) {
            $table->string('experience', 255)->change();
        });
    }
}
