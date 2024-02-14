<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('scripts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 70);
            $table->text('description');
            $table->string('price', 70);

            // $table->foreignIdFor(User::class);
            // $table->foreign('user_id')->on('users')->references('id');

            $table->foreignIdFor(Category::class);
            $table->foreign('category_id')->on('categories')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scripts');
    }
};
