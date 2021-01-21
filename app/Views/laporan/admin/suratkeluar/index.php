<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">
        <center>Surat Keluar</center>
    </h5>
    <div class="row">
        <div class="col-md">
            <a href="/suratkeluar/create" class="btn btn-primary">Tambah Data Surat Keluar</a>
        </div>
        <!-- </?php if ($suratkeluar) : ?>
            <div class="col-md">
                <a class="btn btn-outline-secondary shadow float-right" href="/SuratkeluarCon/range">Print
                </a>
            </div>
        </?php endif; ?> -->
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
                    <th scope="col">NOMOR DAN KODE SURAT</th>
                    <th scope="col">TANGGAL SURAT</th>
                    <th scope="col">KEPADA</th>
                    <th scope="col">PERIHAL</th>
                    <th scope="col">LAMPIRAN</th>
                    <th scope="col">TEMBUSAN</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 + (5 * ($halaman - 1)); ?>
                <?php foreach ($suratkeluar as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['no_surat']; ?></td>
                        <td><?= $k['tgl_surat']; ?></td>
                        <td><?= $k['kepada']; ?></td>
                        <td><?= $k['perihal']; ?></td>
                        <td><?= $k['lampiran']; ?></td>
                        <td><?= $k['tembusan']; ?></td>
                        <td>
                            <a href="/suratkeluar/edit/<?= $k['no']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/suratkeluar/<?= $k['no']; ?>" method="post" class="d-inline">
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
    <br>
    <?= $pager->links('suratkeluar', 'paginationku'); ?>
</div>

<?= $this->endsection(); ?>