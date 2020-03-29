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
        Schema::create('ranthq_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("post_id");
            $table->unsignedInteger("member_id");
            $table->text("comment");
            $table->integer("parent");
            $table->boolean("is_available")->default(0);
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
        Schema::dropIfExists('ranthq_comments');
    }
}
