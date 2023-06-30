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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('folio');
            $table->string('pdf');
            $table->string('xml');

            //agregamos la empresa receptora relacionada 
            $table->foreignId('receptora_id')->constrained();
            //agregamos la empresa receptora relacionada 
            $table->foreignId('emisora_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
