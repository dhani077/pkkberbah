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
    <div class="col">
        <h3 style="width: 900px; text-align: center;">
            Data Inventaris
        </h3>
        <table style="font-size: 12px;" rules="all" border="1" cellpadding="5px">
            <thead>
                <th>NO.</th>
                <th>NAMA BARANG</th>
                <th>ASAL BARANG</th>
                <th>TANGGAL PENERIMAAN<br>PEMBELIAN</th>
                <th>JUMLAH</th>
                <th>TEMPAT PENYIMPANAN</th>
                <th>KONDISI BARANG</th>
                <th>FOTO</th>
                <th>KETERANGAN</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($bukuinven as $k) : ?>
                    <tr>
                        <th><?= $i++; ?></th>
                        <td><?= $k['nama_brg']; ?></td>
                        <td><?= $k['asal_brg']; ?></td>
                        <td><?= $k['tgl_terima_beli']; ?></td>
                        <td><?= $k['jumlah']; ?></td>
                        <td><?= $k['tempat_simpan']; ?></td>
                        <td><?= $k['kondisi_brg']; ?></td>
                        <td>
                            <?php if ($k['foto'] != '') { ?>
                                <a href="/img/<?= $k['foto']; ?>">
                                    <img src="/img/<?= $k['foto']; ?>" class="card-img" width="50px">
                                </a>
                            <?php } elseif ($k['foto'] == '') { ?>
                                Foto tidak ada
                            <?php } ?>
                        </td>
                        <td><?= $k['keterangan']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>