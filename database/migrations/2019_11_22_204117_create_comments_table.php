<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->text('text_comments');
          $table->string('name_comments');
          $table->string('email_comments');
          $table->unsignedBigInteger('users_id')->nullable();
          $table->unsignedBigInteger('posts_id')->nullable();
          $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('posts_id')->references('id')->on('posts')->onDelete('cascade');
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
        Schema::dropIfExists('comments');
    }
}
