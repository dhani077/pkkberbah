<?= $this->extend('layout/users/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5>
        <center>Kegiatan Posyandu</center>
    </h5>
    <div class="table-responsive">
        <table>
            <tr>
                <th>Nama Posyandu</th>
                <th></th>
                <th> : </th>
                <th><?= $posyandu['nama_posyandu']; ?></th>
            </tr>
            <tr>
                <th>Desa/Keluarhan</th>
                <th></th>
                <th> : </th>
                <th><?= $wilayah['kelurahan']; ?></th>
            </tr>
            <tr>
                <th>Kecamatan</th>
                <th></th>
                <th> : </th>
                <th><?= $wilayah['kecamatan']; ?></th>
            </tr>
            <!-- <tr>
                <th>Tahun</th>
                <th></th>
                <th> : </th>
                <th></?= $tahun1; ?>/</?= $tahun2; ?></th>
            </tr> -->
        </table>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col" rowspan="4">NO.</th>
                    <th scope="col" rowspan="4">TAHUN</th>
                    <th scope="col" rowspan="4">BULAN</th>
                    <th scope="col" rowspan="4">JML.<br>IBU<br>HAMIL</th>
                    <th scope="col" rowspan="4">DIPERIKSA</th>
                    <th scope="col" rowspan="4">FE TAB<br>(TABLET<br>BESI)</th>
                    <th scope="col" rowspan="4">JML.<br>IBU<br>MENYUSUI</th>
                    <th scope="col" colspan="8">JUMLAH ASEPTOR KB</th>
                    <th scope="col" colspan="12">PENIMBANGAN BALITA</th>
                    <th scope="col" colspan="2">IMUNISASI TT</th>
                    <th scope="col" colspan="24">JUMLAH BAYI<br>YANG DIIMIUNISASI</th>
                    <th scope="col" colspan="4">BALITA YANG<br> MENDERITA DIARE</th>
                    <th scope="col" rowspan="4">FOTO</th>
                    <th scope="col" rowspan="4">KETERANGAN</th>
                </tr>
                <tr>
                    <th scope="col" rowspan="3">K<br>O<br>N<br>D<br>O<br>M</th>
                    <th scope="col" rowspan="3">PIL</th>
                    <th scope="col" rowspan="3">IMPLANT</th>
                    <th scope="col" rowspan="3">M<br>O<br>P</th>
                    <th scope="col" rowspan="3">M<br>O<br>W</th>
                    <th scope="col" rowspan="3">I<br>U<br>D</th>
                    <th scope="col" rowspan="3">SUNTIK</th>
                    <th scope="col" rowspan="3">LAIN-LAIN</th>
                    <th scope="col" rowspan="2" colspan="2">JML.<br>BALITA<br>(S)</th>
                    <th scope="col" rowspan="2" colspan="2">JML.<br>BALITA<br>YANG <br>MEMILIKI<br>KMS(K)</th>
                    <th scope="col" rowspan="2" colspan="2">JML.<br>YANG<br>DITIMBANG(D)</th>
                    <th scope="col" rowspan="2" colspan="2">JML.<br>YANG<br>NAIK(N)</th>
                    <th scope="col" rowspan="2" colspan="2">JML.<br>YANG<br>MENDAPAT<br> VIT. A</th>
                    <th scope="col" rowspan="2" colspan="2">JML.<br>YANG<br>MENDAPAT<br>PMT</th>
                    <th scope="col" colspan="2">IBU<br>HAMIL</th>
                    <th scope="col" rowspan="2" colspan="2">BCG</th>
                    <th scope="col" colspan="6">DPT</th>
                    <th scope="col" colspan="8">POLIO</th>
                    <th scope="col" rowspan="2" colspan="2">CAMPAK</th>
                    <th scope="col" colspan="6">HEPATITIS B</th>
                    <th scope="col" rowspan="2" colspan="2">JUMLAH</th>
                    <th scope="col" rowspan="2" colspan="2">YANG<br>MENDAPAT<br>ORALIT</th>
                </tr>
                <tr>
                    <th scope="col" rowspan="2">I</th>
                    <th scope="col" rowspan="2">II</th>
                    <th scope="col" colspan="2">I</th>
                    <th scope="col" colspan="2">II</th>
                    <th scope="col" colspan="2">III</th>
                    <th scope="col" colspan="2">I</th>
                    <th scope="col" colspan="2">II</th>
                    <th scope="col" colspan="2">III</th>
                    <th scope="col" colspan="2">IV</th>
                    <th scope="col" colspan="2">I</th>
                    <th scope="col" colspan="2">II</th>
                    <th scope="col" colspan="2">III</th>
                </tr>
                <tr>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                $j = 0;
                $k = 0;
                while ($j < $hitung) {
                    while ($k < $hitung) {
                ?>

                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $kegiatanA[$j]['tahun']; ?></td>
                            <td><?= $kegiatanA[$j]['bulan']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_ibu_hamil']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_diperiksa']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_fe_tab']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_ibu_nyusu']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_aseptor_kondom']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_aseptor_pi']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_aseptor_implant']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_aseptor_mop']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_aseptor_mow']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_aseptor_iud']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_aseptor_suntik']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_aseptor_lain']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_balita_s_timbangL']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_balita_s_timbangP']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_balita_kms_timbangL']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_balita_kms_timbangP']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_balita_d_timbangL']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_balita_d_timbangP']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_balita_naik_timbangL']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_balita_naik_timbangP']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_balita_vita_timbangL']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_balita_vita_timbangP']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_balita_pmt_timbangL']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_balita_pmt_timbangP']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_imunisasi_ibu_I']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_imunisasi_ibu_II']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_bcgl']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_bcgp']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_dpt_IL']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_dpt_IP']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_dpt_IIL']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_dpt_IIP']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_dpt_IIIL']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_dpt_IIIP']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_polio_IL']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_polio_IP']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_polio_IIL']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_polio_IIP']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_polio_IIIL']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_polio_IIIP']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_polio_IVL']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_polio_IVP']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_campakL']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_campakP']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_hepat_IL']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_hepat_IP']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_hepat_IIL']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_hepat_IIP']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_hepat_IIIL']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_hepat_IIIP']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_bltdiare_jmL']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_bltdiare_jmP']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_bltdiare_oralitL']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_bltdiare_oralitP']; ?></td>
                            <td><?= $kegiatanB[$k]['Keterangan']; ?></td>
                        </tr>
                <?php
                        $k++;
                        $j++;
                    }
                } ?>
                <tr>
                    <th colspan="3">Jumlah</th>
                    <?php foreach ($totalA as $ta) : ?>
                        <td><?= $ta['totalibuhamil']; ?></td>
                        <td><?= $ta['totaldpriksa']; ?></td>
                        <td><?= $ta['totalfetab']; ?></td>
                        <td><?= $ta['totalibunyusu']; ?></td>
                        <td><?= $ta['totalkondom']; ?></td>
                        <td><?= $ta['totalpi']; ?></td>
                        <td><?= $ta['totalimplant']; ?></td>
                        <td><?= $ta['totalmop']; ?></td>
                        <td><?= $ta['totalmow']; ?></td>
                        <td><?= $ta['totaliud']; ?></td>
                        <td><?= $ta['totalsuntik']; ?></td>
                        <td><?= $ta['totallain']; ?></td>
                        <td><?= $ta['totalbltsL']; ?></td>
                        <td><?= $ta['totalbltsP']; ?></td>
                        <td><?= $ta['totalbltkmsL']; ?></td>
                        <td><?= $ta['totalbltkmsP']; ?></td>
                        <td><?= $ta['totalbltdL']; ?></td>
                        <td><?= $ta['totalbltdP']; ?></td>
                        <td><?= $ta['totalbltNaikL']; ?></td>
                        <td><?= $ta['totalbltNaikP']; ?></td>
                        <td><?= $ta['totalbltvitaL']; ?></td>
                        <td><?= $ta['totalbltvitaP']; ?></td>
                        <td><?= $ta['totalbltpmtL']; ?></td>
                        <td><?= $ta['totalbltpmtP']; ?></td>
                        <td><?= $ta['totalibuI']; ?></td>
                        <td><?= $ta['totalibuII']; ?></td>
                    <?php endforeach; ?>
                    <?php foreach ($totalB as $tb) : ?>
                        <td><?= $tb['totalbcgL']; ?></td>
                        <td><?= $tb['totalbcgP']; ?></td>
                        <td><?= $tb['totaldptIL']; ?></td>
                        <td><?= $tb['totaldptIP']; ?></td>
                        <td><?= $tb['totaldptIIL']; ?></td>
                        <td><?= $tb['totaldptIIP']; ?></td>
                        <td><?= $tb['totaldptIIIL']; ?></td>
                        <td><?= $tb['totaldptIIIP']; ?></td>
                        <td><?= $tb['totalpolioIL']; ?></td>
                        <td><?= $tb['totalpolioIP']; ?></td>
                        <td><?= $tb['totalpolioIIL']; ?></td>
                        <td><?= $tb['totalpolioIIP']; ?></td>
                        <td><?= $tb['totalpolioIIIL']; ?></td>
                        <td><?= $tb['totalpolioIIIP']; ?></td>
                        <td><?= $tb['totalpolioIVL']; ?></td>
                        <td><?= $tb['totalpolioIVP']; ?></td>
                        <td><?= $tb['totalcampakL']; ?></td>
                        <td><?= $tb['totalcampakP']; ?></td>
                        <td><?= $tb['totalhepatIL']; ?></td>
                        <td><?= $tb['totalhepatIP']; ?></td>
                        <td><?= $tb['totalhepatIIL']; ?></td>
                        <td><?= $tb['totalhepatIIP']; ?></td>
                        <td><?= $tb['totalhepatIIIL']; ?></td>
                        <td><?= $tb['totalhepatIIIP']; ?></td>
                        <td><?= $tb['totaldiareL']; ?></td>
                        <td><?= $tb['totaldiareP']; ?></td>
                        <td><?= $tb['totaloralitL']; ?></td>
                        <td><?= $tb['totaloralitP']; ?></td>
                    <?php endforeach ?>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<br><br><br>
