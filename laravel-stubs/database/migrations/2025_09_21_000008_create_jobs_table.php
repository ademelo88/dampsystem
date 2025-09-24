<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('create_jobs_table', function (Blueprint $table) {
            
$table->id();
$table->foreignId('quote_id')->constrained()->cascadeOnDelete();
$table->timestamp('schedule_start')->nullable();
$table->timestamp('schedule_end')->nullable();
$table->string('status')->default('planned');
$table->text('crew_notes')->nullable();
$table->timestamps();

        });
    }
    public function down(): void {
        Schema::dropIfExists('create_jobs_table');
    }
};
