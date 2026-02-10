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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->statusColumn();
            $table->booleanColumn('is_default');
            $table->string('slug', 200)->nullable();
            $table->string('template', 50)->default('page')->index();
            $table->text('title')->nullable();
            $table->longText('data')->nullable();
            $table->timestamps();

            $table->index(['status', 'slug']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
