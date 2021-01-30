<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5>POSYANDU</h5>
    <div class="row">
        <div class="col">
            <table>
                <tr>
                    <th>Kelurahan</th>
                    <th></th>
                    <th>:</th>
                    <th><?= $kelurahan; ?></th>
                </tr>
                <tr>
                    <th>Kab/Kota</th>
                    <th></th>
                    <th>:</th>
                    <th><?= $kabupaten; ?></th>
                </tr>
            </table>
        </div>
        <div class="col">
            <table>
                <tr>
                    <th>Kecamatan</th>
                    <th></th>
                    <th>:</th>
                    <th><?= $kecamatan; ?></th>
                </tr>
                <tr>
                    <th>Provinsi</th>
                    <th></th>
                    <th>:</th>
                    <th><?= $provinsi; ?></th>
                </tr>
            </table>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col">
            <table>
                <tr>
                    <td><b>Nama Posyandu</b></td>
                    <th> : </th>
                    <td><b><?= $posyandu['nama_posyandu']; ?></b></td>
                </tr>
                <tr>
                    <td><b>Pengelola</b></td>
                    <th> : </th>
                    <td><b><?= $posyandu['pengelola']; ?></b></td>
                </tr>
                <tr>
                    <td><b>Sekretaris</b></td>
                    <th> : </th>
                    <td><b><?= $posyandu['sekretaris']; ?></b></td>
                </tr>
                <tr>
                    <td><b>Jenis posyandu</b></td>
                    <th> : </th>
                    <td><b><?= $posyandu['jns_posyandu']; ?></b></td>
                </tr>
                <tr>
                    <td><b>Jumlah kader</b></td>
                    <th> : </th>
                    <td><b><?= $posyandu['jml_kader']; ?></b></td>
                </tr>
            </table>
        </div>
    </div>
    <p class="mt-2"><b>Jenis Kegiatan/Layanan</b></p>
    <div class="row">
        <div class="col-md">
            <a href="/posyandu/createlayanan/<?= $kdPosyandu; ?>" class="btn btn-primary">Tambah Kegiatan/Layanan Posyandu</a>
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
                    <th scope="col" rowspan="3">NO.</th>
                    <th scope="col" rowspan="3">JENIS KEGIATAN/LAYANAN</th>
                    <th scope="col" rowspan="3">FREKWENSI<br>LAYANAN</th>
                    <th scope="col" colspan="4">JUMLAH</th>
                    <th scope="col" rowspan="3">KETERANGAN</th>
                    <th scope="col" rowspan="3">AKSI</th>
                </tr>
                <tr>
                    <th scope="col" colspan="2">PENGUNJUNG</th>
                    <th scope="col" colspan="2">PETUGAS/PARAMEDIS</th>
                </tr>
                <tr>
                    <th>L</th>
                    <th>P</th>
                    <th>L</th>
                    <th>P</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($layanan as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['jns_kegiatan']; ?></td>
                        <td><?= $k['frekwensi_layanan']; ?></td>
                        <td><?= $k['jml_pengunjung_L']; ?></td>
                        <td><?= $k['jml_pengunjung_P']; ?></td>
                        <td><?= $k['jml_petugas_L']; ?></td>
                        <td><?= $k['jml_petugas_P']; ?></td>
                        <td><?= $k['keterangan']; ?></td>
                        <td>
                            <a href="/posyandu/editlayanan/<?= $k['no']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/posyandu/deletelayanan/<?= $k['no']; ?>" method="post" class="d-inline">
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
    <?php if ($posyandu['nama_posyandu']) : ?>
        <br><br>
        <a href="/posyandu/pengunjunglayanan/<?= $kdPosyandu; ?>" class="btn btn-outline-danger">Kembali ke detail posyandu <?= $posyandu['nama_posyandu']; ?></a>
    <?php
    endif;
    ?>
</div>
<?= $this->endsection(); ?>