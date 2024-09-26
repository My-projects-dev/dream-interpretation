<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('setting_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('setting_id');

            $table->text('value')->nullable();

            $table->string('locale', 3);

            $table->unique(['setting_id', 'locale']);

            $table->foreign('setting_id')
                ->references('id')
                ->on('settings')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_translations');
    }
};
