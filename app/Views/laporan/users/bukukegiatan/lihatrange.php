<?= $this->extend('layout/users/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5>
        <center>Buku Kegiatan</center>
    </h5>
    <div class="table-responsive pt-2">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col" rowspan="2">NO.</th>
                    <th scope="col" rowspan="2">NAMA</th>
                    <th scope="col" rowspan="2">JABATAN</th>
                    <th scope="col" colspan="3">KEGIATAN</th>
                    <th scope="col" rowspan="2">FOTO KEGIATAN</th>
                </tr>
                <tr>
                    <th scope="col">TANGGAL</th>
                    <th scope="col">TEMPAT</th>
                    <th scope="col">URAIAN</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($bukukegiatan as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['nama']; ?></td>
                        <td><?= $k['jabatan']; ?></td>
                        <td><?= $k['tgl_kegiatan']; ?></td>
                        <td><?= $k['tempat_kegiatan']; ?></td>
                        <td><?= $k['uraian_kegiatan']; ?></td>
                        <?php if ($k['foto'] != '') : ?>
                            <td>
                                <a href="/img/<?= $k['foto']; ?>">
                                    <img src="/img/<?= $k['foto']; ?>" width="120px">
                                </a>
                            </td>
                        <?php endif;
                        if ($k['foto'] == '') : ?>
                            <td>Tidak ada foto</td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br><br>
    <a href="/users/rangebukukegiatan" class="btn btn-danger">Kembali</a>
</div>
<?= $this->endSection(); ?>