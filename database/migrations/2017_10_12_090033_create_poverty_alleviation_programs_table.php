<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePovertyAlleviationProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poverty_alleviation_programs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('lga_of_residence');
            $table->string('mobile');
            $table->string('number_of_children');
            $table->string('type_of_work');
            $table->string('place_of_work');
            $table->string('age');
            $table->string('nok_mobile');
            $table->string('nok_email')->nullable();
            $table->string('nok_address');
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
        Schema::dropIfExists('poverty_alleviation_programs');
    }
}
