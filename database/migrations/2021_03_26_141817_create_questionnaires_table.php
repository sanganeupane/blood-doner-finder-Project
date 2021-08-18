<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('phone')->unique();
            $table->string('symptoms');

            $table->boolean('status')->default(0);

            $table->unsignedBigInteger('posted_by')->unsigned();
            $table->foreign('posted_by')->references('id')
                ->on('users')
                ->onDelete('restrict')
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
        Schema::dropIfExists('questionnaires');
    }
}
