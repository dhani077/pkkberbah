<?php if (session('nama')) : ?>
    <?= $this->extend('layout/admin/template'); ?>
<?php endif; ?>
<?php if (empty(session('nama'))) : ?>
    <?= $this->extend('layout/users/template'); ?>
<?php endif; ?>
<?= $this->section('content'); ?>
<div class="col">
    <h5>
        <center>Industri Rumah Tangga</center>
    </h5>
    <div class="table-responsive mt-2">
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
</div>

<?= $this->endsection(); ?>