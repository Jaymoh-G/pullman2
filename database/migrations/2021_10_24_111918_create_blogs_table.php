<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default("untitled");
            $table->longText('metaDescription', 260)->default(null);
            $table->string('slug')->default("untitled");
            $table->longText('body');
            $table->string('author');
            $table->string('link')->nullable();
            $table->string('image')->nullable();
            $table->longText('tags', 260)->nullable();
            $table->bigInteger('category_id')->unsigned()->nullable();
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
        Schema::dropIfExists('blog_comments');
        Schema::dropIfExists('blogs');
    }
}
