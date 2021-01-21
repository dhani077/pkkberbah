<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <div class="row">
        <div class="col">
            <h5 class="mb-3">
                <center>POSYANDU</center>
            </h5>
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
    <a href="/posyandu/create/<?= $kdwilayah; ?>" class="btn btn-primary mt-3">Tambah Daftar Posyandu</a>
    <p class="mt-2">Daftar nama-nama posyandu :</p>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashData('pesan'); ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('gagal')) : ?>
        <div class="alert alert-warning" role="alert">
            <?= session()->getFlashData('gagal'); ?>
        </div>
    <?php endif; ?>
    <table>
        <tbody>
            <?php foreach ($posyandu as $k) : ?>
                <tr>
                    <td style="width: 150px;"><?= $k['nama_posyandu']; ?></td>
                    <td>
                        <a href="/posyandu/pengunjunglayanan/<?= $k['kd_posyandu']; ?>" class="btn-sm btn-success">Detail</a>
                        <a href="/posyandu/edit/<?= $k['kd_posyandu']; ?>" class="btn-sm btn-warning">Edit</a>
                        <form action="/posyandu/<?= $k['kd_posyandu']; ?>" method="post" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn-sm btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br><br>
    <a href="/posyandu/index" class="btn btn-outline-danger">Kembali ke daftar desa/kelurahan</a>
</div>
<?= $this->endSection(); ?>