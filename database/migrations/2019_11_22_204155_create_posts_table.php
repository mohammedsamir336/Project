<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
          $table->bigIncrements('id');
            $table->string('header')->unique();
            $table->string('author');
            $table->text('img');
            $table->text('p1');
            $table->text('p2')->nullable();
            $table->text('p3')->nullable();
            $table->string('tag');
            $table->string('cat')->default('Entertainment');
            $table->string('type')->default('Games');
            $table->integer('view_count')->default(0);
            $table->unsignedBigInteger('videos_id')->nullable();
            $table->integer('del_videos_id')->nullable();// if video delete and restore
            $table->unsignedBigInteger('admins_id');
            $table->foreign('admins_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('videos_id')->references('id')->on('videos');
            $table->softDeletes();
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
        Schema::dropIfExists('posts');
    }
}
