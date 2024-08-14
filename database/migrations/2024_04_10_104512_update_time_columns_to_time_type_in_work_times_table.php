<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('work_times', function (Blueprint $table) {
            $table->time('timeFrom')->nullable()->change();
            $table->time('timeTo')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('work_times', function (Blueprint $table) {
            $table->datetime('timeFrom')->nullable()->change();  // Adjust based on original type if necessary
            $table->datetime('timeTo')->nullable()->change();    // Adjust based on original type if necessary
        });
    }
};
