<?php if (session('nama')) : ?>
    <?= $this->extend('layout/admin/template'); ?>
<?php endif; ?>
<?php if (empty(session('nama'))) : ?>
    <?= $this->extend('layout/users/template'); ?>
<?php endif; ?>

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
    <hr>
    <table class="mt-5">
        <?php foreach ($tamanbacaan as $t) : ?>
            <tr>
                <td>Nama Taman Bacaan/Perpustakaan</td>
                <td> : </td>
                <td><?= $t['nama_taman']; ?></td>
            </tr>
            <tr>
                <td>Pengelola</td>
                <td> : </td>
                <td><?= $t['pengelola']; ?></td>
            </tr>
            <tr>
                <td>Jumlah Buku</td>
                <td> : </td>
                <td><?= $t['jml_buku']; ?></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td>
                    <?php if (session('nama')) : ?>
                        <a href="/tamanbacaan/rangejenisbuku/<?= $t['kd_taman']; ?>" class="btn btn-success">Detail</a>
                    <?php endif; ?>
                    <?php if (empty(session('nama'))) : ?>
                        <a href="/users/rangejenisbuku/<?= $t['kd_taman']; ?>" class="btn btn-success">Detail</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<?= $this->endSection(); ?>