<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public $withinTransaction = false;

    public function up(): void
    {
        // Only create if the table does NOT exist
        if (!Schema::hasTable('custom_support')) {
            Schema::create('custom_support', function (Blueprint $table) {
                $table->id();
                $table->string('source_type', 100);
                $table->string('income_source', 255)->nullable();
                $table->decimal('price', 10, 2)->nullable();
                $table->boolean('status')->default(true);
                $table->text('document_list')->nullable(); // JSON or comma-separated list
                $table->timestamp('created_time')->useCurrent();
                $table->timestamp('updated_time')->useCurrent();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Don’t drop this table automatically to preserve existing data
        // Schema::dropIfExists('custom_support');
    }
};
