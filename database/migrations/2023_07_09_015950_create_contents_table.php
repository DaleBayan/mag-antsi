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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('type', 255);
            $table->string('slug', 255);
            $table->string('title_eng', 255);
            $table->string('title_fil', 255);
            $table->text('body_eng');
            $table->text('body_fil');
            $table->string('media_type', 255);
            $table->string('media', 255)->nullable();
            $table->string('mag_antsi', 255)->nullable();
            $table->boolean('spotlight');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
