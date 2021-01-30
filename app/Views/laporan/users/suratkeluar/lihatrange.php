<?= $this->extend('layout/users/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <center>
        <h5>Surat Masuk</h5>
    </center>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">NOMOR DAN KODE SURAT</th>
                    <th scope="col">TANGGAL SURAT</th>
                    <th scope="col">KEPADA</th>
                    <th scope="col">PERIHAL</th>
                    <th scope="col">LAMPIRAN</th>
                    <th scope="col">TEMBUSAN</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($suratkeluar as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['no_surat']; ?></td>
                        <td><?= $k['tgl_surat']; ?></td>
                        <td><?= $k['kepada']; ?></td>
                        <td><?= $k['perihal']; ?></td>
                        <td><?= $k['lampiran']; ?></td>
                        <td><?= $k['tembusan']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br><br>
    <a href="/users/rangesuratkeluar" class="btn btn-danger">Kembali</a>
</div>
<?= $this->endSection(); ?>