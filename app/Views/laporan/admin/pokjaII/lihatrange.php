<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <center>
        <h5>Data Kegiatan PKK</h5>
        <p><b>TP. PKK : Kecamatan Berbah<br>Tahun : <?= $tahun1; ?>/<?= $tahun2; ?></b></p>
    </center>
    <p><b>POKJA II</b></p>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col" rowspan="4">NO.</th>
                    <th scope="col" rowspan="4">NAMA<br>WILAYAH <br>(Dusun/Ling<br>/Desa/Kel<br>/Kec/Kab<br>/Kota/Prov)</th>
                    <th scope="col" colspan="23">PENDIDIKAN KETERAMPILAN</th>
                    <th scope="col" colspan="10">PENGEMBANGAN KEHIDUPAN BERKOPERASI</th>
                    <th scope="col" rowspan="4">KETERANGAN</th>
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
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <?php if ($pokjaII) : ?>
        <form action="/pokjaii/print" method="post" class="d-inline">
            <input type="hidden" id="awal" name="awal" value="<?= $awal; ?>">
            <input type="hidden" id="akhir" name="akhir" value="<?= $akhir; ?>">
            <?= csrf_field(); ?>
            <button id="aksi" name="aksi" type="submit" class="btn btn-outline-secondary" value="print">Cetak Tabel</button>
        </form>
    <?php endif; ?>
</div>
<br><br>
<p><b>
        <center>Grafik Data Kegiatan PKK<br>POKJA II<br>Periode <?= date('d F Y', strtotime($awal)); ?> sampai <?= date('d F Y', strtotime($akhir)); ?></center>
    </b></p>
<canvas id="myLineChart" height="200"></canvas>
<script>
    var warna = ['#c5e417', '#12e20b', '#0dd5f0', '#0b1ae6', '#d10404', '#8f06b1', '#f71bb5', '#94eb6b', '#eba56b', '#6bebb6', '#6badeb', '#5c0000', '#005c4d']
    var ctx = document.getElementById('myLineChart');
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Kelompok belajar paket A', 'Warga belajar paket A', 'Kelompok belajar paket B', 'Warga belajar paket B', 'Kelompok belajar paket C', 'Warga belajar paket C', 'KF', 'Warga belajar KF', 'PAUD sejenis', 'Kelompok BKB', 'Ibu peserta BKB', 'APE(set) BKB', 'Kelompok simulasi BKB', 'Kader khusus KF', 'Kader khusus PAUD sejenis', 'Kader khusus BKB', 'Kader khusus koperasi', 'Kader khusus keterampilan', 'Kader dilatih LP3 PKK', 'Kader dilatih TPK3 PKK', 'Kader dilatih Damas PKK', 'Kelompok berkoperasi pemula', 'Peserta berkoperasi pemula', 'Kelompok berkoperasi madya', 'Peserta berkoperasi madya', 'Kelompok berkoperasi utama', 'Peserta berkoperasi utama', 'Kelompok berkoperasi mandiri', 'Peserta berkoperasi mandiri', 'Kelompok koperasi berbadan hukum', 'Anggota koperasi berbadan hukum'],
            datasets: [
                <?php $i = 1;
                foreach ($pokjaII as $p) : ?>
                    <?php foreach ($wilayah as $w) :
                        $kdwilayah = $w['kd_wilayah'];
                        if ($k['kd_wilayah'] == $w['kd_wilayah']) { ?> {
                                label: '<?= $w['kelurahan']; ?> (<?= $p['tahun']; ?>)',
                                fill: false,
                                lineTension: 0.3,
                                backgroundColor: warna[<?= $i; ?>],
                                borderColor: warna[<?= $i; ?>],
                                pointHoverBackgroundColor: warna[<?= $i; ?>],
                                pointHoverBorderColor: warna[<?= $i; ?>],
                                data: [
                                    <?= $p['jml_wrg_tiga_buta']; ?>,
                                    <?= $p['jml_klp_bljr_paketa']; ?>,
                                    <?= $p['jml_wrg_bljr_paketa']; ?>,
                                    <?= $p['jml_klp_bljr_paketb']; ?>,
                                    <?= $p['jml_wrg_bljr_paketb']; ?>,
                                    <?= $p['jml_klp_bljr_paketc']; ?>,
                                    <?= $p['jml_wrg_bljr_paketc']; ?>,
                                    <?= $p['jml_klp_bljr_kf']; ?>,
                                    <?= $p['jml_klp_bljr_kf_wrgbljr']; ?>,
                                    <?= $p['jml_klp_bljr_paud']; ?>,
                                    <?= $p['jml_perpus']; ?>,
                                    <?= $p['jml_klp_bkb']; ?>,
                                    <?= $p['jml_ibu_peserta_bkb']; ?>,
                                    <?= $p['jml_ape_bkb']; ?>,
                                    <?= $p['jml_klp_simulasi_bkb']; ?>,
                                    <?= $p['jml_tuto_kf']; ?>,
                                    <?= $p['jml_tuto_paud_kader']; ?>,
                                    <?= $p['jml_bkb_kader']; ?>,
                                    <?= $p['jml_koperasi_kader']; ?>,
                                    <?= $p['jml_ktrmpilan_kader']; ?>,
                                    <?= $p['jml_lp3_kader_latih']; ?>,
                                    <?= $p['jml_tpk3_kader_latih']; ?>,
                                    <?= $p['jml_damas_kader_latih']; ?>,
                                    <?= $p['jml_klp_pemula_prakop']; ?>,
                                    <?= $p['jml_psrt_pemula_prakop']; ?>,
                                    <?= $p['jml_klp_madya_prakop']; ?>,
                                    <?= $p['jml_psrt_madya_prakop']; ?>,
                                    <?= $p['jml_klp_utama_prakop']; ?>,
                                    <?= $p['jml_psrt_utama_prakop']; ?>,
                                    <?= $p['jml_klp_mandiri_prakop']; ?>,
                                    <?= $p['jml_psrt_mandiri_prakop']; ?>,
                                    <?= $p['jml_klp_kophkm']; ?>,
                                    <?= $p['jml_anggota_kophkm']; ?>
                                ],
                            },
                        <?php } ?>
                    <?php endforeach; ?>
                <?php $i++;
                endforeach; ?>
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<br><br>
<form action="/pokjaii/print" method="post" class="d-inline">
    <?= csrf_field(); ?>
    <button id="aksi" name="aksi" type="submit" class="btn btn-danger" value="batal">Kembali</button>
</form>
<?= $this->endSection(); ?>