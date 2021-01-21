<?php if (session('nama')) : ?>
    <?= $this->extend('layout/admin/template'); ?>
<?php endif; ?>
<?php if (empty(session('nama'))) : ?>
    <?= $this->extend('layout/users/template'); ?>
<?php endif; ?>
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
    <div class="table-responsive pt-3">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col" rowspan="2">NO.</th>
                    <th scope="col" rowspan="2">NOMOR <br>REGISTRASI<br>TP PKK</th>
                    <th scope="col" rowspan="2">NAMA</th>
                    <th scope="col" rowspan="2">JENIS<br>KELAMIN<br>(L/P)</th>
                    <th scope="col" colspan="3">KEDUDUKAN/FUNGSI</th>
                    <th scope="col" rowspan="2">TGL/BULAN/TH.<br> LAHIR/UMUR</th>
                    <th scope="col" rowspan="2">STATUS</th>
                    <th scope="col" rowspan="2">ALAMAT</th>
                    <th scope="col" rowspan="2">PENDIDIKAN</th>
                    <th scope="col" rowspan="2">PEKERJAAN</th>
                    <th scope="col" rowspan="2">FOTO</th>
                    <th scope="col" rowspan="2">KETERANGAN</th>
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
                                    <img src="/img/<?= $k['foto']; ?>" width="200px">
                                </a>
                            </td>
                        <?php endif; ?>
                        <td><?= $k['keterangan']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>