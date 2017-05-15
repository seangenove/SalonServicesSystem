<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function(Blueprint $table) {
            $table->increments('visitId');
            $table->string('description');
            $table->date('scheduled_date');
            $table->integer('transactionId')->unsigned();
            $table->string('status');
            $table->foreign('transactionId')->references('id')->on('transactions')->onDelete('cascade')->onUpdate('cascade')$table->foreign('transactionId')->references('id')->on('transactions');
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
        Schema::drop('visits');
    }
}
