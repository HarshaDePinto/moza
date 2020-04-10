<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            $table->integer('applicant_id')->nullable();
            $table->integer('vacancy_id')->nullable();
            $table->string('regNumber')->nullable();
            $table->date('date');
            $table->string('time')->nullable();
            $table->text('location')->nullable();
            $table->text('contact_person')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('interviews');
    }
}
