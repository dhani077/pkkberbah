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

    <h3 style="width: 750px; text-align: center;">Kejar Paket</h3>
    <table>
        <tr>
            <td><b>Kelurahan</b></td>
            <th></th>
            <th>:</th>
            <td><b><?= $kelurahan; ?></b></td>
            <th width="250px"></th>
            <td><b>Kecamatan</b></td>
            <th></th>
            <th>:</th>
            <td><b><?= $kecamatan; ?></b></td>
        </tr>
        <tr>
            <td><b>Kab/Kota</b></td>
            <th></th>
            <th>:</th>
            <td><b><?= $kabupaten; ?></b></td>
            <th width="250px"></th>
            <td><b>Provinsi</b></td>
            <th></th>
            <th>:</th>
            <td><b><?= $provinsi; ?></b></td>
        </tr>
        <table style="width: 750px; font-size: 12px;" rules="all" border="1" cellpadding="5px">
            <thead>
                <tr>
                    <th scope="col" rowspan="2">NO.</th>
                    <th scope="col" rowspan="2">NAMA KEJAR PAKET/KF/PAUD</th>
                    <th scope="col" rowspan="2">JENIS PAKET<br>(A/B/C/KF/PAUD)</th>
                    <th scope="col" rowspan="2">TANGGAL MULAI</th>
                    <th scope="col" colspan="2">JUMLAH WARGA<br>BELAJAR/SISWA</th>
                    <th scope="col" colspan="2">JUMLAH PENGAJAR</th>
                </tr>
                <tr>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($kejarpaket as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['nama_paket']; ?></td>
                        <td><?= $k['jns_paket']; ?></td>
                        <td><?= $k['tgl_mulai']; ?></td>
                        <td><?= $k['jml_wrg_bljr_L']; ?></td>
                        <td><?= $k['jml_wrg_bljr_P']; ?></td>
                        <td><?= $k['jml_pengajar_L']; ?></td>
                        <td><?= $k['jml_pengajar_P']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>