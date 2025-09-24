<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('labour_rates', function(Blueprint $t){
            $t->id();
            $t->string('role')->unique();
            $t->decimal('hourly_rate',10,2);
            $t->decimal('overhead_pct',5,2)->default(0);
            $t->text('note')->nullable();
            $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('labour_rates'); }
};