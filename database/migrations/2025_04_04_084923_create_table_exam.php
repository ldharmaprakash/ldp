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
        Schema::create('table_exam', function (Blueprint $table) {
            $table->id();
            $exam_name = $table->string('exam_name');
            $date = $table->date('date');
            $day = $table->string('day');
            $department = $table->string('department');
            $subject = $table->string('subject');
            $session = $table->string('session');
       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_exam');
    }
};
