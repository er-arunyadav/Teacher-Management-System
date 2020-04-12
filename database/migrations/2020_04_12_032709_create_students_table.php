<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('teacher_id')->unsigned();;
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birthdate');
            $table->string('gender')
                  ->comment='M and F';
            $table->string('contact_mobile',12);
            $table->string('contact_email');
            $table->string('avatar');
            $table->timestamps();
            $table->foreign('teacher_id')->references('id')->on('teachers')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
