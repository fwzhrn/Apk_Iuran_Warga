<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('dues_members', function (Blueprint $table) {
            $table->enum('periode_pembayaran', ['minggu', 'bulan'])->default('bulan')->after('user_id');
        });
    }

    public function down(): void
    {
        Schema::table('dues_members', function (Blueprint $table) {
            $table->dropColumn('periode_pembayaran');
        });
    }
};
