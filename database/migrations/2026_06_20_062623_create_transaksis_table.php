<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesanan_id')->constrained('pesanans')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('acara_id')->constrained('acaras')->cascadeOnDelete();
            $table->foreignId('tiket_id')->nullable()->constrained('tikets')->nullOnDelete();
            $table->unsignedInteger('jumlah')->default(1);
            $table->decimal('total_harga', 12, 2)->default(0);
            $table->string('metode_pembayaran')->nullable();
            $table->enum('status', ['lunas', 'gagal'])->default('lunas');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};