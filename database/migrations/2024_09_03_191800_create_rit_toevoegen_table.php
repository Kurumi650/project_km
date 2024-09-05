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
        Schema::create('rit_overzicht', function (Blueprint $table) {
            $table->id();
            $table->date('datum'); 
            $table->time('tijd_van'); 
            $table->time('tijd_tot'); 
            $table->string('locatie_van');
            $table->string('locatie_tot');
            $table->integer('afstand');
            $table->foreignId('voertuig_id')
                  ->constrained('voertuigen'); 
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rit_toevoegen');
    }
};
