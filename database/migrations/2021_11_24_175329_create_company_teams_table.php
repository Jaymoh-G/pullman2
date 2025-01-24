<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_teams', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('');
            $table->string('position')->default('');
            $table->string('image')->default('');
            $table->string('slug')->default('');
            $table->longText('bio', 5000)->default(null);
            $table->string('email')->default('');
            $table->string('facebook')->default('')->nullable();
            $table->string('linkedIn')->default('')->nullable();
            $table->string('twitter')->default('')->nullable();
            $table->string('instagram')->default('')->nullable();
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
        Schema::dropIfExists('company_teams');
    }
}
