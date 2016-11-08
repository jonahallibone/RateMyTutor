<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeToVote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('votes', function(Blueprint $table) {
          $table->integer('type');
          $table->renameColumn('tutor_id', 'foreign_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('votes', function(Blueprint $table) {
        $table->drop('type');
        $table->renameColumn('foreign_id', 'tutor_id');
      });
    }
}
