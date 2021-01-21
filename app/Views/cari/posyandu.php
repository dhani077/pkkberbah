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
        <?php foreach ($posyandu as $k) : ?>
            <tr>
                <td>Nama Posyandu</td>
                <td> : </td>
                <td><?= $k['nama_posyandu']; ?></td>
            </tr>
            <tr>
                <td>Pengelola</td>
                <td> : </td>
                <td><?= $k['pengelola']; ?></td>
            </tr>
            <tr>
                <td>Sekretaris</td>
                <td> : </td>
                <td><?= $k['sekretaris']; ?></td>
            </tr>
            <tr>
                <td>Jenis posyandu</td>
                <td> : </td>
                <td><?= $k['jns_posyandu']; ?></td>
            </tr>
            <tr>
                <td>Jumlah kader</td>
                <td> : </td>
                <td><?= $k['jml_kader']; ?></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td>
                    <?php if (session('nama')) : ?>
                        <a href="/posyandu/posyandulaporan/<?= $k['kd_posyandu']; ?>" class="btn btn-success">Detail</a>
                    <?php endif; ?>
                    <?php if (empty(session('nama'))) : ?>
                        <a href="/users/posyandulaporan/<?= $k['kd_posyandu']; ?>" class="btn btn-success">Detail</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<?= $this->endSection(); ?>