<p><b>
        <center>Grafik Kegiatan Posyandu <br>Periode <?= date('d F Y', strtotime($awal)); ?> sampai <?= date('d F Y', strtotime($akhir)); ?></center>
    </b></p>
<canvas id="myLineChart" height="200"></canvas>
<script>
    var warna = ['#c5e417', '#12e20b', '#0dd5f0', '#0b1ae6', '#d10404', '#8f06b1', '#f71bb5', '#94eb6b', '#eba56b', '#6bebb6', '#6badeb', '#5c0000', '#005c4d']
    var ctx = document.getElementById('myLineChart');
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Ibu hamil', 'Diperiksa', 'FE TAB', 'Ibu menyusui', 'Aseptor kondom', 'Aseptor pil', 'Aseptor implant', 'Aseptor MOP', 'Aseptor MOW', 'Aseptor IUD', 'Aseptor suntik', 'Aseptor lain-lain', 'Balita(S)(L)', 'Balita(S)(P)', 'Balita KMS(K)(L)', 'Balita KMS(K)(P)', 'Balita ditimbang(D)(L)', 'Balita ditimbang(D)(P)', 'Balita Naik(N)(L)', 'Balita Naik(N)(P)', 'Balita vit. A(L)', 'Balita vit. A(P)', 'Balita PMT(L)', 'Balita PMT(P)', 'Imunisasi ibu hamil(I)', 'Imunisasi ibu hamil(II)', 'BCG(L)', 'BCG(P)', 'DPT I(L)', 'DPT I(P)', 'DPT II(L)', 'DPT II(P)', 'DPT III(L)', 'DPT III(P)', 'Polio I(L)', 'Polio I(P)', 'Polio II(L)', 'Polio II(P)', 'Polio III(L)', 'Polio III(P)', 'Polio IV(L)', 'Polio IV(P)', 'Campak(L)', 'Campak(P)', 'Hepatitis B I(L)', 'Hepatitis B I(P)', 'Hepatitis B II(L)', 'Hepatitis B II(P)', 'Hepatitis B III(L)', 'Hepatitis B III(P)', 'Balita diare(L)', 'Balita diare(P)', 'Balita oralit(L)', 'Balita oralit(P)'],
            datasets: [
                <?php
                $i = 1;
                $j = 0;
                $k = 0;
                while ($j < $hitung) {
                    while ($k < $hitung) {
                ?> {
                            label: '<?= $kegiatanA[$j]['bulan']; ?>(<?= $kegiatanA[$j]['tahun']; ?>)',
                            fill: false,
                            lineTension: 0.3,
                            backgroundColor: warna[<?= $i; ?>],
                            borderColor: warna[<?= $i; ?>],
                            pointHoverBackgroundColor: warna[<?= $i; ?>],
                            pointHoverBorderColor: warna[<?= $i; ?>],
                            data: [
                                <?= $kegiatanA[$j]['jml_ibu_hamil']; ?>,
                                <?= $kegiatanA[$j]['jml_diperiksa']; ?>,
                                <?= $kegiatanA[$j]['jml_fe_tab']; ?>,
                                <?= $kegiatanA[$j]['jml_ibu_nyusu']; ?>,
                                <?= $kegiatanA[$j]['jml_aseptor_kondom']; ?>,
                                <?= $kegiatanA[$j]['jml_aseptor_pi']; ?>,
                                <?= $kegiatanA[$j]['jml_aseptor_implant']; ?>,
                                <?= $kegiatanA[$j]['jml_aseptor_mop']; ?>,
                                <?= $kegiatanA[$j]['jml_aseptor_mow']; ?>,
                                <?= $kegiatanA[$j]['jml_aseptor_iud']; ?>,
                                <?= $kegiatanA[$j]['jml_aseptor_suntik']; ?>,
                                <?= $kegiatanA[$j]['jml_aseptor_lain']; ?>,
                                <?= $kegiatanA[$j]['jml_balita_s_timbangL']; ?>,
                                <?= $kegiatanA[$j]['jml_balita_s_timbangP']; ?>,
                                <?= $kegiatanA[$j]['jml_balita_kms_timbangL']; ?>,
                                <?= $kegiatanA[$j]['jml_balita_kms_timbangP']; ?>,
                                <?= $kegiatanA[$j]['jml_balita_d_timbangL']; ?>,
                                <?= $kegiatanA[$j]['jml_balita_d_timbangP']; ?>,
                                <?= $kegiatanA[$j]['jml_balita_naik_timbangL']; ?>,
                                <?= $kegiatanA[$j]['jml_balita_naik_timbangP']; ?>,
                                <?= $kegiatanA[$j]['jml_balita_vita_timbangL']; ?>,
                                <?= $kegiatanA[$j]['jml_balita_vita_timbangP']; ?>,
                                <?= $kegiatanA[$j]['jml_balita_pmt_timbangL']; ?>,
                                <?= $kegiatanA[$j]['jml_balita_pmt_timbangP']; ?>,
                                <?= $kegiatanA[$j]['jml_imunisasi_ibu_I']; ?>,
                                <?= $kegiatanA[$j]['jml_imunisasi_ibu_II']; ?>,
                                <?= $kegiatanB[$k]['jml_imunbayi_bcgl']; ?>,
                                <?= $kegiatanB[$k]['jml_imunbayi_bcgp']; ?>,
                                <?= $kegiatanB[$k]['jml_imunbayi_dpt_IL']; ?>,
                                <?= $kegiatanB[$k]['jml_imunbayi_dpt_IP']; ?>,
                                <?= $kegiatanB[$k]['jml_imunbayi_dpt_IIL']; ?>,
                                <?= $kegiatanB[$k]['jml_imunbayi_dpt_IIP']; ?>,
                                <?= $kegiatanB[$k]['jml_imunbayi_dpt_IIIL']; ?>,
                                <?= $kegiatanB[$k]['jml_imunbayi_dpt_IIIP']; ?>,
                                <?= $kegiatanB[$k]['jml_imunbayi_polio_IL']; ?>,
                                <?= $kegiatanB[$k]['jml_imunbayi_polio_IP']; ?>,
                                <?= $kegiatanB[$k]['jml_imunbayi_polio_IIL']; ?>,
                                <?= $kegiatanB[$k]['jml_imunbayi_polio_IIP']; ?>,
                                <?= $kegiatanB[$k]['jml_imunbayi_polio_IIIL']; ?>,
                                <?= $kegiatanB[$k]['jml_imunbayi_polio_IIIP']; ?>,
                                <?= $kegiatanB[$k]['jml_imunbayi_polio_IVL']; ?>,
                                <?= $kegiatanB[$k]['jml_imunbayi_polio_IVP']; ?>,
                                <?= $kegiatanB[$k]['jml_imunbayi_campakL']; ?>,
                                <?= $kegiatanB[$k]['jml_imunbayi_campakP']; ?>,
                                <?= $kegiatanB[$k]['jml_imunbayi_hepat_IL']; ?>,
                                <?= $kegiatanB[$k]['jml_imunbayi_hepat_IP']; ?>,
                                <?= $kegiatanB[$k]['jml_imunbayi_hepat_IIL']; ?>,
                                <?= $kegiatanB[$k]['jml_imunbayi_hepat_IIP']; ?>,
                                <?= $kegiatanB[$k]['jml_imunbayi_hepat_IIIL']; ?>,
                                <?= $kegiatanB[$k]['jml_imunbayi_hepat_IIIP']; ?>,
                                <?= $kegiatanB[$k]['jml_bltdiare_jmL']; ?>,
                                <?= $kegiatanB[$k]['jml_bltdiare_jmP']; ?>,
                                <?= $kegiatanB[$k]['jml_bltdiare_oralitL']; ?>,
                                <?= $kegiatanB[$k]['jml_bltdiare_oralitP']; ?>
                            ],
                        },
                <?php
                        $i++;
                        $k++;
                        $j++;
                    }
                } ?>
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
<a href="/users/rangekegiatanposyandu/<?= $kdposyandu; ?>" class="btn btn-danger">Kembali</a>
<?= $this->endSection(); ?>