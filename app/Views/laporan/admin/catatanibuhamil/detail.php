<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mt-2">
        <center>Rekapitulasi Data<br>Ibu Hamil, Melahirkan, Nifas, Meninggal, Kelahiran Bayi,<br> Bayi Meninggal Dan Kematian Balita</center>
    </h5>
    <h5>
        <center>Bulan <?= $bulan; ?></center>
    </h5>
    <h5>
        <center>Tahun <?= $tahun; ?></center>
    </h5>
    <div class="table-responsive mt-3">
        <table>
            <tr>
                <th>Kecamatan
                </th>
                <th></th>
                <th>:</th>
                <th><?= $kecamatan; ?></th>
            </tr>
            <tr>
                <th>Kab/Kota</th>
                <th></th>
                <th> : </th>
                <th><?= $kabupaten; ?></th>
            </tr>
            <tr>
                <th>Provinsi</th>
                <th></th>
                <th> : </th>
                <th><?= $provinsi; ?></th>
            </tr>
        </table>
    </div>
    <div class="row">
        <div class="col-md">
            <a href="/catatanibuhamil/create" class="btn btn-primary">Tambah Catatan Ibu Hamil</a>
        </div>
    </div>
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
                    <th scope="col" rowspan="3">NAMA DESA/<br>KELURAHAN</th>
                    <th scope="col" colspan="4">JUMLAH</th>
                    <th scope="col" rowspan="2" colspan="4">JUMLAH IBU</th>
                    <th scope="col" colspan="6">JUMLAH BAYI</th>
                    <th scope="col" colspan="2" rowspan="2">JUMLAH BALITA<br>MENINGGAL</th>
                    <th scope="col" rowspan="3">KETERANGAN</th>
                    <th scope="col" rowspan="3">AKSI</th>
                </tr>
                <tr>
                    <th scope="col" rowspan="2">DUSUN/<br>LINGKUNGAN</th>
                    <th scope="col" rowspan="2">RW</th>
                    <th scope="col" rowspan="2">RT</th>
                    <th scope="col" rowspan="2">DASA<br>WISMA</th>
                    <th scope="col" colspan="2">LAHIR</th>
                    <th scope="col" colspan="2">AKTE<br>KELAHIRAN</th>
                    <th scope="col" colspan="2">MENINGGAL</th>
                </tr>
                <tr>
                    <th scope="col">HAMIL</th>
                    <th scope="col">MELAHIRKAN</th>
                    <th scope="col">NIFAS</th>
                    <th scope="col">MENINGGAL</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">ADA</th>
                    <th scope="col">TIDAK</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($catatanibuhamil as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['nama_kelurahan']; ?></td>
                        <td><?= $k['jml_dusun']; ?></td>
                        <td><?= $k['jml_rw']; ?></td>
                        <td><?= $k['jml_rt']; ?></td>
                        <td><?= $k['jml_dasawisma']; ?></td>
                        <td><?= $k['jml_ibu_hamil']; ?></td>
                        <td><?= $k['jml_ibu_melahir']; ?></td>
                        <td><?= $k['jml_ibu_nifas']; ?></td>
                        <td><?= $k['jml_ibu_mngl']; ?></td>
                        <td><?= $k['jml_bayi_lahirL']; ?></td>
                        <td><?= $k['jml_bayi_LahirP']; ?></td>
                        <td><?= $k['jml_bayi_akte_ada']; ?></td>
                        <td><?= $k['jml_bayi_akte_tidak']; ?></td>
                        <td><?= $k['jml_bayi_mnglL']; ?></td>
                        <td><?= $k['jml_bayi_mnglP']; ?></td>
                        <td><?= $k['jml_balita_mnglL']; ?></td>
                        <td><?= $k['jml_balita_mnglP']; ?></td>
                        <td><?= $k['keterangan']; ?></td>
                        <td>
                            <a href="/catatanibuhamil/edit/<?= $k['no']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/catatanibuhamil/<?= $k['no']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <th colspan="2">Jumlah</th>
                    <?php foreach ($total as $t) : ?>
                        <td><?= $t['totaldusun']; ?></td>
                        <td><?= $t['totalrw']; ?></td>
                        <td><?= $t['totalrt']; ?></td>
                        <td><?= $t['totaldasawisma']; ?></td>
                        <td><?= $t['totalhamil']; ?></td>
                        <td><?= $t['totallahir']; ?></td>
                        <td><?= $t['totalnifas']; ?></td>
                        <td><?= $t['totalmngl']; ?></td>
                        <td><?= $t['totallahirL']; ?></td>
                        <td><?= $t['totallahirP']; ?></td>
                        <td><?= $t['totalakte']; ?></td>
                        <td><?= $t['totalaktetdk']; ?></td>
                        <td><?= $t['totalmnglL']; ?></td>
                        <td><?= $t['totalmnglP']; ?></td>
                        <td><?= $t['totalblitmnglL']; ?></td>
                        <td><?= $t['totalblitmnglP']; ?></td>
                    <?php endforeach; ?>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <br><br>
    <form action="/catatanibuhamil/bulan" method="post" enctype="multipart/form-data">
        <input type="hidden" name="tahun" id="tahun" value="<?= $tahun; ?>">
        <button type="submit" class="btn btn-outline-danger">Kembali ke daftar bulan pada tahun <?= $tahun; ?></button>
    </form>
</div>
<?= $this->endsection(); ?>