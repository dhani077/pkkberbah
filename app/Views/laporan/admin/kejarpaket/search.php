<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-2">
        <center>Kejar Paket</center>
    </h5>
    <div class="row">
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
    <div class="table-responsive pt-2">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col" rowspan="2">No</th>
                    <th scope="col" rowspan="2">Nama Kejar Paket/KF/PAUD</th>
                    <th scope="col" rowspan="2">Jenis Paket<br>(A/B/C/KF/PAUD)</th>
                    <th scope="col" colspan="2">Jumlah Warga<br>Belajar/Siswa</th>
                    <th scope="col" colspan="2">Jumlah Pengajar</th>
                    <th scope="col" rowspan="2">Aksi</th>
                </tr>
                <tr>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($kejarpaket as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['nama_paket']; ?></td>
                        <td><?= $k['jns_paket']; ?></td>
                        <td><?= $k['jml_wrg_bljr_L']; ?></td>
                        <td><?= $k['jml_wrg_bljr_P']; ?></td>
                        <td><?= $k['jml_pengajar_L']; ?></td>
                        <td><?= $k['jml_pengajar_P']; ?></td>
                        <td>
                            <a href="/kejarpaket/edit/<?= $k['no']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/kejarpaket/<?= $k['no']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>