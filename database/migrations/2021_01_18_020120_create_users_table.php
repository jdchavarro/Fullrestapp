<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            /* $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps(); */

            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('rol_id')->constrained();
            $table->foreignId('employee_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
            //2014_10_12_000000_create_users_table
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }
}
