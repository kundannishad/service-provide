<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasicSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_settings', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf16';
            $table->collation = 'utf16_general_ci';
            $table->bigIncrements('id');
            $table->string('about_title')->nullable()->comment("About Title");
            $table->string('about_image')->nullable()->comment("About Image");
            $table->longText('about_description')->nullable()->comment("About Content");
            $table->longText('term_and_condition')->nullable()->comment("Terms Conditions");
            $table->longText('privacy_policy')->nullable()->comment("Privacy Policy");
            $table->longText('our_story')->nullable()->comment("Our Story");
            $table->string('mail_driver')->nullable();
            $table->string('mail_host')->nullable();
            $table->string('mail_port')->nullable();
            $table->string('mail_encryption')->nullable();
            $table->string('mail_username')->nullable();
            $table->string('mail_password')->nullable();
            $table->string('mail_from_name')->nullable()->comment("RatiBani");
            $table->string('mail_from_address')->nullable()->comment("RatiBani");
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
        Schema::dropIfExists('basic_settings');
    }
}
