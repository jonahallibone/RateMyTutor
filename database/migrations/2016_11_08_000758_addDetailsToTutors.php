<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDetailsToTutors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('tutors', function (Blueprint $table) {
        $table->string('phone_number');
        $table->string('email');
        $table->integer('hourly_rate');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('tutors', function (Blueprint $table) {
        $table->drop('phone_number');
        $table->drop('email');
        $table->drop('hourly_rate');
      });
    }
}
