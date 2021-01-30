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
            <th>Surat Keluar</th>
        </tr>
    </table>
    <br>

    <table rules="all" border="1" cellpadding="5px" style="font-size: 12px;">
        <thead>
            <tr>
                <th scope="col">NO.</th>
                <th scope="col">NOMOR DAN KODE SURAT</th>
                <th scope="col">TANGGAL SURAT</th>
                <th scope="col">KEPADA</th>
                <th scope="col">PERIHAL</th>
                <th scope="col">LAMPIRAN</th>
                <th scope="col">TEMBUSAN</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($suratkeluar as $k) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $k['no_surat']; ?></td>
                    <td><?= $k['tgl_surat']; ?></td>
                    <td><?= $k['kepada']; ?></td>
                    <td><?= $k['perihal']; ?></td>
                    <td><?= $k['lampiran']; ?></td>
                    <td><?= $k['tembusan']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>