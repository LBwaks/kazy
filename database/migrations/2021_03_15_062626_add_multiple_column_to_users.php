<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleColumnToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('highest_education')->nullable();
            $table->string('other_education')->nullable();
            $table->string('experience')->nullable();
            $table->string('skills')->nullable();
            $table->string('cv_and_certificates')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['highest_education','other_education','experience','skills','cv_and_certificates']);
        });
    }
}
