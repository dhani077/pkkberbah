<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5>TAMAN BACAAN</h5>
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
    <table>
        <tr>
            <td><b>Nama Taman Bacaan/Perpustakaan</b></td>
            <th></th>
            <th>:</th>
            <td><b><?= $taman['nama_taman']; ?></b></td>
        </tr>
        <tr>
            <td><b>Nama Pengelola</b></td>
            <th></th>
            <th>:</th>
            <td><b><?= $taman['pengelola']; ?></b></td>
        </tr>
        <tr>
            <td><b>Jumlah Buku Bacaan</b></td>
            <th></th>
            <th>:</th>
            <td><b><?= $taman['jml_buku']; ?> buku</b></td>
        </tr>
        <tr>
            <td><b>Jenis Buku Bacaan</b></td>
            <th></th>
            <th>:</th>
        </tr>
    </table>
    <div class="row">
        <div class="col-md">
            <a href="/tamanbacaan/createbuku/<?= $kdtaman; ?>" class="btn btn-primary">Tambah Jenis Buku</a>
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
        <table class="table table-striped" border="0">
            <thead>
                <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">JENIS BUKU</th>
                    <th scope="col">KATEGORI</th>
                    <th scope="col">JUMLAH</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($buku as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['jns_buku']; ?></td>
                        <td><?= $k['kategori']; ?></td>
                        <td><?= $k['jumlah']; ?></td>
                        <td>
                            <a href="/tamanbacaan/editbuku/<?= $k['no_buku']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/tamanbacaan/deletebuku/<?= $k['no_buku']; ?>" method="post" class="d-inline">
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
    <a href="/tamanbacaan/detail/<?= $kdwilayah; ?>" class="btn btn-outline-danger">Kembali ke daftar Taman Bacaan</a>
</div>
<?= $this->endsection(); ?>