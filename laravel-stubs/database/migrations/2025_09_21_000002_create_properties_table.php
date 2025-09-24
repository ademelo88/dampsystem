<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('create_properties_table', function (Blueprint $table) {
            
$table->id();
$table->foreignId('contact_id')->constrained()->cascadeOnDelete();
$table->string('address');
$table->string('postcode');
$table->string('type')->nullable();
$table->string('age_band')->nullable();
$table->string('occupancy')->nullable();
$table->string('ownership')->nullable();
$table->timestamps();

        });
    }
    public function down(): void {
        Schema::dropIfExists('create_properties_table');
    }
};
