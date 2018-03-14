<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetenceprofilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competenceprofiles', function (Blueprint $table) {
            $table->increments('competenceid');
            $table->integer('yearsOfExperience');
            $table->string('competenceDesc');
            $table->nullableTimestamps();
            $table->integer('userid');
            $table->string('competence');
            $table->string('username');
            $table->primary('competenceid'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competenceprofiles');
    }
}
