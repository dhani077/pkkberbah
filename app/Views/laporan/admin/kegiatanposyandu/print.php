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
        <h3 style="padding-left: 70px;">Kegiatan Posyandu</h3>
    </center>
    <table>
        <tr>
            <td><b>Nama Posyandu</b></td>
            <th></th>
            <th> : </th>
            <td><b><?= $posyandu['nama_posyandu']; ?></b></td>
        </tr>
        <tr>
            <td><b>Desa/Keluarhan</b></td>
            <th></th>
            <th> : </th>
            <td><b><?= $wilayah['kelurahan']; ?></b></td>
        </tr>
        <tr>
            <td><b>Kecamatan</b></td>
            <th></th>
            <th> : </th>
            <td><b><?= $wilayah['kecamatan']; ?></b></td>
        </tr>
    </table>
    </div>
    <table rules="all" border="1" cellpadding="5px" style="font-size: 12px;">
        <thead>
            <tr>
                <th scope="col" rowspan="4">NO.</th>
                <th scope="col" rowspan="4">TAHUN</th>
                <th scope="col" rowspan="4">BULAN</th>
                <th scope="col" rowspan="4">JML.<br>IBU<br>HAMIL</th>
                <th scope="col" rowspan="4">DI<br>PE<br>RIK<br>SA</th>
                <th scope="col" rowspan="4">FE TAB<br>(TABLET<br>BESI)</th>
                <th scope="col" rowspan="4">JML.<br>IBU<br>ME-<br>NYUSUI</th>
                <th scope="col" colspan="8">JUMLAH ASEPTOR KB</th>
                <th scope="col" colspan="12">PENIMBANGAN BALITA</th>
                <th scope="col" colspan="2">IMUNISASI TT</th>
                <th scope="col" colspan="24">JUMLAH BAYI<br>YANG DIIMIUNISASI</th>
                <th scope="col" colspan="4">BALITA YANG<br> MENDERITA DIARE</th>
                <th scope="col" rowspan="4">KETERANGAN</th>
            </tr>
            <tr>
                <th scope="col" rowspan="3">K<br>O<br>N<br>D<br>O<br>M</th>
                <th scope="col" rowspan="3">P<br>I<br>L</th>
                <th scope="col" rowspan="3">I<br>M<br>P<br>L<br>A<br>N<br>T</th>
                <th scope="col" rowspan="3">M<br>O<br>P</th>
                <th scope="col" rowspan="3">M<br>O<br>W</th>
                <th scope="col" rowspan="3">I<br>U<br>D</th>
                <th scope="col" rowspan="3">S<br>U<br>N<br>T<br>I<br>K</th>
                <th scope="col" rowspan="3">LAIN-LAIN</th>
                <th scope="col" rowspan="2" colspan="2">JML.<br>BALITA<br>(S)</th>
                <th scope="col" rowspan="2" colspan="2">JML.<br>BALITA<br>YANG <br>MEMILIKI<br>KMS(K)</th>
                <th scope="col" rowspan="2" colspan="2">JML.<br>YANG<br>DITIMBANG<br>(D)</th>
                <th scope="col" rowspan="2" colspan="2">JML.<br>YANG<br>NAIK<br>(N)</th>
                <th scope="col" rowspan="2" colspan="2">JML.<br>YANG<br>MEN<br>DAPAT<br> VIT. A</th>
                <th scope="col" rowspan="2" colspan="2">JML.<br>YANG<br>MEN<br>DAPAT<br>PMT</th>
                <th scope="col" colspan="2">IBU<br>HAMIL</th>
                <th scope="col" rowspan="2" colspan="2">BCG</th>
                <th scope="col" colspan="6">DPT</th>
                <th scope="col" colspan="8">POLIO</th>
                <th scope="col" rowspan="2" colspan="2">CAMPAK</th>
                <th scope="col" colspan="6">HEPATITIS B</th>
                <th scope="col" rowspan="2" colspan="2">JUMLAH</th>
                <th scope="col" rowspan="2" colspan="2">YANG<br>MEN<br>DAPAT<br>ORALIT</th>
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
            <?php $i = 1; ?>
            <?php
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
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>