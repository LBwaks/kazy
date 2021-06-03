<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('highest_education')->default('No Records Found')->nullable()->change();
            $table->string('other_education')->default('No Records Found')->nullable()->change();
            $table->string('experience')->default('No Records Found')->nullable()->change();
            $table->string('skills')->default('No Records Found')->nullable()->change();
            $table->string('cv_and_certificates')->default('No Records Found')->nullable()->change();
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
            //
        });
    }
}
