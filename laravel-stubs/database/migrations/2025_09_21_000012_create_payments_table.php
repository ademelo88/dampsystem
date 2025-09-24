<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('create_payments_table', function (Blueprint $table) {
            
$table->id();
$table->foreignId('invoice_id')->constrained()->cascadeOnDelete();
$table->string('method'); // stripe|gocardless|bank
$table->decimal('amount',10,2);
$table->string('reference')->nullable();
$table->timestamp('received_at')->nullable();
$table->json('meta')->nullable();
$table->timestamps();

        });
    }
    public function down(): void {
        Schema::dropIfExists('create_payments_table');
    }
};
