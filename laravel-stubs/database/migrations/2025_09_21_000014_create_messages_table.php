<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('create_messages_table', function (Blueprint $table) {
            
$table->id();
$table->unsignedBigInteger('thread_id')->nullable();
$table->unsignedBigInteger('from_id')->nullable();
$table->unsignedBigInteger('to_id')->nullable();
$table->text('body');
$table->json('attachments')->nullable();
$table->string('channel')->default('portal'); // portal|email|sms
$table->timestamps();

        });
    }
    public function down(): void {
        Schema::dropIfExists('create_messages_table');
    }
};
