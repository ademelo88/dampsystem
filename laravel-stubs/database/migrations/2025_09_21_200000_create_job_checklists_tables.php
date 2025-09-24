<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('job_checklists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->json('meta')->nullable();
            $table->timestamps();
        });
        Schema::create('job_checklist_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_checklist_id')->constrained()->cascadeOnDelete();
            $table->string('label');
            $table->boolean('passed')->default(false);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('job_checklist_items');
        Schema::dropIfExists('job_checklists');
    }
};
