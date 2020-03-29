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
        Schema::create('ranthq_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("member_id");
            $table->text('body');
            $table->string("tags")->nullable();
            $table->boolean("is_active")->default(0);
            $table->string("status")->default("pending"); // approved or deleted
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
        Schema::dropIfExists('ranthq_posts');
    }
}
