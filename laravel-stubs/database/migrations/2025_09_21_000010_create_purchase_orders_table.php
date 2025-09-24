<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('create_purchase_orders_table', function (Blueprint $table) {
            
$table->id();
$table->foreignId('supplier_id')->constrained()->cascadeOnDelete();
$table->foreignId('job_id')->nullable()->constrained()->nullOnDelete();
$table->json('items')->nullable();
$table->string('status')->default('draft');
$table->decimal('total',10,2)->default(0);
$table->timestamps();

        });
    }
    public function down(): void {
        Schema::dropIfExists('create_purchase_orders_table');
    }
};
