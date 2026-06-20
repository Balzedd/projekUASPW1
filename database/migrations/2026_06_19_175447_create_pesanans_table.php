
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();

            // User yang memesan
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            // Acara yang dipilih
            $table->foreignId('acara_id')
                  ->constrained('acaras')
                  ->onDelete('cascade');

            // Jenis tiket yang dipilih
            $table->foreignId('tiket_id')
                  ->constrained('tikets')
                  ->onDelete('cascade');

            // Jumlah tiket
            $table->integer('jumlah');

            // Harga per tiket saat transaksi
            $table->decimal('harga_satuan', 12, 0);

            // Total pembayaran
            $table->decimal('total_harga', 12, 0);

            // Status pesanan
            $table->enum('status', [
                'pending',
                'dibayar',
                'dibatalkan'
            ])->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};

