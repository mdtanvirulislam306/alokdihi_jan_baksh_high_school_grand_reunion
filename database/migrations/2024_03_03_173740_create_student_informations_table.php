<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_informations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('passing_year');
            $table->string('current_student')->nullable();
            $table->string('sponsor')->nullable();
            $table->string('gender')->comment('1 = male, 2 = female');
            $table->unsignedTinyInteger('status')->default(1)->comment('0=inactive,1=active');
            $table->timestamp('created_at')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->boolean('deleted')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_informations');
    }
}
