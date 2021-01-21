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
    <div class="col">
        <h4 style="width: 1300px; text-align: center;">
            Kegiatan Lain-lain
        </h4>
        <table rules="all" border="1" cellpadding="5px" style="font-size: 12px;">
            <thead>
                <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">NAMA KEGIATAN</th>
                    <th scope="col">TEMPAT PELAKSANAAN</th>
                    <th scope="col">TANGGAL</th>
                    <th scope="col">FOTO</th>
                    <th scope="col">VIDEO</th>
                    <th scope="col">KETERANGAN</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($kegiatanlain as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['nama_kegiatan']; ?></td>
                        <td><?= $k['tempat_pelaksanaan']; ?></td>
                        <td><?= $k['tgl_pelaksanaan']; ?></td>
                        <td>
                            <a href="/img/<?= $k['foto']; ?>">
                                <img src="/img/<?= $k['foto']; ?>" width="180px">
                            </a>
                        </td>
                        <td>
                            <?php if ($k['video']) : ?>
                                <a href="/img/<?= $k['video']; ?>">
                                    <video src="/img/<?= $k['video']; ?>" width="180px">
                                </a>
                            <?php endif; ?>
                            <?php if ($k['video'] == '') : ?>
                                tidak ada
                            <?php endif; ?>
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