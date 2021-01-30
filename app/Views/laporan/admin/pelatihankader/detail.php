<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <div class="row mb-5">
        <div class="col">
            <table>
                <tr>
                    <th>Kelurahan</th>
                    <th></th>
                    <th>:</th>
                    <th><?= $kelurahan; ?></th>
                </tr>
                <tr>
                    <th>Kab/Kota</th>
                    <th></th>
                    <th>:</th>
                    <th><?= $kabupaten; ?></th>
                </tr>
            </table>
        </div>
        <div class="col">
            <table>
                <tr>
                    <th>Kecamatan</th>
                    <th></th>
                    <th>:</th>
                    <th><?= $kecamatan; ?></th>
                </tr>
                <tr>
                    <th>Provinsi</th>
                    <th></th>
                    <th>:</th>
                    <th><?= $provinsi; ?></th>
                </tr>
            </table>
        </div>
    </div>
    <?php if (session()->getFlashdata('gagal')) : ?>
        <div class="alert alert-warning" role="alert">
            <?= session()->getFlashData('gagal'); ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('hapus')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashData('hapus'); ?>
        </div>
    <?php endif; ?>
    <p class="mt-2"><b>Daftar nama-nama kader :</b></p>
    <table>
        <tbody>
            <?php foreach ($pelatihan as $k) : ?>
                <tr>
                    <td style="width: 150px;"><?= $k['nama']; ?></td>
                    <td>
                        <a href="/pelatihankader/datapelatihan/<?= $k['no_reg']; ?>" class="btn-sm btn-success">Detail pelatihan yang diikuti</a>
                    </td>
                </tr>
                <tr>
                    <td><br></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br><br>
    <a href="/pelatihankader/index" class="btn btn-outline-danger">Kembali ke daftar desa/kelurahan</a>
</div>

<?= $this->endSection(); ?>