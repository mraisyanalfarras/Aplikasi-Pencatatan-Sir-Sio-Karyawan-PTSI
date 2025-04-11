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
        Schema::create('data_sirs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nik');
            $table->string('nama');
            $table->string('position');
            $table->string('no_sir')->unique();
            $table->date('expire_date');
            $table->enum('status', ['active', 'expired', 'revoked'])->default('active');
            $table->date('reminder')->nullable();
            $table->string('location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_sirs');
    }
};
