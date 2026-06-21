
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

            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('acara_id')
                  ->constrained('acaras')
                  ->onDelete('cascade');

            $table->foreignId('tiket_id')
                  ->constrained('tikets')
                  ->onDelete('cascade');

            $table->integer('jumlah');

    
            $table->decimal('harga_satuan', 12, 0);

        
            $table->decimal('total_harga', 12, 0);

        
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

