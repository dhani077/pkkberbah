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
            layout: landscape;
        }

        title {
            display: nonne;
        }
    }
</style>

<body>
    <div class="col">
        <table style="margin-left: 380px;">
            <thead>
                <tr>
                    <th>
                        Rekapitulasi Data<br>Ibu Hamil, Melahirkan, Nifas, Meninggal, Kelahiran Bayi,<br> Bayi Meninggal Dan Kematian Balita
                    </th>
                </tr>
            </thead>
        </table>
        <table>
            <tr>
                <td><b>Kecamatan</b></td>
                <th></th>
                <th>:</th>
                <td><b><?= $kecamatan; ?></b></td>
            </tr>
            <tr>
                <td><b>Kab/Kota</b></td>
                <th></th>
                <th> : </th>
                <td><b><?= $kabupaten; ?></b></td>
            </tr>
            <tr>
                <td><b>Provinsi</b></td>
                <th></th>
                <th> : </th>
                <td><b><?= $provinsi; ?></b></td>
            </tr>
        </table>
        <table rules="all" border="1" cellpadding="5px" style="font-size: 14px;">
            <thead>
                <tr>
                    <th scope="col" rowspan="3">NO.</th>
                    <th scope="col" rowspan="3">NAMA DESA/<br>KELURAHAN</th>
                    <th scope="col" rowspan="3">TAHUN</th>
                    <th scope="col" rowspan="3">BULAN</th>
                    <th scope="col" colspan="4">JUMLAH</th>
                    <th scope="col" rowspan="2" colspan="4">JUMLAH IBU</th>
                    <th scope="col" colspan="6">JUMLAH BAYI</th>
                    <th scope="col" colspan="2" rowspan="2">JUMLAH BALITA<br>MENINGGAL</th>
                    <th scope="col" rowspan="3">KETERANGAN</th>
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
                        <td><?= $k['tahun']; ?></td>
                        <td><?= $k['bulan']; ?></td>
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
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <th colspan="4">Jumlah</th>
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
                </tr>
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>