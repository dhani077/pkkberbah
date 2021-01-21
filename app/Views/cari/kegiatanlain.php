<?php if (session('nama')) : ?>
    <?= $this->extend('layout/admin/template'); ?>
<?php endif; ?>
<?php if (empty(session('nama'))) : ?>
    <?= $this->extend('layout/users/template'); ?>
<?php endif; ?>
<?= $this->section('content'); ?>
<div class="col mt-3">
    <div class="card mb-3" style="max-width: 900px;">
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="card-body">
                    <?php foreach ($kegiatanlain as $kl) : ?>
                        <h5 class="card-title"><?= $kl['nama_kegiatan']; ?></h5>
                        <img src="/img/<?= $kl['foto']; ?>" width="700px">
                        <p class="card-text"><b>Tempat pelaksanaan : </b><?= $kl['tempat_pelaksanaan']; ?></p>
                        <p class="card-text"><?= $kl['keterangan']; ?></small>
                        </p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>