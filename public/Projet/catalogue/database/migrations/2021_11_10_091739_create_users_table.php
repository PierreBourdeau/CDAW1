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
            $table->string('fname');
            $table->string('lname');
            $table->date('birth');
            $table->string('email');
            $table->primary('email'); // Set email (string) as primary key
            $table->string('photo')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->boolean('status')->default(1)->comment('1 - active, 0 - banned');
            $table->string('role',20)->default('user')->comment('user or admin');
            $table->string('country')->nullable();
            /*$table->string('verification_link');
            $table->string('email_verified');*/
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
