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
        //id , id usuario seguidor, id usuario seguido
        Schema::create('followers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('following_id')->constrained()->cascadeOnDelete();
            $table->foreignId('follower_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('followers');
    }
};
