<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-3">
        <center>DATA PELATIHAN KADER</center>
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
    <hr />
    <div class="table-responsive">
        <table>
            <tr>
                <th>Nomor Registrasi</th>
                <th></th>
                <th> : </th>
                <th><?= $pelatihan['no_reg']; ?></th>
            </tr>
            <tr>
                <th>Nama</th>
                <th></th>
                <th> : </th>
                <th><?= $pelatihan['nama']; ?></th>
            </tr>
            <tr>
                <th>Tanggal Masuk/ Sejak Tahun</th>
                <th></th>
                <th> : </th>
                <th><?= $pelatihan['tgl_masuk']; ?></th>
            </tr>
            <tr>
                <th>Kedudukan/Fungsi</th>
                <th></th>
                <th> : </th>
                <th><?= $pelatihan['fungsi_anggota']; ?></th>
            </tr>
            <tr>
                <th>Pelatihan yang pernah diikuti</th>
                <th></th>
                <th> : </th>
            </tr>
        </table>
    </div>
    <div class="row">
        <div class="col-md">
            <a href="/pelatihankader/createpelatihan/<?= $noreg; ?>" class="btn btn-primary">Tambah Pelatihan</a>
        </div>
        <!-- </?php if ($datapelatihan) : ?>
            <div class="col-md">
                <a class="btn btn-outline-secondary shadow float-right" href="/PelatihankaderCon/print/<?= $noreg; ?>">Print
                </a>
            </div>
        </?php endif; ?> -->
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
                    <th scope="col">NO.</th>
                    <th scope="col">NAMA PELATIHAN</th>
                    <th scope="col">KRITERIA KADER</th>
                    <th scope="col">TANGGAL</th>
                    <th scope="col">PENYELENGGARA</th>
                    <th scope="col">KETERANGAN</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($datapelatihan as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['nama_pelatihan']; ?></td>
                        <td><?= $k['kriteria_kader']; ?></td>
                        <td><?= $k['tanggal']; ?></td>
                        <td><?= $k['penyelenggara']; ?></td>
                        <td><?= $k['keterangan']; ?></td>
                        <td>
                            <a href="/pelatihankader/editdatapelatihan/<?= $k['no']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/pelatihankader/deletedatapelatihan/<?= $k['no']; ?>" method="post" class="d-inline">
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
    <br><br>
    <a href="/PelatihankaderCon/detail/<?= $kdwilayah; ?>" class="btn btn-outline-danger">Kembali ke daftar nama kader</a>
</div>
<?= $this->endsection(); ?>