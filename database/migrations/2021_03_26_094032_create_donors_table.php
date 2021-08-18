<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
class CreateDonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            $table->string('donor_name')->unique();
            $table->string('email')->unique();
            $table->string('address');
            $table->string('lat1')->nullable();
            $table->string('lon1')->nullable();
            $table->string('bloodtype');
            $table->string('sex');
            $table->string('phone')->unique();

            $table->boolean('status')->default(0);

            $table->unsignedBigInteger('posted_by')->unsigned();
            $table->foreign('posted_by')->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade')
            ;

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
        Schema::dropIfExists('donors');
    }
}
