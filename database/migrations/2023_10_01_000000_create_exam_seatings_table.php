<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamSeatingsTable extends Migration
{
    public function up()
    {
        Schema::create('exam_seatings', function (Blueprint $table) {
            $table->id();
            $table->string('exam_name');
            $table->text('seating_arrangement');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('exam_seatings');
    }
}
