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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manufacturer')->constrained()->cascadeOnDelete();
            $table->string('model');
            $table->date('year');
            $table->string('color');
            $table->integer('mileage');
            $table->string('vin')->unique();
            $table->enum('transmission', ['Manual', 'Automatic']);
            $table->string('engine');
            $table->enum('fuel_type', ['Petrol', 'Diesel', 'Electric']);
            $table->decimal('price', 8, 2);
            $table->enum('status', ['Available', 'Sold', 'Pending']);
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
