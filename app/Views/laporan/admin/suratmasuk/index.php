<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5>
        <center>Surat Masuk</center>
    </h5>
    <div class="row">
        <div class="col-md">
            <a href="/suratmasuk/create" class="btn btn-primary">Tambah Data Surat Masuk</a>
        </div>
        <!-- </?php if ($suratmasuk) : ?>
            <div class="col-md">
                <a class="btn btn-outline-secondary shadow float-right" href="/SuratmasukCon/range">Print
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
                    <th scope="col" rowspan="2">NO.</th>
                    <th scope="col" colspan="2">TANGGAL</th>
                    <th scope="col" rowspan="2">NOMOR SURAT</th>
                    <th scope="col" rowspan="2">ASAL SURAT DARI</th>
                    <th scope="col" rowspan="2">PERIHAL</th>
                    <th scope="col" rowspan="2">LAMPIRAN</th>
                    <th scope="col" rowspan="2">DITERUSKAN KEPADA</th>
                    <th scope="col" rowspan="2">AKSI</th>
                </tr>
                <tr>
                    <th scope="col">TERIMA SURAT</th>
                    <th scope="col">SURAT</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 + (5 * ($halaman - 1)); ?>
                <?php foreach ($suratmasuk as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['tgl_terima']; ?></td>
                        <td><?= $k['tgl_surat']; ?></td>
                        <td><?= $k['no_surat']; ?></td>
                        <td><?= $k['asal_surat']; ?></td>
                        <td><?= $k['perihal']; ?></td>
                        <td><?= $k['lampiran']; ?></td>
                        <td><?= $k['teruskan_kpd']; ?></td>
                        <td>
                            <a href="/suratmasuk/edit/<?= $k['no']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/suratmasuk/<?= $k['no']; ?>" method="post" class="d-inline">
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
    <?= $pager->links('suratmasuk', 'paginationku'); ?>
</div>

<?= $this->endsection(); ?>