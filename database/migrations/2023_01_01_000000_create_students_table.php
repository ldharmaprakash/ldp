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
            $table->id();
            $table->string('name');
            $table->string('student_id')->unique();
            $table->string('department');
            $table->integer('year');
            $table->string('batch');
            $table->string('gender');
            $table->date('dob');
            $table->string('mobile');
            $table->string('email')->unique(); // Add email column
            $table->text('address');
            $table->string('register_number')->unique()->index(); // Ensure this is a string
            $table->unsignedBigInteger('user_id')->nullable(); // Foreign key to users table
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
