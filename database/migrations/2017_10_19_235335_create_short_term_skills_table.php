<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShortTermSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('short_term_skills', function (Blueprint $table) {
            $table->increments('id');
            //$table->string('lasrra_no');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('postal_address')->nullable();
            $table->string('permanent_address')->nullable();

            //$table->unsignedInteger('course_id');
            //$table->unsignedInteger('center_id');

            $table->string('marital_status');
            $table->string('place_of_birth');
            $table->string('date_of_birth');
            $table->string('gender');
            $table->string('mobile');

            $table->string('engagement_status');
            $table->string('engagement_details')->nullable();
            $table->string('other_information')->nullable();

            $table->string('disability');
            $table->string('disability_nature')->nullable();

            $table->string('nok_name');
            $table->string('nok_mobile');
            $table->string('nok_address');
            $table->string('nok_occupation');
            $table->string('nok_relationship');
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
        Schema::dropIfExists('short_term_skills');
    }
}
