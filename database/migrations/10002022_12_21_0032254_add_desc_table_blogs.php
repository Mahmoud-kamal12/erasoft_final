<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function($table) {
            $table->string('slug');
        });



    }
    public function down()
    {
        Schema::table('blogs', function($table) {
            $table->dropColumn('slug');
        });


    }
};
