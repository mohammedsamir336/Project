<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reps', function (Blueprint $table) {
          $table->bigIncrements('rep_id');
          $table->text('reptext')->nullable();
          $table->string('name_rep');
          $table->string('email_rep');
          $table->unsignedBigInteger('rep_comments_id');
          $table->unsignedBigInteger('rep_users_id');
          $table->unsignedBigInteger('rep_rep_id'); //reply id
          $table->foreign('rep_comments_id')->references('id')->on('comments')->onDelete('cascade');
          $table->foreign('rep_users_id')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('rep_rep_id')->references('reply_id')->on('replies')->onDelete('cascade');
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
        Schema::dropIfExists('reps');
    }
}
