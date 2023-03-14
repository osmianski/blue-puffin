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
        Schema::create('nodes', function (Blueprint $table) {
            $table->id();
            $table->string('type', 20)->nullable();
            $table->string('slug')->nullable()->index();
            $table->foreignId('page_id')
                ->nullable() // NULL for user' s root database
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignId('owner_id')
                ->nullable() // non-NULL for databases
                ->constrained('users')
                ->cascadeOnDelete();
            $table->json('data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nodes');
    }
};
