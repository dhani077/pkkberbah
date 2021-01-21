<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <div class="row">
        <div class="col pt-3">
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
        <div class="col pt-3">
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
    <a href="/tamanbacaan/create/<?= $kdwilayah; ?>" class="btn btn-primary mt-3">Tambah Daftar Taman Bacaan</a>
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
    <?php if (session()->getFlashdata('gagal')) : ?>
        <div class="alert alert-warning" role="alert">
            <?= session()->getFlashData('gagal'); ?>
        </div>
    <?php endif; ?>
    <p class="mt-2">Daftar nama-nama taman bacaan :</p>
    <table>
        <tbody>
            <?php foreach ($taman as $k) : ?>
                <tr>
                    <td style="width: 150px;"><?= $k['nama_taman']; ?></td>
                    <td>
                        <a href="/tamanbacaan/jenisbuku/<?= $k['kd_taman']; ?>" class="btn-sm btn-success">Detail</a>
                        <a href="/tamanbacaan/edit/<?= $k['kd_taman']; ?>" class="btn-sm btn-warning">Edit</a>
                        <form action="/tamanbacaan/<?= $k['kd_taman']; ?>" method="post" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn-sm btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br><br>
    <a href="/tamanbacaan/index" class="btn btn-outline-danger">Kembali ke daftar wilayah</a>
</div>

<?= $this->endSection(); ?>