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
        Schema::create('upload_doc_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->after('id'); 
            $table->unsignedBigInteger('upload_doc_id')->nullable()->after('user_id'); 
            $table->string('doc_type'); 
            $table->jsonb('doc_tags')->nullable();
            $table->string('file_path');
            $table->string('file_type');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upload_doc_files');
    }
};
