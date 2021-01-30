<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <div class="row mb-5">
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
    <p class="mt-2"><b>Daftar nama-nama kader :</b></p>
    <div class="table-responsive pt-2">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">TANGGAL MASUK</th>
                    <th scope="col">FUNGSI</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($pelatihan as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['nama']; ?></td>
                        <td><?= $k['tgl_masuk']; ?></td>
                        <td><?= $k['fungsi_anggota']; ?></td>
                        <td>
                            <form action="/pelatihankader/detailrange/<?= $k['no_reg']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" id="awal" name="awal" value="<?= $awal; ?>">
                                <input type="hidden" id="akhir" name="akhir" value="<?= $akhir; ?>">
                                <?php if ($pelatihan) : ?>
                                    <button id="aksi" name="aksi" type="submit" class="btn-sm btn-success" value="print">Detail pelatihan yang diikuti</button>
                                <?php endif; ?>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br><br>
    <a href="/pelatihankader/range/<?= $kdwilayah; ?>" class="btn btn-danger">Kembali</a>`
</div>
<?= $this->endSection(); ?>