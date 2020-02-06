<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
          $table->bigIncrements('id');
         $table->string('name');
         $table->string('email')->unique();
         $table->string('phone')->unique();
         $table->timestamp('email_verified_at')->nullable();
         $table->string('password');
         $table->integer('superadmin')->default(0);
         $table->string('img')->default('m.png');
         $table->timestamp('blocked_date')->nullable();
         $table->dateTime('online_at')->nullable();
         $table->string('projects_count')->default(0);
         $table->string('points')->default(0);
         $table->integer('add_by')->default(0);
         $table->string('api_token')->nullable();
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
        Schema::dropIfExists('admins');
    }
}
