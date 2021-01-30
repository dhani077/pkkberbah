<?= $this->extend('layout/users/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
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
    <br>
    <p class="mt-2">Daftar nama-nama taman bacaan/perpustakaan :</p>
    <table>
        <tbody>
            <?php foreach ($taman as $k) : ?>
                <tr>
                    <td style="width: 150px;"><?= $k['nama_taman']; ?></td>
                    <td>
                        <a href="/users/rangejenisbuku/<?= $k['kd_taman']; ?>" class="btn-sm btn-success">Detail taman bacaan/perpustakaan</a>
                    </td>
                </tr>
                <tr>
                    <td><br></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br><br>
    <a href="/users/wilayahtamanbacaan" class="btn btn-danger">Kembali ke daftar wilayah</a>
</div>

<?= $this->endSection(); ?>