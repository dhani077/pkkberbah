<?= $this->extend('layout/users/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
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
                <th>Pelatihan yang pernah diikuti:</th>
                <th></th>
                <th> : </th>
            </tr>
        </table>
    </div>
    <div class="table-responsive pt-2">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">NAMA PELATIHAN</th>
                    <th scope="col">KRITERIS KADER</th>
                    <th scope="col">TANGGAL</th>
                    <th scope="col">PENYELENGGARA</th>
                    <th scope="col">KETERANGAN</th>
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
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br><br>
    <form action="/users/lihatpelatihankader/<?= $kdwilayah; ?>" method="post" class="d-inline">
        <input type="hidden" name="awal" id="awal" value="<?= $awal; ?>">
        <input type="hidden" name="akhir" id="akhir" value="<?= $akhir; ?>">
        <button class="btn btn-danger" id="aksi" name="aksi" value="lihat">Kembali</button>
    </form>
</div>
<?= $this->endSection(); ?>