<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegistrationController extends Controller
{
    /**
     * Tampilkan halaman utama dengan formulir pendaftaran.
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Simpan data pendaftaran.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            // Data Calon Siswa
            'nama_lengkap'  => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',

            // Data Orang Tua
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu'  => 'required|string|max:255',
            'hp_ortu'   => 'required|string|max:20',

            // Alamat
            'alamat' => 'required|string',

            // Dokumen
            'foto_anak'      => 'required|file|mimes:jpg,jpeg,png|max:5120',
            'akta_kelahiran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'kartu_keluarga' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'ktp_ortu'       => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ], [
            'nama_lengkap.required'  => 'Nama lengkap wajib diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'nama_ayah.required'     => 'Nama ayah wajib diisi.',
            'nama_ibu.required'      => 'Nama ibu wajib diisi.',
            'hp_ortu.required'       => 'No. HP Orang Tua / Wali wajib diisi.',
            'alamat.required'        => 'Alamat wajib diisi.',
            'foto_anak.required'     => 'Foto selfie anak wajib diunggah.',
            'foto_anak.max'          => 'Ukuran foto maksimal 5MB.',
            'akta_kelahiran.required'=> 'Scan akta kelahiran wajib diunggah.',
            'akta_kelahiran.max'     => 'Ukuran file maksimal 5MB.',
            'kartu_keluarga.required'=> 'Scan kartu keluarga wajib diunggah.',
            'kartu_keluarga.max'     => 'Ukuran file maksimal 5MB.',
            'ktp_ortu.required'      => 'Scan KTP orang tua wajib diunggah.',
            'ktp_ortu.max'           => 'Ukuran file maksimal 5MB.',
        ]);

        // Generate nomor pendaftaran
        $registrationNumber = Registration::generateRegistrationNumber();

        // Upload dokumen
        $fotoPaths = [];
        $uploadFields = ['foto_anak', 'akta_kelahiran', 'kartu_keluarga', 'ktp_ortu'];

        foreach ($uploadFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = $registrationNumber . '_' . $field . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('registrations/' . $registrationNumber, $filename, 'public');
                $fotoPaths[$field] = $path;
            }
        }

        // Simpan ke database
        $registration = Registration::create([
            'registration_number' => $registrationNumber,
            'nama_lengkap'        => $validated['nama_lengkap'],
            'tanggal_lahir'       => $validated['tanggal_lahir'],
            'jenis_kelamin'       => $validated['jenis_kelamin'],
            'nama_ayah'           => $validated['nama_ayah'],
            'nama_ibu'            => $validated['nama_ibu'],
            'hp_ortu'             => $validated['hp_ortu'],
            'alamat'              => $validated['alamat'],
            'foto_anak'           => $fotoPaths['foto_anak'] ?? null,
            'akta_kelahiran'      => $fotoPaths['akta_kelahiran'] ?? null,
            'kartu_keluarga'      => $fotoPaths['kartu_keluarga'] ?? null,
            'ktp_ortu'            => $fotoPaths['ktp_ortu'] ?? null,
        ]);

        return redirect()->route('registration.success', $registration->registration_number);
    }

    /**
     * Halaman konfirmasi sukses pendaftaran.
     */
    public function success(string $registrationNumber)
    {
        $registration = Registration::where('registration_number', $registrationNumber)->firstOrFail();

        return view('success', compact('registration'));
    }
}
