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
            <th style="width: 220px;"></th>
            <th>Uang Masuk</th>
        </tr>
    </table>
    <br>

    <table rules="all" border="1" cellpadding="5px" style=" width: 600px; font-size: 12px;">
        <thead>
            <tr>
                <th scope="col">NO.</th>
                <th scope="col">TANGGAL, BULAN, TAHUN</th>
                <th scope="col">SUMBER DANA</th>
                <th scope="col">URAIAN</th>
                <th scope="col">NOMOR BUKTI KAS</th>
                <th scope="col">JUMLAH<br>PENERIMAAN(.Rp)</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($uangmasuk as $k) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $k['tanggal']; ?></td>
                    <td><?= $k['sumber_dana']; ?></td>
                    <td><?= $k['uraian']; ?></td>
                    <td><?= $k['no_bukti']; ?></td>
                    <td>Rp. <?= $k['jml_terima']; ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th colspan="5">Jumlah</th>
                <?php foreach ($total as $t) : ?>
                    <th>Rp. <?= $t['total']; ?></th>
                <?php
                endforeach;
                ?>
            </tr>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>