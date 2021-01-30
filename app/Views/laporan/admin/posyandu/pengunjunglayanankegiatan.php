<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mt-2">Detail Posyandu <?= $posyandu['nama_posyandu']; ?></h5>
</div>
<div class="row">
    <div class="col pt-5">
        <a class="btn pl-3" href="/pengunjungposyandu/tahun/<?= $posyandu['kd_posyandu']; ?>">
            <img src="/img/catatandatakegiatan.png" width="100" height="100"><br>Jumlah Pengunjung /<br> Jumlah Petugas Posyandu /<br> Jumlah Bayi Lahir/Meninggal
        </a>
    </div>
    <div class="col pt-5">
        <a class="btn" href="/posyandu/jenislayanan/<?= $posyandu['kd_posyandu']; ?>">
            <img src="/img/pengunjungposyandu.png" width="100" height="100"><br>Jenis Kegiatan/<br>Layanan
        </a>
    </div>
    <div class="col pt-5">
        <a class="btn" href="/kegiatanposyandu/tahun/<?= $posyandu['kd_posyandu']; ?>">
            <img src="/img/pelatihankader.png" width="100" height="100"><br>Data Kegiatan Posyandu
        </a>
    </div>
</div>
<br><br><br><br><br><br>
<a href="/posyandu/detail/<?= $kdwilayah; ?>" class="btn btn-outline-danger">Kembali ke daftar posyandu</a>

<?= $this->endsection(); ?>