<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('client_id');
            $table->bigInteger('room_id');
            $table->bigInteger('practitionner_id');
            $table->bigInteger('machine_id');
            $table->bigInteger('hand_id');
            $table->bigInteger('service_id');
            $table->bigInteger('setting_id');
            $table->string('zone');
            $table->string('session');
            $table->string('session_price');
            $table->string('promotion');
            $table->string('total_service_amount');
            $table->string('room_time');
            $table->string('check_in');
            $table->string('check_out');
            $table->string('paid');
            $table->string('unpaid');
            $table->enum('status', ['taken', 'confirmed', 'checkin', 'cancelled']);
            $table->string('note');
            $table->dateTime('appointment_start');
            $table->dateTime('appointment_end');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
