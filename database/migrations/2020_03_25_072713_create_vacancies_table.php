<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->nullable();
            $table->integer('title_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('number')->nullable();
            $table->string('time')->nullable();
            $table->string('salary')->nullable();
            $table->string('gender')->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->text('des')->nullable();
            $table->text('edu')->nullable();
            $table->text('ben')->nullable();
            $table->string('author')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacancies');
    }
}
