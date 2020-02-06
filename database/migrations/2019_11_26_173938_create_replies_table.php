<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
          $table->bigIncrements('reply_id');
          $table->text('reply')->nullable();
          $table->string('name_reply');
          $table->string('email_reply');
          $table->unsignedBigInteger('reply_comments_id');
          $table->unsignedBigInteger('reply_users_id');
          $table->foreign('reply_comments_id')->references('id')->on('comments')->onDelete('cascade');
          $table->foreign('reply_users_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('replies');
    }
}
