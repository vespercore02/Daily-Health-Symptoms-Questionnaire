<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('last_name', 100);
            $table->string('first_name', 100);
            $table->string('middle_name', 100);
            $table->string('sex', 100);
            $table->string('age', 100);
            $table->string('residence_add', 100);
            $table->string('company_name', 100);
            $table->string('company_add', 100);
            $table->string('entrance_used', 100);
            $table->decimal('body_temp', 8, 2);
            $table->string('sore_throat', 100);
            $table->string('cough', 100);
            $table->string('body_pain', 100);
            $table->string('headache', 100);
            $table->string('fever', 100);
            $table->string('nose', 100);
            $table->string('lbm', 100);
            $table->string('covid_contact', 100);
            $table->string('symptoms_contact', 100);
            $table->string('travel_outside', 100);
            $table->string('travel_ncr', 100);
            $table->string('authorize', 100);
            $table->string('understand', 100);
            $table->string('declare', 100);
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
        Schema::dropIfExists('visitors');
    }
}
