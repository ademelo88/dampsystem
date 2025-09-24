<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('create_timesheets_table', function (Blueprint $table) {
            
$table->id();
$table->foreignId('user_id')->constrained()->cascadeOnDelete();
$table->foreignId('job_id')->constrained()->cascadeOnDelete();
$table->decimal('hours',5,2);
$table->text('notes')->nullable();
$table->date('date');
$table->timestamps();

        });
    }
    public function down(): void {
        Schema::dropIfExists('create_timesheets_table');
    }
};
