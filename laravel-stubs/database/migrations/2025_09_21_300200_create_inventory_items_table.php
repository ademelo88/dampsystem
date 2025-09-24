<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('inventory_items', function(Blueprint $t){
            $t->id();
            $t->foreignId('material_id')->constrained()->cascadeOnDelete();
            $t->string('location')->default('warehouse');
            $t->integer('qty_on_hand')->default(0);
            $t->integer('min_qty')->default(0);
            $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('inventory_items'); }
};