<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <center>
        <h5>Industri Rumah Tangga</h5>
    </center>
    <div class="table-responsive pt-2">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">KATEGORI</th>
                    <th scope="col">KOMODITI</th>
                    <th scope="col">VOLUME</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($industrirt as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['kategori']; ?></td>
                        <td><?= $k['komoditi']; ?></td>
                        <td><?= $k['volume']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br><br>
    <form action="/industrirt/print" method="post" class="d-inline">
        <?= csrf_field(); ?>
        <input type="hidden" id="awal" name="awal" value="<?= $awal; ?>">
        <input type="hidden" id="akhir" name="akhir" value="<?= $akhir; ?>">
        <?php if ($industrirt) : ?>
            <button id="aksi" name="aksi" type="submit" class="btn btn-outline-secondary" value="print">Cetak</button>
        <?php endif; ?>
        <button id="aksi" name="aksi" type="submit" class="btn btn-danger" value="batal">Kembali</button>
    </form>

</div>
<?= $this->endSection(); ?>