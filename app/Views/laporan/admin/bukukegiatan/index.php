<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5>
        <center>Buku Kegiatan</center>
    </h5>
    <div class="row">
        <div class="col-md">
            <a href="/bukukegiatan/create" class="btn btn-primary">Tambah Data Buku Kegiatan</a>
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
                    <th scope="col" rowspan="2">NO.</th>
                    <th scope="col" rowspan="2">NAMA</th>
                    <th scope="col" rowspan="2">JABATAN</th>
                    <th scope="col" colspan="3">KEGIATAN</th>
                    <th scope="col" rowspan="2">FOTO KEGIATAN</th>
                    <th scope="col" rowspan="2">AKSI</th>
                </tr>
                <tr>
                    <th scope="col">TANGGAL</th>
                    <th scope="col">TEMPAT</th>
                    <th scope="col">URAIAN</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 + (4 * ($halaman - 1)); ?>
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
                        <td>
                            <a href="/bukukegiatan/edit/<?= $k['no']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/bukukegiatan/<?= $k['no']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $pager->links('bukukegiatan', 'paginationku'); ?>
</div>

<?= $this->endsection(); ?>