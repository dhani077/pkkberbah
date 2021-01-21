<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <center>
        <h5>Data Inventaris</h5>
    </center>
    <div class="table-responsive">
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
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
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
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br><br>
    <form action="/bukuinventaris/print" method="post" class="d-inline">
        <?= csrf_field(); ?>
        <input type="hidden" id="awal" name="awal" value="<?= $awal; ?>">
        <input type="hidden" id="akhir" name="akhir" value="<?= $akhir; ?>">
        <?php if ($bukuinven) : ?>
            <button id="aksi" name="aksi" type="submit" class="btn btn-outline-secondary" value="print">Cetak</button>
        <?php endif; ?>
        <button id="aksi" name="aksi" type="submit" class="btn btn-danger" value="batal">Kembali</button>
    </form>

</div>
<?= $this->endSection(); ?>