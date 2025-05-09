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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('discount_id')->nullable()->constrained('discounts')->onDelete('set null');
            $table->integer('total_pembelian');
            $table->integer('discount_amount')->default(0);
            $table->integer('total_akhir');
            $table->enum('status_pembelian', ['pending', 'sudah dibayar', 'kadaluarsa', 'gagal', 'dibatalkan', 'dikembalikan'])->default('pending');
            $table->string('order_id')->unique();
            $table->enum('metode_pembayaran', ['midtrans', 'qris', 'ewallet', 'manual_transfer']);
            $table->string('transaction_id')->unique()->nullable();
            $table->text('payment_url')->nullable();
            $table->text('midtrans_response')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
