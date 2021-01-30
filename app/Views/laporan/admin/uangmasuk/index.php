<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5>
        <center>Uang Masuk</center>
    </h5>
    <div class="row">
        <div class="col-md">
            <a href="/uangmasuk/create" class="btn btn-primary">Tambah Data Uang Masuk</a>
        </div>
    </div>
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
                    <th scope="col">TAHUN, BULAN, TANGGAL</th>
                    <th scope="col">SUMBER DANA</th>
                    <th scope="col">URAIAN</th>
                    <th scope="col">NOMOR BUKTI KAS</th>
                    <th scope="col">JUMLAH PENERIMAAN(.Rp)</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 + (5 * ($halaman - 1)); ?>
                <?php foreach ($uangmasuk as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['tanggal']; ?></td>
                        <td><?= $k['sumber_dana']; ?></td>
                        <td><?= $k['uraian']; ?></td>
                        <td><?= $k['no_bukti']; ?></td>
                        <td>Rp. <?= $k['jml_terima']; ?></td>
                        <td>
                            <a href="/uangmasuk/edit/<?= $k['no']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/uangmasuk/<?= $k['no']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <th colspan="5">Jumlah</th>
                    <?php foreach ($total as $t) : ?>
                        <th>Rp. <?= $t['total']; ?></th>
                    <?php
                    endforeach;
                    ?>
                    <th></th>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <?= $pager->links('bukuuangmasuk', 'paginationku'); ?>
</div>

<?= $this->endsection(); ?>