<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-3">POSYANDU</h5>
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
    <p class="mt-2">Daftar nama-nama posyandu :</p>
    <table>
        <tbody>
            <?php foreach ($posyandu as $k) : ?>
                <tr>
                    <td style="width: 150px;"><?= $k['nama_posyandu']; ?></td>
                    <td>
                        <a href="/posyandu/posyandulaporan/<?= $k['kd_posyandu']; ?>" class="btn-sm btn-success">Lihat detail</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br><br>
    <a href="/posyandu/indexlaporan" class="btn btn-danger">Kembali ke daftar desa/kelurahan</a>
</div>
<?= $this->endSection(); ?>