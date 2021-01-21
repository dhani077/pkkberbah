<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-2">
        <center>Daftar Angggota Tim Penggerak PKK</center>
    </h5>
    <div class="row">
        <div class="col-sm-7 pt-2">
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
            <a href="/daftartimpkk/create/<?= $kdwilayah; ?>" class="btn btn-primary">Tambah Daftar Anggota Tim PKK</a>
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
                    <th scope="col">No.</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">TANGGAL MASUK</th>
                    <th scope="col">JABATAN</th>
                    <th scope="col">JENIS<br>KELAMIN</th>
                    <th scope="col">TEMPAT LAHIR</th>
                    <th scope="col">TANGGAL/BULAN<br>/TH.LAHIR/UMUR</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">ALAMAT</th>
                    <th scope="col">PENDIDIKAN</th>
                    <th scope="col">PEKERJAAN</th>
                    <th scope="col">FOTO</th>
                    <th scope="col">KETERANGAN</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($daftartimpkk as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['nama']; ?></td>
                        <td><?= $k['tgl_masuk']; ?></td>
                        <td><?= $k['jabatan']; ?></td>
                        <td><?= $k['jk']; ?></td>
                        <td><?= $k['tempat_lahir']; ?></td>
                        <td><?= $k['tgl_lahir']; ?></td>
                        <td><?= $k['status']; ?></td>
                        <td><?= $k['alamat']; ?></td>
                        <td><?= $k['pendidikan']; ?></td>
                        <td><?= $k['pekerjaan']; ?></td>
                        <td>
                            <?php if ($k['foto']) : ?>
                                <a href="/img/<?= $k['foto']; ?>">
                                    <img src="/img/<?= $k['foto']; ?>" width="180px">
                                </a>
                            <?php endif; ?>
                            <?php if ($k['foto'] == '') : ?>
                                tidak ada
                            <?php endif; ?>
                        </td>
                        <td><?= $k['keterangan']; ?></td>
                        <td>
                            <a href="/daftartimpkk/edit/<?= $k['no']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/daftartimpkk/<?= $k['no']; ?>" method="post" class="d-inline">
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
    <a href="/daftartimpkk/index" class="btn btn-outline-danger">Kembali ke daftar desa/kelurahan</a>
</div>

<?= $this->endsection(); ?>