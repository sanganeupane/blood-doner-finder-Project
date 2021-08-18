<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->string('email1');
            $table->string('email2');

            $table->unsignedBigInteger('posted_by')->unsigned();
            $table->foreign('posted_by')->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade')
            ;

            // $table->unsignedBigInteger('requested_by')->unsigned();
            // $table->foreign('requested_by')->references('id')
            //     ->on('donors')
            //     ->onDelete('cascade')
            //     ->onUpdate('cascade')
            // ;

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
        Schema::dropIfExists('emails');
    }
}
