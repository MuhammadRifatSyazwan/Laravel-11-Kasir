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
        Schema::table('detil_transaksis', function (Blueprint $table) {
            $table->unsignedBigInteger('transaksi_id');
        // Tambahkan constraint atau indeks jika diperlukan
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detil_transaksis', function (Blueprint $table) {
            $table->dropColumn('transaksi_id');
        });
    }
};
