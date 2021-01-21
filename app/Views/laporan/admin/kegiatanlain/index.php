<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-4">
        <center>Kegiatan Lain-lain</center>
    </h5>
    <a href="/kegiatanlain/create" class="btn btn-primary">Tambah Data Kegiatan Lain-lain</a>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashData('pesan'); ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('hapus')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashData('hapus'); ?>
        </div>
    <?php endif; ?>
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
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 + (3 * ($halaman - 1)); ?>
                <?php foreach ($kegiatanlain as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['nama_kegiatan']; ?></td>
                        <td><?= $k['tempat_pelaksanaan']; ?></td>
                        <td><?= $k['tgl_pelaksanaan']; ?></td>
                        <td>
                            <?php if ($k['foto']) : ?>
                                <a href="/img/<?= $k['foto']; ?>">
                                    <img src="/img/<?= $k['foto']; ?>" width="180px">
                                </a>
                            <?php endif; ?>
                            <?php if ($k['foto'] == '') : ?>
                                tidak ada
                            <?php endif; ?>
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
                        <td>
                            <a href="/kegiatanlain/detail/<?= $k['kd_kegiatan']; ?>" class="btn btn-success">Detail</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br>
    <?= $pager->links('kegiatanlain', 'paginationku'); ?>
</div>
<?= $this->endsection(); ?>