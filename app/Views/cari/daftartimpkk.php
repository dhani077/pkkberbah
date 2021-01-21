<?php if (session('nama')) : ?>
    <?= $this->extend('layout/admin/template'); ?>
<?php endif; ?>
<?php if (empty(session('nama'))) : ?>
    <?= $this->extend('layout/users/template'); ?>
<?php endif; ?>
<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-2">
        <center>Daftar Angggota Tim Penggerak PKK</center>
    </h5>
    <div class="row">
        <div class="col-sm-7 pt-2">
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
    <div class="table-responsive pt-2">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">JABATAN</th>
                    <th scope="col">JENIS<br>KELAMIN</th>
                    <th scope="col">TEMPAT LAHIR</th>
                    <th scope="col">TANGGAL/BULAN<br>/TH.LAHIR/UMUR</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">ALAMAT</th>
                    <th scope="col">PENDIDIKAN</th>
                    <th scope="col">PEKERJAAN</th>
                    <th scope="col">KETERANGAN</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($daftartimpkk as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['nama']; ?></td>
                        <td><?= $k['jabatan']; ?></td>
                        <td><?= $k['jk']; ?></td>
                        <td><?= $k['tempat_lahir']; ?></td>
                        <td><?= $k['tgl_lahir']; ?></td>
                        <td><?= $k['status']; ?></td>
                        <td><?= $k['alamat']; ?></td>
                        <td><?= $k['pendidikan']; ?></td>
                        <td><?= $k['pekerjaan']; ?></td>
                        <td><?= $k['keterangan']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endsection(); ?>