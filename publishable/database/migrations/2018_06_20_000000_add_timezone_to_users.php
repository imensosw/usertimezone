<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimezoneToUsers extends Migration
{
    /**
     * Run the migrations 1.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->string('time_zone')->after('remember_token')->nullable()->default('UTC');;
        });
    }

    /**
     * Reverse the migrations 12.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('time_zone');
        });
    }
}
