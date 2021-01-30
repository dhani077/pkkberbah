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
    <table style="width: 1100px;">
        <tr>
            <th>
                <h3>
                    Jumlah Pengunjung / Jumlah Petugas Posyandu /<br>Jumlah Bayi Lahir/Meninggal
                </h3>
            </th>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <td><b>Nama posyandu</b></td>
            <th></th>
            <th> : </th>
            <td><b><?= $namapos; ?></b></td>
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
    <table style="width: 1100px; font-size: 12px;" rules="all" border="1" cellpadding="5px">
        <thead>
            <tr>
                <th scope="col" rowspan="5">NO.</th>
                <th scope="col" rowspan="5">TAHUN</th>
                <th scope="col" rowspan="5">BULAN</th>
                <th scope="col" colspan="12">JUMLAH PENGUNJUNG</th>
                <th scope="col" colspan="6">JUMLAH PETUGAS YANG HADIR</th>
                <th scope="col" colspan="4">JUMLAH BAYI</th>
                <th scope="col" rowspan="5">KETERANGAN</th>
            </tr>
            <tr>
                <th scope="col" colspan="8">BALITA</th>
                <th scope="col" rowspan="4">WUS</th>
                <th scope="col" colspan="3">IBU</th>
                <th scope="col" rowspan="3" colspan="2">KADER</th>
                <th scope="col" rowspan="3" colspan="2">PLKB</th>
                <th scope="col" rowspan="3" colspan="2">MEDIS DAN<br>PARA MEDIS</th>
                <th scope="col" rowspan="3" colspan="2">YANG<br>LAHIR</th>
                <th scope="col" rowspan="3" colspan="2">MENINGGAL</th>
            </tr>
            <tr>
                <th scope="col" colspan="4">0-12 BLN</th>
                <th scope="col" colspan="4">1-5 TH</th>
                <th scope="col" rowspan="3">PUS</th>
                <th scope="col" rowspan="3">HAMIL</th>
                <th scope="col" rowspan="3">MENYUSUI</th>
            </tr>
            <tr>
                <th scope="col" colspan="2">BARU</th>
                <th scope="col" colspan="2">LAMA</th>
                <th scope="col" colspan="2">BARU</th>
                <th scope="col" colspan="2">LAMA</th>
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
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($datapengunjung as $k) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $k['tahun']; ?></td>
                    <td><?= $k['bulan']; ?></td>
                    <td><?= $k['jml_pengunjung_sthun_baruL']; ?></td>
                    <td><?= $k['jml_pengunjung_sthun_baruP']; ?></td>
                    <td><?= $k['jml_pengunjung_sthun_lamaL']; ?></td>
                    <td><?= $k['jml_pengunjung_sthun_lamaP']; ?></td>
                    <td><?= $k['jml_pengunjung_limath_baruL']; ?></td>
                    <td><?= $k['jml_pengunjung_limath_baruP']; ?></td>
                    <td><?= $k['jml_pengunjung_limath_lamaL']; ?></td>
                    <td><?= $k['jml_pengunjung_limath_lamaP']; ?></td>
                    <td><?= $k['jml_pengunjung_wus']; ?></td>
                    <td><?= $k['jml_pengunjung_pus_ibu']; ?></td>
                    <td><?= $k['jml_pengunjung_hamil_ibu']; ?></td>
                    <td><?= $k['jml_pengunjung_nyusu_ibu']; ?></td>
                    <td><?= $k['jml_hadir_kader_l']; ?></td>
                    <td><?= $k['jml_hadir_kader_p']; ?></td>
                    <td><?= $k['jml_hadir_plkb_l']; ?></td>
                    <td><?= $k['jml_hadir_plkb_p']; ?></td>
                    <td><?= $k['jml_hadir_medis_l']; ?></td>
                    <td><?= $k['jml_hadir_medis_p']; ?></td>
                    <td><?= $k['jml_bayi_lahirL']; ?></td>
                    <td><?= $k['jml_bayi_lahirP']; ?></td>
                    <td><?= $k['jml_bayi_mnglL']; ?></td>
                    <td><?= $k['jml_bayi_mnglP']; ?></td>
                    <td><?= $k['keterangan']; ?></td>

                </tr>
            <?php endforeach; ?>
            <tr>
                <th colspan="3">Jumlah</th>
                <?php foreach ($total as $t) : ?>
                    <td><?= $t['totalbarustL']; ?></td>
                    <td><?= $t['totalbarustP']; ?></td>
                    <td><?= $t['totallamastL']; ?></td>
                    <td><?= $t['totallamastP']; ?></td>
                    <td><?= $t['totalbarulmL'] ?></td>
                    <td><?= $t['totalbarulmP']; ?></td>
                    <td><?= $t['totallamalmL']; ?></td>
                    <td><?= $t['totallamalmP']; ?></td>
                    <td><?= $t['totalwus']; ?></td>
                    <td><?= $t['totalpus']; ?></td>
                    <td><?= $t['totalhamil']; ?></td>
                    <td><?= $t['totalnyusu']; ?></td>
                    <td><?= $t['totalkaderL']; ?></td>
                    <td><?= $t['totalkaderP']; ?></td>
                    <td><?= $t['totalplkbL']; ?></td>
                    <td><?= $t['totalplkbP']; ?></td>
                    <td><?= $t['totalmedisL']; ?></td>
                    <td><?= $t['totalmedisP']; ?></td>
                    <td><?= $t['totallahirL']; ?></td>
                    <td><?= $t['totallahirP']; ?></td>
                    <td><?= $t['totalmnglL']; ?></td>
                    <td><?= $t['totalmnglP']; ?></td>
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