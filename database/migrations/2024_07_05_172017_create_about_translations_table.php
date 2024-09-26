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
        Schema::create('about_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('about_id');

            $table->string('locale', 3);

            $table->string('title', 255)->nullable();
            $table->longText('content')->nullable();


            $table->unique(['about_id', 'locale'], 'a_translation_id');

            $table->foreign('about_id', 'a_id')
                ->references('id')
                ->on('abouts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_translations');
    }
};
