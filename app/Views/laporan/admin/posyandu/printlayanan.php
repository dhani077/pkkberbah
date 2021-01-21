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
    <table>
        <tr>
            <td><b>Kelurahan</b></td>
            <th></th>
            <th>:</th>
            <td><b><?= $kelurahan; ?></b></td>
            <th width="180px"></th>
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
            <th width="180px"></th>
            <td><b>Provinsi</b></td>
            <th></th>
            <th>:</th>
            <td><b><?= $provinsi; ?></b></td>
        </tr>
    </table>
    <br>

    <table>
        <tr>
            <td><b>Nama Posyandu</b></td>
            <th> : </th>
            <td><b><?= $posyandu['nama_posyandu']; ?></b></td>
        </tr>
        <tr>
            <td><b>Pengelola</b></td>
            <th> : </th>
            <td><b><?= $posyandu['pengelola']; ?></b></td>
        </tr>
        <tr>
            <td><b>Sekretaris</b></td>
            <th> : </th>
            <td><b><?= $posyandu['sekretaris']; ?></b></td>
        </tr>
        <tr>
            <td><b>Jenis posyandu</b></td>
            <th> : </th>
            <td><b><?= $posyandu['jns_posyandu']; ?></b></td>
        </tr>
        <tr>
            <td><b>Jumlah kader</b></td>
            <th> : </th>
            <td><b><?= $posyandu['jml_kader']; ?></b></td>
        </tr>
    </table>

    <table rules="all" border="1" cellpadding="5px" style="width: 700px; font-size: 12px;">
        <thead>
            <tr>
                <th scope="col" rowspan="3">NO.</th>
                <th scope="col" rowspan="3">JENIS KEGIATAN/LAYANAN</th>
                <th scope="col" rowspan="3">FREKWENSI<br>LAYANAN</th>
                <th scope="col" colspan="4">JUMLAH</th>
                <th scope="col" rowspan="3">KETERANGAN</th>
            </tr>
            <tr>
                <th scope="col" colspan="2">PENGUNJUNG</th>
                <th scope="col" colspan="2">PETUGAS/PARAMEDIS</th>
            </tr>
            <tr>
                <th>L</th>
                <th>P</th>
                <th>L</th>
                <th>P</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($layanan as $k) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $k['jns_kegiatan']; ?></td>
                    <td><?= $k['frekwensi_layanan']; ?></td>
                    <td><?= $k['jml_pengunjung_L']; ?></td>
                    <td><?= $k['jml_pengunjung_P']; ?></td>
                    <td><?= $k['jml_petugas_L']; ?></td>
                    <td><?= $k['jml_petugas_P']; ?></td>
                    <td><?= $k['keterangan']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>