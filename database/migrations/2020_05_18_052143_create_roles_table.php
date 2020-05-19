<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        DB::table('roles')->insert([
            'id' => '9',  
            'name' => 'Admin',  
        ]);

        DB::table('roles')->insert([
            'id' => '1',  
            'name' => 'Member',  
        ]);

        DB::table('roles')->insert([
            'id' => '2',  
            'name' => 'Nurse',  
        ]);

        DB::table('roles')->insert([
            'id' => '3',  
            'name' => 'Doctor',  
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
