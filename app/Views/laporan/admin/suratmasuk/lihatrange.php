<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <center>
        <h5>Surat Masuk</h5>
    </center>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col" rowspan="2">NO.</th>
                    <th scope="col" colspan="2">TANGGAL</th>
                    <th scope="col" rowspan="2">NOMOR SURAT</th>
                    <th scope="col" rowspan="2">ASAL SURAT DARI</th>
                    <th scope="col" rowspan="2">PERIHAL</th>
                    <th scope="col" rowspan="2">LAMPIRAN</th>
                    <th scope="col" rowspan="2">DITERUSKAN KEPADA</th>
                </tr>
                <tr>
                    <th scope="col">TERIMA SURAT</th>
                    <th scope="col">SURAT</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($suratmasuk as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['tgl_terima']; ?></td>
                        <td><?= $k['tgl_surat']; ?></td>
                        <td><?= $k['no_surat']; ?></td>
                        <td><?= $k['asal_surat']; ?></td>
                        <td><?= $k['perihal']; ?></td>
                        <td><?= $k['lampiran']; ?></td>
                        <td><?= $k['teruskan_kpd']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br><br>
    <form action="/suratmasuk/print" method="post" class="d-inline">
        <?= csrf_field(); ?>
        <input type="hidden" id="awal" name="awal" value="<?= $awal; ?>">
        <input type="hidden" id="akhir" name="akhir" value="<?= $akhir; ?>">
        <?php if ($suratmasuk) : ?>
            <button id="aksi" name="aksi" type="submit" class="btn btn-outline-secondary" value="print">Cetak</button>
        <?php endif; ?>
        <button id="aksi" name="aksi" type="submit" class="btn btn-danger" value="batal">Kembali</button>
    </form>

</div>
<?= $this->endSection(); ?>