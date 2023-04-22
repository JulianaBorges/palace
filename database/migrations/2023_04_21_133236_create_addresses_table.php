<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string(column:'zipcode');
            $table->string(column:'street');
            $table->string(column:'neighborhood');
            $table->string(column:'city');
            $table->string(column:'state');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
