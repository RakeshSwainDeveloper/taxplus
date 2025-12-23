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
        // Only create the table if it does NOT already exist
        if (!Schema::hasTable('user_registration_form')) {
            Schema::create('user_registration_form', function (Blueprint $table) {
                $table->id();
                $table->integer('source_id')->nullable(); // Foreign key to custom_support.id
                $table->decimal('total_price', 10, 2)->nullable();
                $table->boolean('payment_status')->default(false);
                $table->string('form_status', 20)->default('Draft'); // Draft, Documents Shared, etc.
                $table->string('payment_mode', 20)->nullable();
                $table->string('document_method', 20)->nullable(); // Email, Upload, WhatsApp
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
        // Don’t drop the existing manual table to avoid data loss
        // Schema::dropIfExists('user_registration_form');
    }
};
