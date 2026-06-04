<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number')->unique();

            // Data Calon Siswa
            $table->string('nama_lengkap');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);

            // Data Ayah
            $table->string('nama_ayah');
            $table->string('hp_ayah');

            // Data Ibu
            $table->string('nama_ibu');
            $table->string('hp_ibu');

            // Alamat
            $table->text('alamat');

            // Dokumen Upload
            $table->string('foto_anak')->nullable();
            $table->string('akta_kelahiran')->nullable();
            $table->string('kartu_keluarga')->nullable();
            $table->string('ktp_ortu')->nullable();

            // Status
            $table->enum('status', ['pending', 'verified', 'accepted', 'rejected'])->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
