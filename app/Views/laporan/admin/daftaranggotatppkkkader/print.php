<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dokumen</title>
    <!-- Required meta tags -->
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
</head>
<style>
    @media print {
        @page {
            margin-top: 30px;
            margin-left: 30px;
            margin-bottom: 10px;
        }

        title {
            display: nonne;
        }
    }
</style>

<body>
    <table>
        <thead>
            <tr>
                <th style="width: 1300px;">Daftar Anggota TP PKK Dan Kader<br>Tahun : <?= $tahun1; ?>/<?= $tahun2; ?></th>
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
            <th width="700px"></th>
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
            <th width="700px"></th>
            <td><b>Provinsi</b></td>
            <th></th>
            <th>:</th>
            <td><b><?= $provinsi; ?></b></td>
        </tr>
    </table>
    <table rules="all" border="1" cellpadding="5px" style="font-size: 14px;">
        <thead>
            <tr>
                <th scope="col" rowspan="2">NO.</th>
                <th scope="col" rowspan="2">NOMOR <br>REGISTRASI<br>TP PKK</th>
                <th scope="col" rowspan="2">TANGGAL<br>MASUk</th>
                <th scope="col" rowspan="2">NAMA</th>
                <th scope="col" rowspan="2">JENIS<br>KELAMIN</th>
                <th scope="col" colspan="3">KEDUDUKAN/FUNGSI</th>
                <th scope="col" rowspan="2">TH/BULAN/TGL.<br> LAHIR/UMUR</th>
                <th scope="col" rowspan="2">STATUS</th>
                <th scope="col" rowspan="2">ALAMAT</th>
                <th scope="col" rowspan="2">PENDIDIKAN</th>
                <th scope="col" rowspan="2">PEKERJAAN</th>
                <th scope="col" rowspan="2">FOTO</th>
                <th scope="col" rowspan="2">KETERANGAN</th>
            </tr>
            <tr>
                <th scope="col">DALAM<br>KEANGGOTAAN<br>TP PKK</th>
                <th scope="col">KADER<br>UMUM</th>
                <th scope="col">KADER<br>KHUSUS</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($daftaranggota as $k) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $k['no_reg']; ?></td>
                    <td><?= $k['tgl_masuk']; ?></td>
                    <td><?= $k['nama']; ?></td>
                    <td><?= $k['jk']; ?></td>
                    <td><?= $k['fungsi_anggota']; ?></td>
                    <td><?= $k['fungsi_kader_umum']; ?></td>
                    <td><?= $k['fungsi_kader_khusus']; ?></td>
                    <td><?= $k['tgl_lahir']; ?></td>
                    <td><?= $k['status']; ?></td>
                    <td><?= $k['alamat']; ?></td>
                    <td><?= $k['pendidikan']; ?></td>
                    <td><?= $k['pekerjaan']; ?></td>
                    <?php if ($k['foto'] == null) : ?>
                        <td>tidak ada</td>
                    <?php endif; ?>
                    <?php if ($k['foto'] != null) : ?>
                        <td>
                            <img src="/img/<?= $k['foto']; ?>" width="100px">
                        </td>
                    <?php endif; ?>
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