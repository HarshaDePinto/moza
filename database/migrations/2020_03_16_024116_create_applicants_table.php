<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();

            $table->integer('category_id')->nullable();
            $table->integer('title_id')->nullable();
            $table->string('image')->nullable();
            $table->string('cv')->nullable();
            $table->string('cl')->nullable();
            $table->string('ot')->nullable();
            $table->string('author')->nullable();
            $table->string('name');
            $table->string('profile')->nullable();
            $table->string('country')->nullable();
            $table->string('email')->unique();
            $table->text('tel')->nullable();
            $table->integer('experience')->nullable();
            $table->string('c_job')->nullable();
            $table->string('c_company')->nullable();
            $table->string('status')->nullable();
            $table->text('c_jd')->nullable();
            $table->text('education')->nullable();
            $table->text('technical')->nullable();
            $table->text('history')->nullable();
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
        Schema::dropIfExists('applicants');
    }
}
