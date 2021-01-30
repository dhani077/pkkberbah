<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <center>
        <h5 class="mb-3">Data Kegiatan PKK</h5>
        <p><b>TP. PKK : Kecamatan Berbah<br>Tahun : <?= $tahun; ?></b></p>
    </center>
    <p class="mt-2"><b>POKJA I</b></p>
    <div class="row">
        <div class="col-md">
            <a href="/pokjai/create" class="btn btn-primary">Tambah Data Pokja I</a>
        </div>
    </div>

    <?php if (session()->getFlashdata('delete')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashData('delete'); ?>
        </div>
    <?php endif; ?>
    <div class="table-responsive mt-2">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col" rowspan="3">NO.</th>
                    <th scope="col" rowspan="3">NAMA WILAYAH<br>(Desa/Kelurahan)</th>
                    <th scope="col" colspan="3">JUMLAH KADER</th>
                    <th scope="col" colspan="8">PENGHAYATAN DAN PENGAMALAN PANCASILA</th>
                    <th scope="col" colspan="5">GOTONG ROYONG</th>
                    <th scope="col" rowspan="3">KETERANGAN</th>
                    <th scope="col" rowspan="3">AKSI</th>
                </tr>
                <tr>
                    <th scope="col" rowspan="2">PKBN</th>
                    <th scope="col" rowspan="2">PKDRT</th>
                    <th scope="col" rowspan="2">POLA ASUH</th>
                    <th scope="col" colspan="2">PKBN</th>
                    <th scope="col" colspan="2">PKDRT</th>
                    <th scope="col" colspan="2">POLA ASUH</th>
                    <th scope="col" colspan="2">LANSIA</th>
                    <th scope="col" colspan="5">JUMLAH KELOMPOK</th>
                </tr>
                <tr>
                    <th scope="col">JUMLAH KELOMPOK SIMULASI</th>
                    <th scope="col">JUMLAH ANGGOTA</th>
                    <th scope="col">JUMLAH KELOMPOK SIMULASI</th>
                    <th scope="col">JUMLAH ANGGOTA</th>
                    <th scope="col">JUMLAH KELOMPOK</th>
                    <th scope="col">JUMLAH ANGGOTA</th>
                    <th scope="col">JUMLAH KELOMPOK</th>
                    <th scope="col">JUMLAH ANGGOTA</th>
                    <th scope="col">KERJA BAKTI</th>
                    <th scope="col">RUKUN KEMATIAN</th>
                    <th scope="col">KEAGAMAAN</th>
                    <th scope="col">JIMPITAN</th>
                    <th scope="col">ARISAN</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($pokjaI as $k) : ?>
                    <tr>
                        <?php foreach ($wilayah as $w) :
                            $kdwilayah = $w['kd_wilayah'];
                            if ($k['kd_wilayah'] == $w['kd_wilayah']) { ?>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $w['kelurahan']; ?></td>
                                <td><?= $k['jml_kader_pkbn']; ?></td>
                                <td><?= $k['jml_kader_pkdrt']; ?></td>
                                <td><?= $k['jml_kader_polaasuh']; ?></td>
                                <td><?= $k['jml_klp_simulasi_pkbn']; ?></td>
                                <td><?= $k['jml_anggota_pkbn']; ?></td>
                                <td><?= $k['jml_klp_simulasi_pkdrt']; ?></td>
                                <td><?= $k['jml_anggota_pkdrt']; ?></td>
                                <td><?= $k['jml_klp_polaasuh']; ?></td>
                                <td><?= $k['jml_anggota_polaasuh']; ?></td>
                                <td><?= $k['jml_klp_lansia']; ?></td>
                                <td><?= $k['jml_anggota_lansia']; ?></td>
                                <td><?= $k['jml_klp_kerjabakti']; ?></td>
                                <td><?= $k['jml_klp_rknmati']; ?></td>
                                <td><?= $k['jml_klp_keagamaan']; ?></td>
                                <td><?= $k['jml_klp_jimpitan']; ?></td>
                                <td><?= $k['jml_klp_arisan']; ?></td>
                                <td><?= $k['keterangan']; ?></td>
                                <td>
                                    <a href="/pokjai/edit/<?= $k['no']; ?>" class="btn btn-warning">Edit</a>
                                    <form action="/pokjai/<?= $k['no']; ?>" method="post" class="d-inline">
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
                        <td><?= $t['totalpkbn']; ?></td>
                        <td><?= $t['totalpkdrt']; ?></td>
                        <td><?= $t['totalpola']; ?></td>
                        <td><?= $t['totalklppkbn']; ?></td>
                        <td><?= $t['totalanggotapkbn']; ?></td>
                        <td><?= $t['totalklppkdrt']; ?></td>
                        <td><?= $t['totalanggotapkdrt']; ?></td>
                        <td><?= $t['totalklppola']; ?></td>
                        <td><?= $t['totalanggotapola']; ?></td>
                        <td><?= $t['totalklplansia']; ?></td>
                        <td><?= $t['totalanggotalansia']; ?></td>
                        <td><?= $t['totalklpbakti']; ?></td>
                        <td><?= $t['totalklpagama']; ?></td>
                        <td><?= $t['totalklpmati']; ?></td>
                        <td><?= $t['totalklpjimpit']; ?></td>
                        <td><?= $t['totalklparisan']; ?></td>
                    <?php endforeach; ?>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <br><br>
    <?php if ($pokjaI) : ?>
        <a href="/pokjai/index" class="btn btn-outline-danger">Kembali ke daftar tahun</a>
    <?php endif; ?>
</div>
<?= $this->endSection(); ?>