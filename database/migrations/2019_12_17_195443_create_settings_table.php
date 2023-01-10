<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('setting_id');
            $table->string('site_title');
            $table->text('site_description');
            $table->string('site_logo');
            $table->string('site_icon');
            $table->string('site_address');
            $table->string('site_phone');
            $table->string('site_email');
            $table->string('site_fax');
            $table->string('slider_image1')->nullable();
            $table->string('slider_image2')->nullable();
            $table->string('slider_image3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
