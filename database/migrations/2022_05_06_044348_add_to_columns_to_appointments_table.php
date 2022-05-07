<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToColumnsToAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->string('client_id')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('appointment_date')->nullable();
            $table->string('room_id')->nullable();
            $table->string('practioner_id')->nullable();
            $table->string('machine_id')->nullable();
            $table->string('hand_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('sessions')->nullable();
            $table->string('settings')->nullable();
            $table->string('session_price')->nullable();
            $table->string('promotion')->nullable();
            $table->string('total_service_amount')->nullable();
            $table->string('room_time')->nullable();
            $table->string('start_time')->nullable();
            $table->string('finish_time')->nullable();
            $table->string('appointment_status')->nullable();
            $table->string('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointments', function (Blueprint $table) {
            //
        });
    }
}
