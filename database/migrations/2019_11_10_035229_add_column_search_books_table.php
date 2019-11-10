<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnSearchBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('auther')->nullable();
            $table->string('publisher')->nullable();
            $table->date('release')->nullable();
            $table->string('largegenre')->nullable();
            $table->string('smallgenre')->nullable();
            $table->string('titletag')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('auther');
            $table->dropColumn('publisher');
            $table->dropColumn('release');
            $table->dropColumn('largegenre');
            $table->dropColumn('smallgenre');
            $table->dropColumn('titletag');
        });
    }
}
