<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('create_leads_table', function (Blueprint $table) {
            
$table->id();
$table->foreignId('contact_id')->constrained()->cascadeOnDelete();
$table->foreignId('property_id')->constrained()->cascadeOnDelete();
$table->json('problems')->nullable();
$table->string('severity')->nullable();
$table->string('duration')->nullable();
$table->string('status')->default('new');
$table->json('metadata')->nullable();
$table->timestamps();

        });
    }
    public function down(): void {
        Schema::dropIfExists('create_leads_table');
    }
};
