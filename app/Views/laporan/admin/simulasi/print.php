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
            <th style="width: 200px;"></th>
            <th>Kelompok Simulasi Dan Penyuluhan</th>
        </tr>
    </table>
    <br>
    <table style="font-size: 14px;">
        <tr>
            <td><b>Kelurahan</b></td>
            <th></th>
            <th>:</th>
            <td><b><?= $kelurahan; ?></b></td>
            <th width="200px"></th>
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
            <th width="200px"></th>
            <td><b>Provinsi</b></td>
            <th></th>
            <th>:</th>
            <td><b><?= $provinsi; ?></b></td>
        </tr>
    </table>
    <br>

    <table rules="all" border="1" cellpadding="5px" style="font-size: 12px;">
        <thead>
            <tr>
                <th scope="col" rowspan="2">NO.</th>
                <th scope="col" rowspan="2">NAMA KEGIATAN</th>
                <th scope="col" rowspan="2">JENIS SIMULASI/PENYULUHAN</th>
                <th scope="col" rowspan="2">TANGGAL<br>PELAKSANAAN</th>
                <th scope="col" colspan="2">JUMLAH</th>
                <th scope="col" colspan="2">JUMLAH KADER</th>
            </tr>
            <tr>
                <th scope="col">KELOMPOK</th>
                <th scope="col">SOSIALISASI</th>
                <th scope="col">L</th>
                <th scope="col">P</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($simulasi as $k) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $k['nama_kegiatan']; ?></td>
                    <td><?= $k['jns_simulasi']; ?></td>
                    <td><?= $k['tanggal']; ?></td>
                    <td><?= $k['jml_klp']; ?></td>
                    <td><?= $k['jml_sosialisasi']; ?></td>
                    <td><?= $k['jml_kader_L']; ?></td>
                    <td><?= $k['jml_kader_P']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>