<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('scripts', function (Blueprint $table) {
            $table->string('source_code_path')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('scripts', function (Blueprint $table) {
            $table->dropColumn('source_code_path');
        });
    }
    
};
