<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rooms_type_id');
            $table->string('name');
            $table->integer('price');
            $table->text('description');
            $table->text('embeded_code');
            $table->timestamps();

            $table->foreign('rooms_type_id')->references('id')->on('rooms_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('rooms');
    }
}
