<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('create_surveys_table', function (Blueprint $table) {
            
$table->id();
$table->foreignId('lead_id')->constrained()->cascadeOnDelete();
$table->json('data')->nullable();
$table->text('notes')->nullable();
$table->timestamps();

        });
    }
    public function down(): void {
        Schema::dropIfExists('create_surveys_table');
    }
};
