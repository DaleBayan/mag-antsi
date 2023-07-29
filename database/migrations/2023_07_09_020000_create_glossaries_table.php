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
        Schema::create('glossaries', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('slug', 255);
            $table->string('term_eng', 255);
            $table->string('term_fil', 255);
            $table->text('description_eng');
            $table->text('description_fil');
            $table->string('mag-antsi', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glossaries');
    }
};
