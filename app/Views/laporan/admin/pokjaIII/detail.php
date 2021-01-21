<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <center>
        <h5>Data Kegiatan PKK</h5>
        <p><b>TP. PKK : Kecamatan Berbah<br>Tahun : <?= $tahun; ?></b></p>
    </center>
    <h5 class="mt-2">POKJA III</h5>
    <div class="row">
        <div class="col-md">
            <a href="/pokjaiii/create" class="btn btn-primary">Tambah Data Pokja III</a>
        </div>
        <!-- </?php if ($pokjaIII) : ?>
            <div class="col-md">
                <a class="btn btn-outline-secondary shadow float-right" href="/PokjaIIICon/print/</?= $tingkat; ?>/</?= $tahun; ?>">Print
                </a>
            </div>
        </?php endif; ?> -->
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
                    <th scope="col" rowspan="3">NAMA<br>WILAYAH <br>(Dusun/Ling<br>/Desa/Kel<br>/Kec/Kab<br>/Kota/Prov)</th>
                    <th scope="col" colspan="3">JUMLAH KADER</th>
                    <th scope="col" colspan="8">PANGAN</th>
                    <th scope="col" colspan="3">JUMLAH INDUSTRI<br>RUMAH TANGGA</th>
                    <th scope="col" colspan="2">JUMLAH RUMAH</th>
                    <th scope="col" rowspan="3">KETERANGAN</th>
                    <th scope="col" rowspan="3">AKSI</th>
                </tr>
                <tr>
                    <th scope="col" rowspan="2">PANGAN</th>
                    <th scope="col" rowspan="2">SANDANG</th>
                    <th scope="col" rowspan="2">TATA LAKSANA<br>RUMAH TANGGA</th>
                    <th scope="col" colspan="2">MAKANAN<br>POKOK</th>
                    <th scope="col" colspan="6">PEMANFAATAN PEKARANGAN/HATINYA PKK</th>
                    <th scope="col" rowspan="2">PANGAN</th>
                    <th scope="col" rowspan="2">SANDANG</th>
                    <th scope="col" rowspan="2">JASA</th>
                    <th scope="col" rowspan="2">SEHAT DAN<br>LAYAK HUNI</th>
                    <th scope="col" rowspan="2">TIDAK SEHAT DAN<br>TIDAK LAYAK HUNI</th>
                </tr>
                <tr>
                    <th scope="col">BERAS</th>
                    <th scope="col">NON<br>BERAS</th>
                    <th scope="col">PETERNAKAN</th>
                    <th scope="col">PERIKANAN</th>
                    <th scope="col">WARUNG<br>HIDUP</th>
                    <th scope="col">LUMBUNG<br>HIDUP</th>
                    <th scope="col">TOGA</th>
                    <th scope="col">TANAMAN<br>KERAS</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($pokjaIII as $k) : ?>
                    <tr>
                        <?php foreach ($wilayah as $w) :
                            $kdwilayah = $w['kd_wilayah'];
                            if ($k['kd_wilayah'] == $w['kd_wilayah']) { ?>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $w['kelurahan']; ?></td>
                                <td><?= $k['jml_kader_pangan']; ?></td>
                                <td><?= $k['jml_kader_sandang']; ?></td>
                                <td><?= $k['jml_kader_tatart']; ?></td>
                                <td><?= $k['jml_mknpokok_beras']; ?></td>
                                <td><?= $k['jml_mknpokok_nonberas']; ?></td>
                                <td><?= $k['jml_pmnfaatn_ternak']; ?></td>
                                <td><?= $k['jml_pmnfaatn_ikan']; ?></td>
                                <td><?= $k['jml_pmnfaatn_warung']; ?></td>
                                <td><?= $k['jml_pmnfaatn_lumbung']; ?></td>
                                <td><?= $k['jml_pmnfaatn_toga']; ?></td>
                                <td><?= $k['jml_pmnfaatn_tnmkeras']; ?></td>
                                <td><?= $k['jml_ind_pangan']; ?></td>
                                <td><?= $k['jml_ind_sandang']; ?></td>
                                <td><?= $k['jml_ind_jasa']; ?></td>
                                <td><?= $k['jml_rmh_layak']; ?></td>
                                <td><?= $k['jml_rmh_tidaklayak']; ?></td>
                                <td><?= $k['keterangan']; ?></td>
                                <td>
                                    <a href="/pokjaiii/edit/<?= $k['no']; ?>" class="btn btn-warning">Edit</a>
                                    <form action="/pokjaiii/<?= $k['no']; ?>" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                                    </form>
                                </td>
                            <?php } ?>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <th colspan="2">Jumlah</th>
                    <?php foreach ($total as $t) : ?>
                        <td><?= $t['totalkaderpangan']; ?></td>
                        <td><?= $t['totalkadersandang']; ?></td>
                        <td><?= $t['totalkadertatart']; ?></td>
                        <td><?= $t['totalmknberas']; ?></td>
                        <td><?= $t['totalmknnonberas']; ?></td>
                        <td><?= $t['totalternak']; ?></td>
                        <td><?= $t['totalikan']; ?></td>
                        <td><?= $t['totalwarung']; ?></td>
                        <td><?= $t['totallumbung']; ?></td>
                        <td><?= $t['totaltoga']; ?></td>
                        <td><?= $t['totaltnmkeras']; ?></td>
                        <td><?= $t['totalindpangan']; ?></td>
                        <td><?= $t['totalindsandang']; ?></td>
                        <td><?= $t['totalindjasa']; ?></td>
                        <td><?= $t['totalrmhlayak']; ?></td>
                        <td><?= $t['totalrmhtdklayak']; ?></td>
                    <?php endforeach; ?>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php if ($pokjaIII) : ?>
        <br><br>
        <a href="/pokjaiii/index" class="btn btn-outline-danger">Kembali ke daftar tahun</a>
    <?php endif; ?>
</div>
<?= $this->endsection(); ?>