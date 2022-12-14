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
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();

            $table->unsignedBigInteger('user_type')->default(2);
            $table->foreign('user_type')->references('id')->on('user_type')->onDelete('cascade');

            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(array(
            'name' => 'Admin',
            "email" => 'admin@email.com',
            "password" => bcrypt(1234),
            "user_type" => 1

        ));
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
