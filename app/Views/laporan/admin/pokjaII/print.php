<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dokumen</title>
</head>
<style>
    @media print {
        @page {
            margin-top: 30px;
            margin-bottom: 10px;
        }

        title {
            display: nonne;
        }
    }
</style>

<body>
    <center>
        <h3>Data Kegiatan PKK</h3>
        <h4>TP. PKK : Kecamatan Berbah<br>Tahun : <?= $tahun1; ?>/<?= $tahun2; ?></h4>
    </center>
    <br>
    <table>
        <tr>
            <td><b>Pokja II</b></td>
        </tr>
    </table>
    <table rules="all" border="1" cellpadding="5px" style="font-size: 12px;">
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
                <th scope="col" rowspan="3">JML. <br>TAMAN <br>BACAAN/<br>PERPUS<br>TAKAAN</th>
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
                <th scope="col" rowspan="2">JML.<br>KLP.</th>
                <th scope="col" rowspan="2">JML. IBU<br>PESERTA</th>
                <th scope="col" rowspan="2">JML. APE(set)</th>
                <th scope="col" rowspan="2">JML.<br>KLP.<br>SIMULASI</th>
                <th scope="col" colspan="2">TUTO</th>
                <th scope="col" rowspan="2">BKB</th>
                <th scope="col" rowspan="2">KO<br>PE<br>RA<br>SI</th>
                <th scope="col" rowspan="2">KETE<br>RAM<br>PILAN</th>
                <th scope="col" rowspan="2">LP3 PKK</th>
                <th scope="col" rowspan="2">TPK 3 PKK</th>
                <th scope="col" rowspan="2">DAMAS PKK</th>
                <th scope="col" colspan="2">PEMULA</th>
                <th scope="col" colspan="2">MADYA</th>
                <th scope="col" colspan="2">UTAMA</th>
                <th scope="col" colspan="2">MANDIRI</th>
                <th scope="col" rowspan="2">JML.<br>KLP.</th>
                <th scope="col" rowspan="2">JML.<br>ANGGOTA</th>
            </tr>
            <tr>
                <th scope="col">JML. KLP.<br>BELA<br>JAR</th>
                <th scope="col">WARGA<br>BELA<br>JAR</th>
                <th scope="col">JML. KLP.<br>BELA<br>JAR</th>
                <th scope="col">WARGA<br>BELA<br>JAR</th>
                <th scope="col">JML. KLP.<br>BELA<br>JAR</th>
                <th scope="col">WARGA<br>BELA<br>JAR</th>
                <th scope="col">JML.</th>
                <th scope="col">WARGA<br>BELA<br>JAR</th>

                <th scope="col">KF</th>
                <th scope="col">PAUD SEJENIS</th>
                <th scope="col">JML.<br>KLP.</th>
                <th scope="col">PE<br>SER<br>TA</th>
                <th scope="col">JML.<br>KLP.</th>
                <th scope="col">PE<br>SER<br>TA</th>
                <th scope="col">JML.<br>KLP.</th>
                <th scope="col">PE<br>SER<br>TA</th>
                <th scope="col">JML.<br>KLP.</th>
                <th scope="col">PE<br>SER<br>TA</th>
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
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>