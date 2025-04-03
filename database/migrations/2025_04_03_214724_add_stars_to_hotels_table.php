<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStarsToHotelsTable extends Migration
{
    public function up()
    {
        Schema::table('hotels', function (Blueprint $table) {
            $table->unsignedTinyInteger('stars')->default(0); // Adds stars column with a default value
        });
    }

    public function down()
    {
        Schema::table('hotels', function (Blueprint $table) {
            $table->dropColumn('stars'); // Drops stars column
        });
    }
}