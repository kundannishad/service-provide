<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf16';
            $table->collation = 'utf16_general_ci';
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->integer('role_id')->default(0);
            $table->integer('company_id')->default(0);
            $table->string('email')->unique()->nullable();
            $table->string('phone_no')->unique()->nullable();
            $table->integer('otp')->nullable();
            $table->string('image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('api_token')->nullable()->unique();
            $table->string('country_code')->nullable();
            $table->enum('status', ['1', '0'])->default(0)->comment("1 => Active 0 => Inactive");
            $table->enum('user_type', ['0', '1','2'])->default(0)->comment("0 =>Default 1 => Providers 2=>Company");
            $table->string('password');
            $table->string('experience')->nullable();
            $table->enum('duty', ['1', '0'])->default(0)->comment("1 =>On duty 0 => off duty");
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
