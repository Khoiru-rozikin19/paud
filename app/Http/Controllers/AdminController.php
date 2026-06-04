<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Tampilkan halaman login admin.
     */
    public function loginForm()
    {
        return view('admin.login');
    }

    /**
     * Proses login admin (simple auth tanpa user model).
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // 1. Cek Admin credentials dari config/app.php (production-safe / default fallback)
        $adminUser = config('app.admin_username');
        $adminPass = config('app.admin_password');

        if ($request->username === $adminUser && $request->password === $adminPass) {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.dashboard');
        }

        // 2. Cek database-based users (dari tabel users)
        $user = \App\Models\User::where('email', $request->username)
            ->orWhere('name', $request->username)
            ->first();

        if ($user && \Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['login' => 'Username atau password salah.']);
    }

    /**
     * Logout admin.
     */
    public function logout()
    {
        session()->forget('admin_logged_in');
        return redirect()->route('admin.login');
    }

    /**
     * Dashboard admin — daftar semua pendaftaran.
     */
    public function dashboard(Request $request)
    {
        $query = Registration::query()->latest();

        // Filter status
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                  ->orWhere('registration_number', 'like', "%{$search}%")
                  ->orWhere('nama_ayah', 'like', "%{$search}%")
                  ->orWhere('nama_ibu', 'like', "%{$search}%");
            });
        }

        $registrations = $query->paginate(15);

        // Stats
        $stats = [
            'total'    => Registration::count(),
            'pending'  => Registration::where('status', 'pending')->count(),
            'verified' => Registration::where('status', 'verified')->count(),
            'accepted' => Registration::where('status', 'accepted')->count(),
            'rejected' => Registration::where('status', 'rejected')->count(),
        ];

        return view('admin.dashboard', compact('registrations', 'stats'));
    }

    /**
     * Detail pendaftaran.
     */
    public function show(Registration $registration)
    {
        return view('admin.detail', compact('registration'));
    }

    /**
     * Update status pendaftaran.
     */
    public function updateStatus(Request $request, Registration $registration)
    {
        $request->validate([
            'status' => 'required|in:pending,verified,accepted,rejected',
        ]);

        $registration->update(['status' => $request->status]);

        $statusLabels = [
            'pending'  => 'Menunggu Verifikasi',
            'verified' => 'Terverifikasi',
            'accepted' => 'Diterima',
            'rejected' => 'Ditolak',
        ];

        return back()->with('success', 'Status berhasil diubah menjadi "' . $statusLabels[$request->status] . '".');
    }

    /**
     * Hapus pendaftaran.
     */
    public function destroy(Registration $registration)
    {
        // Hapus file uploads
        $files = ['foto_anak', 'akta_kelahiran', 'kartu_keluarga', 'ktp_ortu'];
        foreach ($files as $field) {
            if ($registration->$field) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($registration->$field);
            }
        }

        $registration->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Data pendaftaran berhasil dihapus.');
    }
}
