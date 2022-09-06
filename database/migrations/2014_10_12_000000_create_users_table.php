<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('role')->comment("1= Admin,2=Member")->default(2);
            $table->boolean('gender_id')->unsigned();
            $table->uuid('father_id')->nullable();
            $table->uuid('mother_id')->nullable();
            $table->uuid('parent_id')->nullable();
            $table->date('dob')->nullable();
            $table->year('yob')->nullable();
            $table->unsignedTinyInteger('birth_order')->nullable();
          
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('photo_path')->nullable();
            $table->uuid('manager_id')->nullable();
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
};
