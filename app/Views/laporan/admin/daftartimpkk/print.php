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

    <table width="1300px">
        <thead>
            <tr>
                <th>
                    <h3>Daftar Angggota Tim Penggerak PKK</h3>
                </th>
            </tr>
        </thead>
    </table>
    <br>
    <table>
        <tr>
            <td><b>Kelurahan</b></td>
            <th></th>
            <th>:</th>
            <td><b><?= $kelurahan; ?></b></td>
            <th width="600px"></th>
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
            <th width="600px"></th>
            <td><b>Provinsi</b></td>
            <th></th>
            <th>:</th>
            <td><b><?= $provinsi; ?></b></td>
        </tr>
    </table>

    <table rules="all" border="1" cellpadding="5px" style="width: 1300px; font-size: 14px;">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">NAMA</th>
                <th scope="col">TANGGAL MASUK<br>ANGGOTA</th>
                <th scope="col">JABATAN</th>
                <th scope="col">JENIS<br>KELAMIN</th>
                <th scope="col">TEMPAT LAHIR</th>
                <th scope="col">TANGGAL/BULAN<br>/TH.LAHIR/UMUR</th>
                <th scope="col">STATUS</th>
                <th scope="col">ALAMAT</th>
                <th scope="col">PENDIDIKAN</th>
                <th scope="col">PEKERJAAN</th>
                <th scope="col">FOTO</th>
                <th scope="col">KETERANGAN</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($daftartimpkk as $k) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $k['nama']; ?></td>
                    <td><?= $k['tgl_masuk']; ?></td>
                    <td><?= $k['jabatan']; ?></td>
                    <td><?= $k['jk']; ?></td>
                    <td><?= $k['tempat_lahir']; ?></td>
                    <td><?= $k['tgl_lahir']; ?></td>
                    <td><?= $k['status']; ?></td>
                    <td><?= $k['alamat']; ?></td>
                    <td><?= $k['pendidikan']; ?></td>
                    <td><?= $k['pekerjaan']; ?></td>
                    <td>
                        <?php if ($k['foto']) : ?>
                            <a href="/img/<?= $k['foto']; ?>">
                                <img src="/img/<?= $k['foto']; ?>" width="180px">
                            </a>
                        <?php endif; ?>
                        <?php if ($k['foto'] == '') : ?>
                            tidak ada
                        <?php endif; ?>
                    </td>
                    <td><?= $k['keterangan']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>