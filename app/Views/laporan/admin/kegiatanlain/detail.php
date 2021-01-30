<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col mt-3">
    <div class="card mb-3" style="max-width: 900px;">
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="card-body">
                    <h5 class="card-title"><?= $kegiatanlain['nama_kegiatan']; ?></h5>
                    <?php if ($kegiatanlain['foto'] == "") : ?>
                        <p></p>
                    <?php endif; ?>
                    <?php if ($kegiatanlain['foto'] != "") : ?>
                        <img src="/img/<?= $kegiatanlain['foto']; ?>" width="500px">
                    <?php endif; ?>
                    <p>&nbsp;</p>
                    <?php if ($kegiatanlain['video'] == "") : ?>
                        <p></p>
                    <?php endif; ?>
                    <?php if ($kegiatanlain['video'] != "") : ?>
                        <video controls width="500px">
                            <source src="/img/<?= $kegiatanlain['video']; ?>">
                        </video>
                    <?php endif; ?>
                    <p class="card-text"><b>Tempat pelaksanaan : </b><?= $kegiatanlain['tempat_pelaksanaan']; ?></p>
                    <p class="card-text"><?= $kegiatanlain['keterangan']; ?></small>
                    </p>
                    <br>
                    <a href="/kegiatanlain/index" class="btn btn-primary">Kembali</a>
                    <a href="/kegiatanlain/edit/<?= $kegiatanlain['kd_kegiatan']; ?>" class="btn btn-warning">Edit</a>
                    <form action="/kegiatanlain/<?= $kegiatanlain['kd_kegiatan']; ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>