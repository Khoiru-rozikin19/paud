<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Tambah kolom hp_ortu
        Schema::table('registrations', function (Blueprint $table) {
            $table->string('hp_ortu')->nullable();
        });

        // 2. Salin data hp_ayah ke hp_ortu (jika ada data eksisting)
        DB::table('registrations')->update([
            'hp_ortu' => DB::raw('hp_ayah')
        ]);

        // 3. Drop kolom hp_ayah dan hp_ibu
        Schema::table('registrations', function (Blueprint $table) {
            $table->dropColumn(['hp_ayah', 'hp_ibu']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->string('hp_ayah')->nullable();
            $table->string('hp_ibu')->nullable();
        });

        DB::table('registrations')->update([
            'hp_ayah' => DB::raw('hp_ortu')
        ]);

        Schema::table('registrations', function (Blueprint $table) {
            $table->dropColumn('hp_ortu');
        });
    }
};
