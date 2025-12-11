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
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();

            // File upload settings
            $table->integer('max_file_size')->default(50);
            $table->integer('max_total_size')->default(500);
            $table->integer('max_no_files')->default(50);
            $table->boolean('virus_scanning')->default(true);

            //allowed file types
            $table->jsonb('allowed_file_type');

            //system setting
            $table->string('app_name')->default('Document Management System');
            $table->string('support_email')->default('support@example.com');
            $table->boolean('email_notification')->default(true);
            $table->boolean('document_versioning')->default(true);
            $table->integer('retention_days');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configurations');
    }
};
