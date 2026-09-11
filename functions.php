<?php

// Fungsi untuk mengamankan output
function e($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

// Daftar program studi yang diizinkan
function daftarProgramStudi()
{
    return [
        'Teknik Informatika',
        'Manajemen Informatika',
        'Akuntansi'
    ];
}

// Daftar kegiatan yang diizinkan
function daftarKegiatan()
{
    return [
        'Seminar',
        'Workshop',
        'Pelatihan',
        'Lomba'
    ];
}

// Validasi seluruh form
function validasiForm($data)
{
    $errors = [];

    $nama = trim($data['nama'] ?? '');
    $nim = trim($data['nim'] ?? '');
    $email = trim($data['email'] ?? '');
    $program_studi = $data['program_studi'] ?? '';
    $kegiatan = $data['kegiatan'] ?? '';
    $jumlah_peserta = $data['jumlah_peserta'] ?? '';
    $persetujuan = $data['persetujuan'] ?? '';

    // Validasi nama
    if ($nama === '') {
        $errors['nama'] = 'Nama wajib diisi.';
    } elseif (strlen($nama) < 3) {
        $errors['nama'] = 'Nama minimal 3 karakter.';
    }

    // Validasi NIM
    if ($nim === '') {
        $errors['nim'] = 'NIM wajib diisi.';
    } elseif (!preg_match('/^[0-9]{8,15}$/', $nim)) {
        $errors['nim'] = 'NIM harus berupa 8-15 digit angka.';
    }

    // Validasi email
    if ($email === '') {
        $errors['email'] = 'Email wajib diisi.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Format email tidak valid.';
    }

    // Validasi program studi
    if (!in_array($program_studi, daftarProgramStudi(), true)) {
        $errors['program_studi'] = 'Program studi tidak valid.';
    }

    // Validasi kegiatan
    if (!in_array($kegiatan, daftarKegiatan(), true)) {
        $errors['kegiatan'] = 'Kegiatan tidak valid.';
    }

    // Validasi jumlah peserta
    if (!in_array((string) $jumlah_peserta, ['1', '2', '3'], true)) {
        $errors['jumlah_peserta'] = 'Jumlah peserta harus antara 1-3.';
    }

    // Validasi persetujuan
    if ($persetujuan !== 'setuju') {
        $errors['persetujuan'] = 'Persetujuan wajib dicentang.';
    }

    return $errors;
}