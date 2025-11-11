<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Custom Support (Plan Data)
        Schema::create('custom_support', function (Blueprint $table) {
            $table->id();
            $table->string('source_type', 100);
            $table->string('income_source', 255)->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->boolean('status')->default(true);
            $table->text('document_list')->nullable(); // JSON or simple comma-separated list of required documents
            $table->timestamp('created_time')->useCurrent();
            $table->timestamp('updated_time')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_support');
    }
};
