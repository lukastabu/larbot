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
    public function up():void
    {
        Schema::table('telegraph_chats', function (Blueprint $table) {
            $table->integer('weight_min')->default('0');
            $table->integer('weight_max')->default('55');
            $table->enum('gender', ['female', 'male'])->default('female');
            $table->integer('reminders')->default('5');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down():void
    {
        Schema::table('telegraph_chats', function (Blueprint $table) {
            $table->dropColumn(['weight_min', 'weight_max', 'gender', 'reminders']);
        });

    }
};
