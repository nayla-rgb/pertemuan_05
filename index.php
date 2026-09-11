<?php

session_start();

require_once __DIR__ . '/functions.php';

$title = 'Form Pendaftaran Kegiatan';

// Mengambil nilai lama dari session
$old = $_SESSION['old'] ?? [];
$errors = $_SESSION['errors'] ?? [];

// Hapus session setelah digunakan
unset($_SESSION['old'], $_SESSION['errors']);

require_once __DIR__ . '/components/header.php';

?>

<h2><?= e('Form Pendaftaran Kegiatan') ?></h2>

<p>
    <?= e('Silakan isi data berikut dengan lengkap dan benar.') ?>
</p>

<form action="proses.php" method="post">

    <!-- Nama -->
    <div class="form-group">
        <label for="nama"><?= e('Nama') ?></label>

        <input
            type="text"
            id="nama"
            name="nama"
            value="<?= e($old['nama'] ?? '') ?>"
        >

        <?php if (isset($errors['nama'])): ?>
            <div class="error">
                <?= e($errors['nama']) ?>
            </div>
        <?php endif; ?>
    </div>


    <!-- NIM -->
    <div class="form-group">
        <label for="nim"><?= e('NIM') ?></label>

        <input
            type="text"
            id="nim"
            name="nim"
            value="<?= e($old['nim'] ?? '') ?>"
        >

        <?php if (isset($errors['nim'])): ?>
            <div class="error">
                <?= e($errors['nim']) ?>
            </div>
        <?php endif; ?>
    </div>


    <!-- Email -->
    <div class="form-group">
        <label for="email"><?= e('Email') ?></label>

        <input
            type="email"
            id="email"
            name="email"
            value="<?= e($old['email'] ?? '') ?>"
        >

        <?php if (isset($errors['email'])): ?>
            <div class="error">
                <?= e($errors['email']) ?>
            </div>
        <?php endif; ?>
    </div>


    <!-- Program Studi -->
    <div class="form-group">
        <label for="program_studi">
            <?= e('Program Studi') ?>
        </label>

        <select id="program_studi" name="program_studi">
            <option value="">
                <?= e('-- Pilih Program Studi --') ?>
            </option>

            <?php foreach (daftarProgramStudi() as $prodi): ?>
                <option
                    value="<?= e($prodi) ?>"
                    <?= ($old['program_studi'] ?? '') === $prodi ? 'selected' : '' ?>
                >
                    <?= e($prodi) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <?php if (isset($errors['program_studi'])): ?>
            <div class="error">
                <?= e($errors['program_studi']) ?>
            </div>
        <?php endif; ?>
    </div>


    <!-- Kegiatan -->
    <div class="form-group">
        <label for="kegiatan">
            <?= e('Kegiatan') ?>
        </label>

        <select id="kegiatan" name="kegiatan">
            <option value="">
                <?= e('-- Pilih Kegiatan --') ?>
            </option>

            <?php foreach (daftarKegiatan() as $item): ?>
                <option
                    value="<?= e($item) ?>"
                    <?= ($old['kegiatan'] ?? '') === $item ? 'selected' : '' ?>
                >
                    <?= e($item) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <?php if (isset($errors['kegiatan'])): ?>
            <div class="error">
                <?= e($errors['kegiatan']) ?>
            </div>
        <?php endif; ?>
    </div>


    <!-- Jumlah Peserta -->
    <div class="form-group">
        <label for="jumlah_peserta">
            <?= e('Jumlah Peserta') ?>
        </label>

        <select id="jumlah_peserta" name="jumlah_peserta">
            <option value="">
                <?= e('-- Pilih Jumlah --') ?>
            </option>

            <?php foreach ([1, 2, 3] as $jumlah): ?>
                <option
                    value="<?= e($jumlah) ?>"
                    <?= ($old['jumlah_peserta'] ?? '') == $jumlah ? 'selected' : '' ?>
                >
                    <?= e($jumlah . ' peserta') ?>
                </option>
            <?php endforeach; ?>
        </select>

        <?php if (isset($errors['jumlah_peserta'])): ?>
            <div class="error">
                <?= e($errors['jumlah_peserta']) ?>
            </div>
        <?php endif; ?>
    </div>


    <!-- Persetujuan -->
    <div class="form-group">

        <div class="checkbox">
            <input
                type="checkbox"
                id="persetujuan"
                name="persetujuan"
                value="setuju"
                <?= ($old['persetujuan'] ?? '') === 'setuju' ? 'checked' : '' ?>
            >

            <label for="persetujuan">
                <?= e('Saya menyetujui data yang saya isi.') ?>
            </label>
        </div>

        <?php if (isset($errors['persetujuan'])): ?>
            <div class="error">
                <?= e($errors['persetujuan']) ?>
            </div>
        <?php endif; ?>

    </div>


    <button type="submit">
        <?= e('Kirim Formulir') ?>
    </button>

</form>

<?php

require_once __DIR__ . '/components/footer.php';

?>