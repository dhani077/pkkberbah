<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5>
        <center>Daftar Anggota TP PKK Dan Kader</center>
    </h5>
    <div class="row">
        <div class="col pt-3">
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
        <div class="col pt-3">
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
    <div class="row">
        <div class="col-md">
            <a href="/daftaranggotatppkkkader/create/<?= $kdwilayah; ?>" class="btn btn-primary">Tambah Daftar Anggota TP PKK Dan Kader </a>
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
    <?php if (session()->getFlashdata('gagal')) : ?>
        <div class="alert alert-warning" role="alert">
            <?= session()->getFlashData('gagal'); ?>
        </div>
    <?php endif; ?>
    <div class="table-responsive pt-2">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col" rowspan="2">NO.</th>
                    <th scope="col" rowspan="2">NOMOR <br>REGISTRASI<br>TP PKK</th>
                    <th scope="col" rowspan="2">TANGGAL<br>MASUK</th>
                    <th scope="col" rowspan="2">NAMA</th>
                    <th scope="col" rowspan="2">JENIS<br>KELAMIN</th>
                    <th scope="col" colspan="3">KEDUDUKAN/FUNGSI</th>
                    <th scope="col" rowspan="2">TH/BULAN/TGL.<br> LAHIR/UMUR</th>
                    <th scope="col" rowspan="2">STATUS</th>
                    <th scope="col" rowspan="2">ALAMAT</th>
                    <th scope="col" rowspan="2">PENDIDIKAN</th>
                    <th scope="col" rowspan="2">PEKERJAAN</th>
                    <th scope="col" rowspan="2">FOTO</th>
                    <th scope="col" rowspan="2">KETERANGAN</th>
                    <th scope="col" rowspan="2">AKSI</th>
                </tr>
                <tr>
                    <th scope="col">DALAM<br>KEANGGOTAAN<br>TP PKK</th>
                    <th scope="col">KADER<br>UMUM</th>
                    <th scope="col">KADER<br>KHUSUS</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($daftaranggota as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['no_reg']; ?></td>
                        <td><?= $k['tgl_masuk']; ?></td>
                        <td><?= $k['nama']; ?></td>
                        <td><?= $k['jk']; ?></td>
                        <td><?= $k['fungsi_anggota']; ?></td>
                        <td><?= $k['fungsi_kader_umum']; ?></td>
                        <td><?= $k['fungsi_kader_khusus']; ?></td>
                        <td><?= $k['tgl_lahir']; ?></td>
                        <td><?= $k['status']; ?></td>
                        <td><?= $k['alamat']; ?></td>
                        <td><?= $k['pendidikan']; ?></td>
                        <td><?= $k['pekerjaan']; ?></td>
                        <?php if ($k['foto'] == null) : ?>
                            <td>-</td>
                        <?php endif; ?>
                        <?php if ($k['foto'] != null) : ?>
                            <td>
                                <a href="/img/<?= $k['foto']; ?>">
                                    <img src="/img/<?= $k['foto']; ?>" width="150px">
                                </a>
                            </td>
                        <?php endif; ?>
                        <td><?= $k['keterangan']; ?></td>
                        <td>
                            <a href="/daftaranggotatppkkkader/edit/<?= $k['no_reg'] ?>" class="btn btn-warning">Edit</a>
                            <form action="/daftaranggotatppkkkader/delete/<?= $k['no_reg']; ?>" method="post" class="d-inline">
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
    <br><br>
    <a href="/daftaranggotatppkkkader/index" class="btn btn-outline-danger">Kembali ke daftar desa/kelurahan</a>
</div>

<?= $this->endSection(); ?>