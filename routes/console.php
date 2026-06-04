<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('admin:create {name} {email} {password}', function ($name, $email, $password) {
    $validator = Illuminate\Support\Facades\Validator::make([
        'name' => $name,
        'email' => $email,
        'password' => $password,
    ], [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:6',
    ]);

    if ($validator->fails()) {
        foreach ($validator->errors()->all() as $error) {
            $this->error($error);
        }
        return 1;
    }

    $user = App\Models\User::create([
        'name' => $name,
        'email' => $email,
        'password' => Illuminate\Support\Facades\Hash::make($password),
    ]);

    $this->info("User admin baru berhasil dibuat!");
    $this->line("Nama: {$user->name}");
    $this->line("Email/Username: {$user->email}");
    return 0;
})->purpose('Membuat user admin baru');
