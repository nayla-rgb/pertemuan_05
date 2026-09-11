<?php

session_start();

require_once __DIR__ . '/functions.php';

// Pastikan halaman hanya menerima POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// Ambil data dari form
$data = [
    'nama' => trim($_POST['nama'] ?? ''),
    'nim' => trim($_POST['nim'] ?? ''),
    'email' => trim($_POST['email'] ?? ''),
    'program_studi' => $_POST['program_studi'] ?? '',
    'kegiatan' => $_POST['kegiatan'] ?? '',
    'jumlah_peserta' => $_POST['jumlah_peserta'] ?? '',
    'persetujuan' => $_POST['persetujuan'] ?? ''
];

// Validasi
$errors = validasiForm($data);

// Jika terdapat error
if (!empty($errors)) {

    // Simpan nilai lama
    $_SESSION['old'] = $data;

    // Simpan error
    $_SESSION['errors'] = $errors;

    // Redirect kembali ke form
    header('Location: index.php');
    exit;
}

// Jika valid, simpan hanya ringkasan non-sensitif
$_SESSION['hasil'] = [
    'program_studi' => $data['program_studi'],
    'kegiatan' => $data['kegiatan'],
    'jumlah_peserta' => $data['jumlah_peserta']
];

// Redirect menggunakan PRG
header('Location: sukses.php');
exit;