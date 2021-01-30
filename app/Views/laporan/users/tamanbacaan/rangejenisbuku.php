<?= $this->extend('layout/users/template'); ?>

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
    <div class="table-responsive pt-2">
        <table class="table table-striped" border="0">
            <thead>
                <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">JENIS BUKU</th>
                    <th scope="col">KATEGORI</th>
                    <th scope="col">JUMLAH</th>
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
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br><br>
    <br><br>
    <a href="/users/detailtamanbacaan/<?= $kdwilayah; ?>" class="btn btn-danger">Kembali</a>
</div>
<?= $this->endsection(); ?>