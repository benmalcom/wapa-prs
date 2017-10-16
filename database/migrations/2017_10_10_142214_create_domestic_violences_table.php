<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomesticViolencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domestic_violences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('lga_of_residence');
            $table->string('mobile');
            $table->string('email')->nullable();
            $table->string('age');
            $table->string('marital_status');
            $table->string('type_of_violence');
            $table->string('conclusion');
            $table->string('educational_qualification');
            $table->string('country');
            $table->unsignedInteger('state_id');
            $table->unsignedInteger('lga_id');
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
        Schema::dropIfExists('domestic_violences');
    }
}
