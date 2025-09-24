<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('create_suppliers_table', function (Blueprint $table) {
            
$table->id();
$table->string('name');
$table->json('contact')->nullable();
$table->json('terms')->nullable();
$table->json('kpis')->nullable();
$table->timestamps();

        });
    }
    public function down(): void {
        Schema::dropIfExists('create_suppliers_table');
    }
};
