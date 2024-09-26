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
        Schema::create('dream_category_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('dream_category_id');

            $table->string('name', 255)->nullable();
            $table->string('locale', 3);

            $table->unique(['dream_category_id', 'locale'], 'dc_translation_id');

            $table->foreign('dream_category_id', 'dc_id')
                ->references('id')
                ->on('dream_categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dream_category_translations');
    }
};
