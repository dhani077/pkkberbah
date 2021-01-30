<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <center>
        <h5 class="mb-3">Data Kegiatan PKK</h5>
        <p><b>TP. PKK : Kecamatan Berbah<br>Tahun : <?= $tahun; ?></b></p>
    </center>
    <p><b>POKJA II</b></p>
    <div class="row">
        <div class="col-md">
            <a href="/pokjaii/create" class="btn btn-primary">Tambah Data Pokja II</a>
        </div>
        <!-- </?php if ($pokjaII) : ?>
            <div class="col-md">
                <a class="btn btn-outline-secondary shadow float-right" href="/PokjaIICon/print/</?= $tingkat; ?>/</?= $tahun; ?>">Print
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
                    <th scope="col" rowspan="4">NO.</th>
                    <th scope="col" rowspan="4">NAMA<br>WILAYAH <br>(Dusun/Ling<br>/Desa/Kel<br>/Kec/Kab<br>/Kota/Prov)</th>
                    <th scope="col" colspan="23">PENDIDIKAN KETERAMPILAN</th>
                    <th scope="col" colspan="10">PENGEMBANGAN KEHIDUPAN BERKOPERASI</th>
                    <th scope="col" rowspan="4">KETERANGAN</th>
                    <th scope="col" rowspan="4">AKSI</th>
                </tr>
                <tr>
                    <th scope="col" rowspan="3">JUMLAH<br>WARGA<br>YANG<br>MASIH<br>3(tiga)<br>BUTA</th>
                    <th scope="col" colspan="9">JUMLAH<br>KELOMPOK<br>BELAJAR</th>
                    <th scope="col" rowspan="3">JML. <br>TAMAN <br>BACAAN/<br>PERPUSTAKAAN</th>
                    <th scope="col" colspan="4">BKB</th>
                    <th scope="col" colspan="5">KADER KHUSUS</th>
                    <th scope="col" colspan="3">JUMLAH<br>KADER YANG<br>SEDANG<br>DILATIH</th>
                    <th scope="col" colspan="8">PRA KOPERASI/USAHA BERSAMA/UP2K</th>
                    <th scope="col" colspan="2">KOPERASI<br>BERBADAN<br>HUKUM</th>
                </tr>
                <tr>
                    <th scope="col" colspan="2">PAKET A</th>
                    <th scope="col" colspan="2">PAKET B</th>
                    <th scope="col" colspan="2">PAKET C</th>
                    <th scope="col" colspan="2">KF</th>
                    <th scope="col" rowspan="2">PAUD SEJENIS</th>
                    <th scope="col" rowspan="2">JUMLAH<br>KELOMPOK</th>
                    <th scope="col" rowspan="2">JUMLAH IBU<br>PESERTA</th>
                    <th scope="col" rowspan="2">JUMLAH APE(set)</th>
                    <th scope="col" rowspan="2">JUMLAH<br>KELOMPOK<br>SIMULASI</th>
                    <th scope="col" colspan="2">TUTO</th>
                    <th scope="col" rowspan="2">BKB</th>
                    <th scope="col" rowspan="2">KOPERASI</th>
                    <th scope="col" rowspan="2">KETRAMPILAN</th>
                    <th scope="col" rowspan="2">LP3 PKK</th>
                    <th scope="col" rowspan="2">TPK 3 PKK</th>
                    <th scope="col" rowspan="2">DAMAS PKK</th>
                    <th scope="col" colspan="2">PEMULA</th>
                    <th scope="col" colspan="2">MADYA</th>
                    <th scope="col" colspan="2">UTAMA</th>
                    <th scope="col" colspan="2">MANDIRI</th>
                    <th scope="col" rowspan="2">JUMLAH<br>KELOMPOK</th>
                    <th scope="col" rowspan="2">JUMLAH<br>ANGGOTA</th>
                </tr>
                <tr>
                    <th scope="col">JML. KLP.<br>BELAJAR</th>
                    <th scope="col">WARGA<br>BELAJAR</th>
                    <th scope="col">JML. KLP.<br>BELAJAR</th>
                    <th scope="col">WARGA<br>BELAJAR</th>
                    <th scope="col">JML. KLP.<br>BELAJAR</th>
                    <th scope="col">WARGA<br>BELAJAR</th>
                    <th scope="col">JUMLAH</th>
                    <th scope="col">WARGA<br>BELAJAR</th>

                    <th scope="col">KF</th>
                    <th scope="col">PAUD SEJENIS</th>
                    <th scope="col">JUMLAH<br>KELOMPOK</th>
                    <th scope="col">PESERTA</th>
                    <th scope="col">JUMLAH<br>KELOMPOK</th>
                    <th scope="col">PESERTA</th>
                    <th scope="col">JUMLAH<br>KELOMPOK</th>
                    <th scope="col">PESERTA</th>
                    <th scope="col">JUMLAH<br>KELOMPOK</th>
                    <th scope="col">PESERTA</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($pokjaII as $k) : ?>
                    <tr>
                        <?php foreach ($wilayah as $w) :
                            $kdwilayah = $w['kd_wilayah'];
                            if ($k['kd_wilayah'] == $w['kd_wilayah']) { ?>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $w['kelurahan']; ?></td>
                                <td><?= $k['jml_wrg_tiga_buta']; ?></td>
                                <td><?= $k['jml_klp_bljr_paketa']; ?></td>
                                <td><?= $k['jml_wrg_bljr_paketa']; ?></td>
                                <td><?= $k['jml_klp_bljr_paketb']; ?></td>
                                <td><?= $k['jml_wrg_bljr_paketb']; ?></td>
                                <td><?= $k['jml_klp_bljr_paketc']; ?></td>
                                <td><?= $k['jml_wrg_bljr_paketc']; ?></td>
                                <td><?= $k['jml_klp_bljr_kf']; ?></td>
                                <td><?= $k['jml_klp_bljr_kf_wrgbljr']; ?></td>
                                <td><?= $k['jml_klp_bljr_paud']; ?></td>
                                <td><?= $k['jml_perpus']; ?></td>
                                <td><?= $k['jml_klp_bkb']; ?></td>
                                <td><?= $k['jml_ibu_peserta_bkb']; ?></td>
                                <td><?= $k['jml_ape_bkb']; ?></td>
                                <td><?= $k['jml_klp_simulasi_bkb']; ?></td>
                                <td><?= $k['jml_tuto_kf']; ?></td>
                                <td><?= $k['jml_tuto_paud_kader']; ?></td>
                                <td><?= $k['jml_bkb_kader']; ?></td>
                                <td><?= $k['jml_koperasi_kader']; ?></td>
                                <td><?= $k['jml_ktrmpilan_kader']; ?></td>
                                <td><?= $k['jml_lp3_kader_latih']; ?></td>
                                <td><?= $k['jml_tpk3_kader_latih']; ?></td>
                                <td><?= $k['jml_damas_kader_latih']; ?></td>
                                <td><?= $k['jml_klp_pemula_prakop']; ?></td>
                                <td><?= $k['jml_psrt_pemula_prakop']; ?></td>
                                <td><?= $k['jml_klp_madya_prakop']; ?></td>
                                <td><?= $k['jml_psrt_madya_prakop']; ?></td>
                                <td><?= $k['jml_klp_utama_prakop']; ?></td>
                                <td><?= $k['jml_psrt_utama_prakop']; ?></td>
                                <td><?= $k['jml_klp_mandiri_prakop']; ?></td>
                                <td><?= $k['jml_psrt_mandiri_prakop']; ?></td>
                                <td><?= $k['jml_klp_kophkm']; ?></td>
                                <td><?= $k['jml_anggota_kophkm']; ?></td>
                                <td><?= $k['keterangan']; ?></td>
                                <td>
                                    <a href="/pokjaii/edit/<?= $k['no']; ?>" class="btn btn-warning">Edit</a>
                                    <form action="/pokjaii/<?= $k['no']; ?>" method="post" class="d-inline">
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
                        <td><?= $t['totalbuta']; ?></td>
                        <td><?= $t['totalklpa']; ?></td>
                        <td><?= $t['totalpaketA']; ?></td>
                        <td><?= $t['totalklpB']; ?></td>
                        <td><?= $t['totalpaketB']; ?></td>
                        <td><?= $t['totalklpC']; ?></td>
                        <td><?= $t['totalpaketC']; ?></td>
                        <td><?= $t['totalklpKF']; ?></td>
                        <td><?= $t['totalpaketKF']; ?></td>
                        <td><?= $t['totalklppaud']; ?></td>
                        <td><?= $t['totalperpus']; ?></td>
                        <td><?= $t['totalklpbkb']; ?></td>
                        <td><?= $t['totalpesertabkb']; ?></td>
                        <td><?= $t['totalapebkb']; ?></td>
                        <td><?= $t['totalsimulasibkb']; ?></td>
                        <td><?= $t['totaltutoKF']; ?></td>
                        <td><?= $t['totalpaudkader']; ?></td>
                        <td><?= $t['totalbkbkader']; ?></td>
                        <td><?= $t['totalkoperasikader']; ?></td>
                        <td><?= $t['totalktrmpilankader']; ?></td>
                        <td><?= $t['totallp3kader']; ?></td>
                        <td><?= $t['totaltpk3kader']; ?></td>
                        <td><?= $t['totaldamaskader']; ?></td>
                        <td><?= $t['totalklppemula']; ?></td>
                        <td><?= $t['totalpsrtpemula']; ?></td>
                        <td><?= $t['totalklpmadya']; ?></td>
                        <td><?= $t['totalpsrtmadya']; ?></td>
                        <td><?= $t['totalklputama']; ?></td>
                        <td><?= $t['totalpsrtutama']; ?></td>
                        <td><?= $t['totalklpmandiri']; ?></td>
                        <td><?= $t['totalpsrtmandiri']; ?></td>
                        <td><?= $t['totalklphkm']; ?></td>
                        <td><?= $t['totalanggotahkm']; ?></td>
                    <?php endforeach; ?>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <br><br>
    <?php if ($pokjaII) : ?>
        <a href="/pokjaii/index" class="btn btn-outline-danger">Kembali ke daftar tahun</a>
    <?php endif; ?>
</div>

<?= $this->endsection(); ?>