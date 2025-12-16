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
        Schema::table('configurations', function (Blueprint $table) {
            //  
            $table->unsignedBigInteger('user_id')->nullable()->after('id');   
        });
        
        DB::table('configurations')->update([
            'user_id' => 1
        ]);

        Schema::table('configurations', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users') ->onDelete('cascade');            
        });
           
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('configurations', function (Blueprint $table) {
            //
        });
    }
};
