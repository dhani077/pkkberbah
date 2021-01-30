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
            margin-left: 120px;
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
                <h4 style="width: 600px; text-align: center;">Pemanfaatan Tanah Pekarangan/Hatinya PKK</h4>
            </th>
        </tr>
        <table style="width: 600px; font-size: 12px;" rules="all" border="1" cellpadding="5px">
            <thead>
                <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">KATEGORI</th>
                    <th scope="col">KOMODITI</th>
                    <th scope="col">JUMLAH</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($manfaattanah as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['kategori']; ?></td>
                        <td><?= $k['komoditi']; ?></td>
                        <td><?= $k['jumlah']; ?></td>
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