<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('create_quote_options_table', function (Blueprint $table) {
            
$table->id();
$table->foreignId('quote_id')->constrained()->cascadeOnDelete();
$table->string('tier'); // good|better|best
$table->text('summary')->nullable();
$table->integer('warranty_months')->default(12);
$table->json('lines')->nullable(); // [{assembly_id, qty, price}]
$table->json('totals')->nullable();
$table->timestamps();

        });
    }
    public function down(): void {
        Schema::dropIfExists('create_quote_options_table');
    }
};
