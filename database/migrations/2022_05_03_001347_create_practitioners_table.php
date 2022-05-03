<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePractitionersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practitioners', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('practitioners_time', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('practitioner_id')->nullable();
            $table->bigInteger('practitioner_day_id')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->softDeletes();
        });
        Schema::create('practitioners_days', function (Blueprint $table) {
            $table->id();
            $table->string('day')->nullable();
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
        Schema::dropIfExists('practitioners');
        Schema::dropIfExists('practitioners_time');
        Schema::dropIfExists('practitioners_days');
    }
}
