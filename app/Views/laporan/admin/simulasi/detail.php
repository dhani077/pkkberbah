<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5>
        <center>Kelompok Simulasi Dan Penyuluhan</center>
    </h5>
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
    <div class="row">
        <div class="col-md">
            <a href="/simulasi/create/<?= $kdwilayah; ?>" class="btn btn-primary">Tambah Data Simulasi Dan Penyuluhan</a>
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
                    <th scope="col" rowspan="2">NAMA KEGIATAN</th>
                    <th scope="col" rowspan="2">JENIS SIMULASI/PENYULUHAN</th>
                    <th scope="col" colspan="2">JUMLAH</th>
                    <th scope="col" colspan="2">JUMLAH KADER</th>
                    <th scope="col" rowspan="2">AKSI</th>
                </tr>
                <tr>
                    <th scope="col">KELOMPOK</th>
                    <th scope="col">SOSIALISASI</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($simulasi as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['nama_kegiatan']; ?></td>
                        <td><?= $k['jns_simulasi']; ?></td>
                        <td><?= $k['jml_klp']; ?></td>
                        <td><?= $k['jml_sosialisasi']; ?></td>
                        <td><?= $k['jml_kader_L']; ?></td>
                        <td><?= $k['jml_kader_P']; ?></td>
                        <td>
                            <a href="/simulasi/edit/<?= $k['no']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/simulasi/<?= $k['no']; ?>" method="post" class="d-inline">
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
        <a href="/simulasi/index" class="btn btn-outline-danger">Kembali ke daftar desa/kelurahan</a>
    </div>
</div>

<?= $this->endSection(); ?>