<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('materials', function(Blueprint $t){
            $t->id();
            $t->string('sku')->unique();
            $t->string('name');
            $t->string('unit')->default('each');
            $t->decimal('cost',10,2)->default(0);
            $t->foreignId('supplier_id')->nullable()->constrained()->nullOnDelete();
            $t->string('category')->nullable();
            $t->decimal('vat_rate',5,2)->default(20.00);
            $t->json('meta')->nullable();
            $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('materials'); }
};