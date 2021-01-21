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
            <th style="width: 270px;"></th>
            <th>Surat Masuk</th>
        </tr>
    </table>
    <br>

    <table rules="all" border="1" cellpadding="5px" style="font-size: 12px;">
        <thead>
            <tr>
                <th scope="col" rowspan="2">NO.</th>
                <th scope="col" colspan="2">TANGGAL</th>
                <th scope="col" rowspan="2">NOMOR SURAT</th>
                <th scope="col" rowspan="2">ASAL SURAT DARI</th>
                <th scope="col" rowspan="2">PERIHAL</th>
                <th scope="col" rowspan="2">LAMPIRAN</th>
                <th scope="col" rowspan="2">DITERUSKAN KEPADA</th>
            </tr>
            <tr>
                <th scope="col">TERIMA SURAT</th>
                <th scope="col">SURAT</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($suratmasuk as $k) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $k['tgl_terima']; ?></td>
                    <td><?= $k['tgl_surat']; ?></td>
                    <td><?= $k['no_surat']; ?></td>
                    <td><?= $k['asal_surat']; ?></td>
                    <td><?= $k['perihal']; ?></td>
                    <td><?= $k['lampiran']; ?></td>
                    <td><?= $k['teruskan_kpd']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>