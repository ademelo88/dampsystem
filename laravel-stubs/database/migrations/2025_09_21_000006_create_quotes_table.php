<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('create_quotes_table', function (Blueprint $table) {
            
$table->id();
$table->foreignId('lead_id')->constrained()->cascadeOnDelete();
$table->string('version')->default('v1');
$table->string('status')->default('draft');
$table->json('totals')->nullable();
$table->timestamp('expires_at')->nullable();
$table->foreignId('accepted_option_id')->nullable()->constrained('quote_options')->nullOnDelete();
$table->timestamps();

        });
    }
    public function down(): void {
        Schema::dropIfExists('create_quotes_table');
    }
};
