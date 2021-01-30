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
    <h3 style="width: 600px; text-align: center;">
        Industri Rumah Tangga
    </h3>
    <table style="width: 600px; font-size: 12px;" rules="all" border="1" cellpadding="5px">
        <thead>
            <tr>
                <th scope="col">NO.</th>
                <th scope="col">KATEGORI</th>
                <th scope="col">KOMODITI</th>
                <th scope="col">VOLUME</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($industrirt as $k) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $k['kategori']; ?></td>
                    <td><?= $k['komoditi']; ?></td>
                    <td><?= $k['volume']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>