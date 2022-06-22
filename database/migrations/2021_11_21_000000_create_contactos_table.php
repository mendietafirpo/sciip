<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('lang',3);
            $table->string('name',100);
            $table->string('surname',100);
            $table->string('subject',255)->nullable();
            $table->text('messege',500);
            $table->string('email');
            $table->string('phone',100)->nullable();
            $table->string('city',100)->nullable();
            $table->string('country',100)->nullable();
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
        Schema::dropIfExists('contactos');
    }
}
