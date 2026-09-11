<?php $nama = trim($_GET['nama'] ?? 'Peserta'); ?>
<!doctype html><html lang="id"><head><meta charset="utf-8">
<title>Berhasil</title></head><body>
<h1>Pendaftaran Berhasil</h1>
<p>Terima kasih, <?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') ?>.</p>
<a href="form.php">Kembali ke form</a>
</body></html>

<?php

session_start();

require_once __DIR__ . '/functions.php';

$title = 'Pendaftaran Berhasil';

$hasil = $_SESSION['hasil'] ?? null;

// Jika tidak ada data hasil, kembali ke form
if ($hasil === null) {
    header('Location: index.php');
    exit;
}

// Hapus data session setelah ditampilkan
unset($_SESSION['hasil']);

require_once __DIR__ . '/components/header.php';

?>

<h2><?= e('Pendaftaran Berhasil') ?></h2>

<div class="success">
    <?= e('Data berhasil dikirim dan telah melewati proses validasi.') ?>
</div>

<h3><?= e('Ringkasan Pendaftaran') ?></h3>

<div class="summary">

    <p>
        <strong><?= e('Program Studi') ?>:</strong>
        <?= e($hasil['program_studi']) ?>
    </p>

    <p>
        <strong><?= e('Kegiatan') ?>:</strong>
        <?= e($hasil['kegiatan']) ?>
    </p>

    <p>
        <strong><?= e('Jumlah Peserta') ?>:</strong>
        <?= e($hasil['jumlah_peserta']) ?>
    </p>

</div>

<br>

<a href="index.php">
    <?= e('Kembali ke Form') ?>
</a>

<?php

require_once __DIR__ . '/components/footer.php';

?>
