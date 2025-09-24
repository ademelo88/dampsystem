<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('create_documents_table', function (Blueprint $table) {
            
$table->id();
$table->string('owner_type');
$table->unsignedBigInteger('owner_id');
$table->string('type'); // survey|quote|rams|warranty
$table->string('path');
$table->json('meta')->nullable();
$table->timestamps();

        });
    }
    public function down(): void {
        Schema::dropIfExists('create_documents_table');
    }
};
