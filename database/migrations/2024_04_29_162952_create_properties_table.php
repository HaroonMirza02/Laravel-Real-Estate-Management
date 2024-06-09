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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->double('price', 8, 2);
            $table->enum('purpose', ['sale', 'rent']);
            $table->enum('type', ['house', 'apartment']);
            $table->string('image')->nullable();
            $table->integer('bedroom');
            $table->integer('bathroom');
            $table->string('city');
            $table->string('address');
            $table->string('area');
            $table->integer('agent_id');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
