<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf16';
            $table->collation = 'utf16_general_ci';
            $table->bigIncrements('id');
            $table->integer('category_id')->nullable();
            $table->string('service_name')->nullable();
            $table->double('price', 8, 2)->default(0);
            $table->double('discount_price', 8, 2)->default(0);
            $table->string('service_image')->nullable();
            $table->string('time_duration')->nullable();
            $table->string('description')->nullable();
            $table->string('service_includes')->nullable();
            $table->enum('status', ['1', '0'])->default(0)->comment("1 => Active 0 => Inactive");
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
        Schema::dropIfExists('services');
    }
}
