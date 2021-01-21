<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5>Koperasi</h5>
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
            <a href="/koperasi/create/<?= $kdwilayah; ?>" class="btn btn-primary">Tambah Data Koperasi</a>
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
                    <th scope="col" rowspan="2">NAMA KOPERASI</th>
                    <th scope="col" rowspan="2">JENIS KOPERASI</th>
                    <th scope="col" colspan="2">STATUS HUKUM</th>
                    <th scope="col" colspan="2">JUMLAH ANGGOTA</th>
                    <th scope="col" rowspan="2">AKSI</th>
                </tr>
                <tr>
                    <th scope="col">BERBADAN HUKUM</th>
                    <th scope="col">BELUM BERBADAN HUKUM</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($koperasi as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['nama_koperasi']; ?></td>
                        <td><?= $k['jns_koperasi']; ?></td>
                        <td><?= $k['status_hkm_yes']; ?></td>
                        <td><?= $k['status_hkm_non']; ?></td>
                        <td><?= $k['jml_anggota_L']; ?></td>
                        <td><?= $k['jml_anggota_P']; ?></td>
                        <td>
                            <a href="/koperasi/edit/<?= $k['no']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/koperasi/<?= $k['no']; ?>" method="post" class="d-inline">
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
        <a href="/koperasi/index" class="btn btn-outline-danger">Kembali ke daftar desa/kelurahan</a>
    </div>
</div>

<?= $this->endSection(); ?>