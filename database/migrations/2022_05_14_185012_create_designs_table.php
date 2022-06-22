<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designs', function (Blueprint $table) {
            $table->id();

            $table->string('pageweb');
            $table->string('element');
            $table->string('lang')->nullable();
            $table->string('color_bg')->nullable();
            $table->string('color_tx_1')->nullable();
            $table->string('color_tx_2')->nullable();
            $table->string('text_sz_1')->nullable();
            $table->string('text_sz_2')->nullable();
            $table->string('class')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('status')->nullable();
            $table->string('redirect')->nullable();

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
        Schema::dropIfExists('designs');
    }
}
