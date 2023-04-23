<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_requests', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf16';
            $table->collation = 'utf16_general_ci';
            $table->bigIncrements('id');
            $table->string('booking_id')->nullable();
            $table->integer('user_id');
            $table->integer('category_id')->nullable();
            $table->integer('services_id')->nullable();
            $table->integer('promocode_id')->nullable();
            $table->double('amount', 8, 2);
            $table->date('booking_date')->nullable();
            $table->time('booking_time', $precision = 0);
            $table->integer('provider_id')->nullable();
            $table->string('user_requirement')->nullable();
            $table->string('requirement_image')->nullable();
            $table->enum('payment_status', ['1', '0'])->default(0)->comment("1 => Paid 0 => Pending");
            $table->enum('status', ['0','1', '2','3','4'])->default(0)->comment("1=>Accepted 2=>On the way 3=>Stared 4=>Cancel");
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
        Schema::dropIfExists('booking_requests');
    }
}
