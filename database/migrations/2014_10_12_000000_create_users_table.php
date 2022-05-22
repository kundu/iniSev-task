<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->enum('type', ['Admin', 'User'])->default('User');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('social')->nullable()->comment('discord');
            $table->string('discord_id')->nullable();
            $table->longText('discord_response')->nullable()->comment('save response in json data');
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
