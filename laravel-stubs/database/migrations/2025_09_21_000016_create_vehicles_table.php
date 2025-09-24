<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('create_vehicles_table', function (Blueprint $table) {
            
$table->id();
$table->string('reg')->unique();
$table->string('make')->nullable();
$table->string('model')->nullable();
$table->date('mot_due')->nullable();
$table->date('service_due')->nullable();
$table->json('meta')->nullable();
$table->timestamps();

        });
    }
    public function down(): void {
        Schema::dropIfExists('create_vehicles_table');
    }
};
