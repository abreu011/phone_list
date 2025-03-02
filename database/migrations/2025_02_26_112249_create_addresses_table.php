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
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('contact_id')
                ->constrained()
                ->onDelete('cascade');
            $table->string('city', 100);
            $table->string('state', 100);    
            $table->string('zip_code', 10);
            $table->string('neighborhood', 200);
            $table->string('street', 200);
            $table->string('number', 10);                     
            $table->string('complement', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adresses');
    }
};
