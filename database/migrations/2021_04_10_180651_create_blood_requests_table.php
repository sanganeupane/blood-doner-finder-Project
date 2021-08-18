<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('blood_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('hospital_name');
            $table->string('hospital_location');
            $table->string('contact_number');
            $table->string('pint');
            $table->string('bloodtype');
            $table->string('sex');
            $table->string('date');
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
        Schema::dropIfExists('blood_requests');
    }
}
