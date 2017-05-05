<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServiceProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_providers', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('last_name');
            $table->string('first_name');
            $table->integer('category_id')->unsigned();
            $table->integer('contact_numer');
            $table->string('email');
            $table->enum('status', ['active','inactive']);
            $table->string('description');
            $table->string('password');
            $table->enum('request_status', ['accepted','pending', 'rejected']);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('service_providers');
    }
}
