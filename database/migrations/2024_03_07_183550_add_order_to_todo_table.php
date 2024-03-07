<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('todo', function (Blueprint $table) {
            $table->integer('order')->nullable();
        });
    }

    public function down()
    {
        Schema::table('todo', function (Blueprint $table) {
            $table->dropColumn('order');
        });
    }
};
