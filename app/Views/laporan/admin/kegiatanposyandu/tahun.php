<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-3">Kegiatan Posyandu</h5>
    <a href="/kegiatanposyandu/create/<?= $kdposyandu; ?>" class="btn btn-primary">Tambah Data Kegiatan Posyandu</a>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashData('pesan'); ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('hapus')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashData('hapus'); ?>
        </div>
    <?php endif; ?>
    <div class="pt-2">
        <table>
            <tr>
                <th>Tahun</th>
            </tr>
        </table>
    </div>
    <form action="/kegiatanposyandu/detail/<?= $kdposyandu; ?>" method="post" enctype="multipart/form-data">
        <div class="col">
            <div class="form-group row">
                <select id="tahun" name="tahun">
                    <?php foreach ($kegiatanA as $k) : ?>
                        <option value="<?= $k['tahun']; ?>"><?= $k['tahun']; ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="btn btn-success">Lihat</button>
            </div>
        </div>
    </form>
    <br><br>
    <a href="/posyandu/pengunjunglayanan/<?= $kdposyandu; ?>" class="btn btn-outline-danger">Kembali ke detail posyandu <?= $posyandu['nama_posyandu']; ?></a>
</div>

<?= $this->endSection(); ?>