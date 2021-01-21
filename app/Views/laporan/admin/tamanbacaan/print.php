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
            <th style="width: 160px;"></th>
            <th>Taman Bacaan/Perpustakaan</th>
        </tr>
    </table>
    <br>
    <table style="font-size: 14px;">
        <tr>
            <td><b>Kelurahan</b></td>
            <th></th>
            <th>:</th>
            <td><b><?= $kelurahan; ?></b></td>
            <th width="190px"></th>
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
            <th width="190px"></th>
            <td><b>Provinsi</b></td>
            <th></th>
            <th>:</th>
            <td><b><?= $provinsi; ?></b></td>
        </tr>
    </table>
    <br>
    <table style="font-size: 12px;">
        <tr>
            <td><b>Nama Taman Bacaan/Perpustakaan</b></td>
            <th></th>
            <th>:</th>
            <td><b><?= $taman['nama_taman']; ?></b></td>
        </tr>
        <tr>
            <td><b>Nama Pengelola</b></td>
            <th></th>
            <th>:</th>
            <td><b><?= $taman['pengelola']; ?></b></td>
        </tr>
        <tr>
            <td><b>Jumlah Buku Bacaan</b></td>
            <th></th>
            <th>:</th>
            <td><b><?= $taman['jml_buku']; ?> buku</b></td>
        </tr>
        <tr>
            <td><b>Jenis Buku Bacaan</b></td>
            <th></th>
            <th>:</th>
        </tr>
    </table>
    <br>

    <table rules="all" border="1" cellpadding="5px" style=" width: 600px; font-size: 12px;">
        <thead>
            <tr>
                <th scope="col">NO.</th>
                <th scope="col">JENIS BUKU</th>
                <th scope="col">KATEGORI</th>
                <th scope="col">JUMLAH</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($buku as $k) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $k['jns_buku']; ?></td>
                    <td><?= $k['kategori']; ?></td>
                    <td><?= $k['jumlah']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>