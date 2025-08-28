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
        Schema::table('settings', function (Blueprint $table) {
            // Menambahkan 3 kolom baru setelah kolom 'youtube'
            $table->text('address')->nullable()->after('youtube');
            $table->string('phone', 50)->nullable()->after('address');
            $table->string('email', 255)->nullable()->after('phone'); // <-- Perbaikan ada di sini
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['address', 'phone', 'email']);
        });
    }
};
