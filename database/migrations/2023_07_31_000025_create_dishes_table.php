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
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('country_id')
                  ->constrained('countries')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();

            $table->string('title');
            // $table->decimal('price', 7, 2); 
            $table->integer('price'); // изменено для stripe payment
            $table->string('description');
            
            $table->string('image')->nullable();
            $table->string('path')->nullable();
            
            $table->foreignId('vegetarian_id')
                  ->constrained('vegetarians')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dishes');
    }
};
