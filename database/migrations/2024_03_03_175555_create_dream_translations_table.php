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
        Schema::create('dream_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('dream_id');

            $table->string('name', 255)->nullable();
            $table->string('slug', 255)->unique()->nullable();
            $table->string('locale', 3);

            $table->string('title', 255)->nullable();
            $table->string('keywords', 555)->nullable();
            $table->string('description', 255)->nullable();

            $table->longText('text')->nullable();


            $table->unique(['dream_id', 'locale'], 'd_translation_id');

            $table->foreign('dream_id', 'd_id')
                ->references('id')
                ->on('dreams')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dream_translations');
    }
};
