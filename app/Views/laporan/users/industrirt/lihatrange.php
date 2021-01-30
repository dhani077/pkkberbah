<?= $this->extend('layout/users/template'); ?>

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
    <a href="/users/rangeindustrirt" class="btn btn-danger">Kembali</a>

</div>
<?= $this->endSection(); ?>