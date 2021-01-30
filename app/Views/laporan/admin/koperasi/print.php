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
            <th>
                <h3>Koperasi</h3>
            </th>
        </tr>
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
        <table style="font-size: 12px;" rules="all" border="1" cellpadding="5px">
            <thead>
                <tr>
                    <th scope="col" rowspan="2">NO.</th>
                    <th scope="col" rowspan="2">NAMA KOPERASI</th>
                    <th scope="col" rowspan="2">JENIS KOPERASI</th>
                    <th scope="col" colspan="2">STATUS HUKUM</th>
                    <th scope="col" colspan="2">JUMLAH ANGGOTA</th>
                </tr>
                <tr>
                    <th scope="col">BERBADAN HUKUM</th>
                    <th scope="col">BELUM BERBADAN HUKUM</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($koperasi as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['nama_koperasi']; ?></td>
                        <td><?= $k['jns_koperasi']; ?></td>
                        <td><?= $k['status_hkm_yes']; ?></td>
                        <td><?= $k['status_hkm_non']; ?></td>
                        <td><?= $k['jml_anggota_L']; ?></td>
                        <td><?= $k['jml_anggota_P']; ?></td>
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