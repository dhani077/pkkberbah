<?= $this->extend('layout/users/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mt-2">Detail Posyandu <?= $posyandu['nama_posyandu']; ?></h5>
</div>
<div class="row">
    <div class="col pt-5">
        <a class="btn pl-3" href="/users/rangepengunjungposyandu/<?= $posyandu['kd_posyandu']; ?>">
            <img src="/img/catatandatakegiatan.png" width="100" height="100"><br>Jumlah Pengunjung /<br> Jumlah Petugas Posyandu /<br> Jumlah Bayi Lahir/Meninggal
        </a>
    </div>
    <div class="col pt-5">
        <a class="btn" href="/users/layananlaporanposyandu/<?= $posyandu['kd_posyandu']; ?>">
            <img src="/img/pengunjungposyandu.png" width="100" height="100"><br>Jenis Kegiatan/<br>Layanan
        </a>
    </div>
    <div class="col pt-5">
        <a class="btn" href="/users/rangekegiatanposyandu/<?= $posyandu['kd_posyandu']; ?>">
            <img src="/img/pelatihankader.png" width="100" height="100"><br>Data Kegiatan Posyandu
        </a>
    </div>
</div>
<br><br><br><br><br><br>
<a href="/users/detaillaporanposyandu/<?= $kdwilayah; ?>" class="btn btn-danger">Kembali ke daftar posyandu</a>

<?= $this->endsection(); ?>