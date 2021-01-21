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
    <table style="width: 900px;">
        <tr>
            <th>
                <h4>
                    Buku Kegiatan
                </h4>
            </th>
        </tr>
    </table>
    <table rules="all" border="1" cellpadding="5px" style="font-size: 12px; width: 900px;">
        <thead>
            <tr>
                <th scope="col" rowspan="2">NO.</th>
                <th scope="col" rowspan="2">NAMA</th>
                <th scope="col" rowspan="2">JABATAN</th>
                <th scope="col" colspan="3">KEGIATAN</th>
                <th scope="col" rowspan="2">FOTO KEGIATAN</th>
            </tr>
            <tr>
                <th scope="col">TANGGAL</th>
                <th scope="col">TEMPAT</th>
                <th scope="col">URAIAN</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($bukukegiatan as $k) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $k['nama']; ?></td>
                    <td><?= $k['jabatan']; ?></td>
                    <td><?= $k['tgl_kegiatan']; ?></td>
                    <td><?= $k['tempat_kegiatan']; ?></td>
                    <td><?= $k['uraian_kegiatan']; ?></td>
                    <?php if ($k['foto'] != '') : ?>
                        <td>
                            <a href="/img/<?= $k['foto']; ?>">
                                <img src="/img/<?= $k['foto']; ?>" class="card-img" width="60px">
                            </a>
                        </td>
                    <?php endif;
                    if ($k['foto'] == '') : ?>
                        <td>Tidak ada foto</td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>