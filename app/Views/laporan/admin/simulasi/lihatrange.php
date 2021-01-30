<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5>
        <center>Kelompok Simulasi Dan Penyuluhan</center>
    </h5>
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
    <div class="table-responsive pt-2">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col" rowspan="2">NO.</th>
                    <th scope="col" rowspan="2">NAMA KEGIATAN</th>
                    <th scope="col" rowspan="2">JENIS SIMULASI/PENYULUHAN</th>
                    <th scope="col" rowspan="2">TANGGAL PELAKSANAAN</th>
                    <th scope="col" colspan="2">JUMLAH</th>
                    <th scope="col" colspan="2">JUMLAH KADER</th>
                </tr>
                <tr>
                    <th scope="col">KELOMPOK</th>
                    <th scope="col">SOSIALISASI</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($simulasi as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['nama_kegiatan']; ?></td>
                        <td><?= $k['jns_simulasi']; ?></td>
                        <td><?= $k['tanggal']; ?></td>
                        <td><?= $k['jml_klp']; ?></td>
                        <td><?= $k['jml_sosialisasi']; ?></td>
                        <td><?= $k['jml_kader_L']; ?></td>
                        <td><?= $k['jml_kader_P']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br><br>
    <form action="/simulasi/print/<?= $kdwilayah; ?>" method="post" class="d-inline">
        <?= csrf_field(); ?>
        <input type="hidden" id="awal" name="awal" value="<?= $awal; ?>">
        <input type="hidden" id="akhir" name="akhir" value="<?= $akhir; ?>">
        <?php if ($simulasi) : ?>
            <button id="aksi" name="aksi" type="submit" class="btn btn-outline-secondary" value="print">Cetak</button>
        <?php endif; ?>
        <button id="aksi" name="aksi" type="submit" class="btn btn-danger" value="batal">Kembali</button>
    </form>
</div>
<?= $this->endSection(); ?>