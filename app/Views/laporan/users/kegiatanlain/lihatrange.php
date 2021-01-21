<?= $this->extend('layout/users/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5>
        <center>Kegiatan Lain-lain</center>
    </h5>
    <div class="table-responsive pt-2">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">NAMA KEGIATAN</th>
                    <th scope="col">TEMPAT PELAKSANAAN</th>
                    <th scope="col">TANGGAL</th>
                    <th scope="col">FOTO</th>
                    <th scope="col">VIDEO</th>
                    <th scope="col">KETERANGAN</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($kegiatanlain as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['nama_kegiatan']; ?></td>
                        <td><?= $k['tempat_pelaksanaan']; ?></td>
                        <td><?= $k['tgl_pelaksanaan']; ?></td>
                        <td>
                            <a href="/img/<?= $k['foto']; ?>">
                                <img src="/img/<?= $k['foto']; ?>" width="180px">
                            </a>
                        </td>
                        <td>
                            <?php if ($k['video']) : ?>
                                <a href="/img/<?= $k['video']; ?>">
                                    <video src="/img/<?= $k['video']; ?>" width="180px">
                                </a>
                            <?php endif; ?>
                            <?php if ($k['video'] == '') : ?>
                                tidak ada
                            <?php endif; ?>
                        </td>
                        <td><?= $k['keterangan']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br><br>
    <a href="/users/rangekegiatanlain" class="btn btn-danger">Kembali</a>
</div>
<?= $this->endSection(); ?>