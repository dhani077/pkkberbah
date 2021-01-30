<?= $this->extend('layout/users/template'); ?>

<?= $this->section('content'); ?>
<h4>Kegiatan Posyandu</h4>
<table class="table">
    <?php foreach ($kegiatanposyandu as $k) : ?>
        <tr>
            <p>Bulan <?= $k['bulan']; ?> tahun <?= $k['tahun']; ?></p>
        </tr>
        <tr>
            <a href="/img/<?= $k['foto']; ?>">
                <img src="/img/<?= $k['foto']; ?>" width="700px">
            </a>
        </tr>
        <tr>
            <td><?= $k['Keterangan']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?= $this->endSection(); ?>