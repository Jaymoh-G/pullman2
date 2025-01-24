<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageSectionDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_section_data', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default(null);
            $table->longText('text', 10000)->default(null);
            $table->string('image')->default('')->nullable();
            $table->string('icon')->default('')->nullable();
            $table->string('link')->default('')->nullable();
            $table->string('type')->default('')->nullable();
            $table->bigInteger('page_section_id')->unsigned()->nullable();            
            $table->foreign('page_section_id')->references('id')->on('page_sections')->onDelete('cascade');
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
        Schema::dropIfExists('page_section_data');
    }
}
