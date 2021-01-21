<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5>
        <center>Buku Inventaris</center>
    </h5>
    <div class="row">
        <div class="col-md">
            <a href="/bukuinventaris/create" class="btn btn-primary">Tambah Data Inventaris</a>
        </div>
        <!-- </?php if ($bukuinven) : ?>
            <div class="col-md">
                <a class="btn btn-outline-secondary shadow float-right" href="/BukuinvenCon/range">Print
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
    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped">
            <thead>
                <th scope="col">NO.</th>
                <th scope="col">NAMA BARANG</th>
                <th scope="col">ASAL BARANG</th>
                <th scope="col">TANGGAL PENERIMAAN<br>PEMBELIAN</th>
                <th scope="col">JUMLAH</th>
                <th scope="col">TEMPAT PENYIMPANAN</th>
                <th scope="col">KONDISI BARANG</th>
                <th scope="col">FOTO</th>
                <th scope="col">KETERANGAN</th>
                <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 + (4 * ($halaman - 1)); ?>
                <?php foreach ($bukuinven as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['nama_brg']; ?></td>
                        <td><?= $k['asal_brg']; ?></td>
                        <td><?= $k['tgl_terima_beli']; ?></td>
                        <td><?= $k['jumlah']; ?></td>
                        <td><?= $k['tempat_simpan']; ?></td>
                        <td><?= $k['kondisi_brg']; ?></td>
                        <td>
                            <?php if ($k['foto'] != '') { ?>
                                <a href="/img/<?= $k['foto']; ?>">
                                    <img src="/img/<?= $k['foto']; ?>" class="card-img">
                                </a>
                            <?php } elseif ($k['foto'] == '') { ?>
                                Foto tidak ada
                            <?php } ?>
                        </td>
                        <td><?= $k['keterangan']; ?></td>
                        <td>
                            <a href="/bukuinventaris/edit/<?= $k['no']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/bukuinventaris/<?= $k['no']; ?>" method="post" class="d-inline">
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
    <?= $pager->links('bukuinventarsi', 'paginationku'); ?>
</div>
<?= $this->endsection(); ?>