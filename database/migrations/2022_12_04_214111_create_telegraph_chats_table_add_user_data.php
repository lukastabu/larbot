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
        Schema::table('telegraph_chats', static function (Blueprint $table) {
            $table->integer('weight_min')->nullable()->default(null);
            $table->integer('weight_max')->nullable()->default(null);
            $table->enum('gender', ['female', 'male'])->nullable()->default(null);
            $table->integer('reminders')->nullable()->default(null);
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
