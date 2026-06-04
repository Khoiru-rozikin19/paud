<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'registration_number',
        'nama_lengkap',
        'tanggal_lahir',
        'jenis_kelamin',
        'nama_ayah',
        'hp_ayah',
        'nama_ibu',
        'hp_ibu',
        'alamat',
        'foto_anak',
        'akta_kelahiran',
        'kartu_keluarga',
        'ktp_ortu',
        'status',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    /**
     * Generate a unique registration number.
     */
    public static function generateRegistrationNumber(): string
    {
        $year = date('Y');
        $lastReg = self::whereYear('created_at', $year)
            ->orderBy('id', 'desc')
            ->first();

        $nextNumber = $lastReg ? ((int) substr($lastReg->registration_number, -4)) + 1 : 1;

        return 'PSB-' . $year . '-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }
}
