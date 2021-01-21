<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <center>
        <h5 class="mb-3">
            Jumlah Pengunjung / Jumlah Petugas Posyandu / <br>Jumlah Bayi Lahir/Meninggal
        </h5>
        <div class="table-responsive">
            <table>
                <tr>
                    <th>Nama posyandu</th>
                    <th></th>
                    <th> : </th>
                    <th><?= $namapos; ?></th>
                </tr>
                <tr>
                    <th>Desa/Keluarhan</th>
                    <th></th>
                    <th> : </th>
                    <th><?= $wilayah['kelurahan']; ?></th>
                </tr>
                <tr>
                    <th>Kecamatan</th>
                    <th></th>
                    <th> : </th>
                    <th><?= $wilayah['kecamatan']; ?></th>
                </tr>
            </table>
        </div>
    </center>
    <div class="col pt-5"></div>
    <a href="/pengunjungposyandu/create/<?= $kdposyandu; ?>" class="btn btn-primary">Tambah Data Pengunjung Posyandu</a>
    <p>Daftar tahun</p>
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
    <form action="/pengunjungposyandu/detail/<?= $kdposyandu; ?>" method="post" enctype="multipart/form-data">
        <div class="col">
            <div class="form-group row">
                <select id="tahun" name="tahun">
                    <?php foreach ($tahun as $t) : ?>
                        <option value="<?= $t['tahun']; ?>"><?= $t['tahun']; ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="btn btn-success">Lihat</button>
            </div>
        </div>
    </form>
    <br><br>
    <a href="/posyandu/pengunjunglayanan/<?= $kdposyandu; ?>" class="btn btn-outline-danger">Kembali ke detail posyandu <?= $namapos; ?></a>
</div>

<?= $this->endSection(); ?>