<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('create_assemblies_table', function (Blueprint $table) {
            
$table->id();
$table->string('code')->unique();
$table->string('name');
$table->text('description')->nullable();
$table->json('bom')->nullable(); // [{sku, name, uom, qty, cost}]
$table->decimal('labour_hours',8,2)->default(0);
$table->json('tags')->nullable();
$table->timestamps();

        });
    }
    public function down(): void {
        Schema::dropIfExists('create_assemblies_table');
    }
};
