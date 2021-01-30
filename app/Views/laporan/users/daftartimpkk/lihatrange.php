<?= $this->extend('layout/users/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5>
        <center>Daftar Angggota Tim Penggerak PKK</center>
    </h5>
    <div class="table-responsive">
        <table>
            <tr>
                <th>Kecamatan</th>
                <th></th>
                <th>:</th>
                <th><?= $kecamatan; ?></th>
            </tr>
            <tr>
                <th>Kab/Kota</th>
                <th></th>
                <th>:</th>
                <th><?= $kabupaten; ?></th>
            </tr>
            <tr>
                <th>Provinsi</th>
                <th></th>
                <th>:</th>
                <th><?= $provinsi; ?></th>
            </tr>
            <tr>
                <th>Tahun</th>
                <th></th>
                <th>:</th>
                <th><?= $tahun1; ?>/<?= $tahun2; ?></th>
            </tr>
        </table>
    </div>
    <div class="table-responsive pt-2">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">TANGGAL MASUK</th>
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
                        <td><?= $k['tgl_masuk']; ?></td>
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
    <br><br>
    <a href="/users/rangedaftartimpkk/<?= $kdwilayah; ?>" class="btn btn-danger">Kembali</a>
</div>
<?= $this->endSection(); ?>