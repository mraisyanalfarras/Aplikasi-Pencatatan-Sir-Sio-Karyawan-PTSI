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
        Schema::create('data_sims', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nik');
            $table->string('name');
            $table->string('no_sim')->unique();
            $table->string('position');
            $table->string('type_sim');
            $table->string('location');
            $table->date('expire_date');
            $table->date('reminder')->nullable();
            $table->enum('status', ['active', 'expired', 'revoked'])->default('active');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_sims');
    }
};
