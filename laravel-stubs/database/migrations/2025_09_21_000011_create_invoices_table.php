<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('create_invoices_table', function (Blueprint $table) {
            
$table->id();
$table->foreignId('job_id')->constrained()->cascadeOnDelete();
$table->string('type'); // deposit|progress|final|variation
$table->json('lines')->nullable();
$table->decimal('total',10,2)->default(0);
$table->decimal('vat_rate',5,2)->default(20.00);
$table->timestamp('due_at')->nullable();
$table->string('status')->default('pending');
$table->timestamps();

        });
    }
    public function down(): void {
        Schema::dropIfExists('create_invoices_table');
    }
};
