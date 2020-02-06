<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('title')->unique();
          $table->text('video');
          $table->string('url')->nullable();
          $table->text('video_img')->default('video-placeholder.png');
          $table->string('type')->default('Games');
          $table->string('author');
          $table->unsignedBigInteger('admins_id');
          $table->integer('video_view_count')->default(0);
          $table->softDeletes();
          $table->foreign('admins_id')->references('id')->on('admins')->onDelete('cascade');
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
        Schema::dropIfExists('videos');
    }
}
