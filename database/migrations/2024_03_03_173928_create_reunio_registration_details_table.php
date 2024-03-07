<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReunioRegistrationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reunio_registration_details', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('total_guest')->nullable();
            $table->string('t_shirt_size');
            $table->string('payment_method_id');
            $table->string('amount');
            $table->string('account_no');
            $table->string('transaction_id');
            $table->string('payment_status')->default(0)->comment('0=unpaid,1=paid');
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
        Schema::dropIfExists('reunio_registration_details');
    }
}
