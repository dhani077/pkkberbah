<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-2">Kejar Paket</h5>
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
    <div class="row pt-2">
        <div class="col-md">
            <a href="/kejarpaket/create/<?= $kdwilayah; ?>" class="btn btn-primary">Tambah Data Kejar Paket</a>
        </div>
    </div>
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
    <div class="table-responsive pt-2">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col" rowspan="2">NO.</th>
                    <th scope="col" rowspan="2">NAMA KEJAR PAKET/KF/PAUD</th>
                    <th scope="col" rowspan="2">JENIS PAKET<br>(A/B/C/KF/PAUD)</th>
                    <th scope="col" rowspan="2">TANGGAL MULAI</th>
                    <th scope="col" colspan="2">JUMLAH WARGA<br>BELAJAR/SISWA</th>
                    <th scope="col" colspan="2">JUMLAH PENGAJAR</th>
                    <th scope="col" rowspan="2">AKSI</th>
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
                        <td><?= $k['tgl_mulai']; ?></td>
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
        <br><br>
        <a href="/kejarpaket/index" class="btn btn-outline-danger">Kembali ke daftar desa/kelurahan</a>
    </div>
</div>

<?= $this->endSection(); ?>