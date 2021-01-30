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
    <table style="width: 650px;">
        <tr>
            <th>
                <h3>DATA PELATIHAN KADER</h3>
            </th>
        </tr>
    </table>
    <table>
        <table>
            <tr>
                <td><b>Kelurahan</b></td>
                <th></th>
                <th>:</th>
                <td><b><?= $kelurahan; ?></b></td>
                <th width="250px"></th>
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
                <th width="250px"></th>
                <td><b>Provinsi</b></td>
                <th></th>
                <th>:</th>
                <td><b><?= $provinsi; ?></b></td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td><b>1. Nomor Registrasi</b></td>
                <th></th>
                <th> : </th>
                <td><b><?= $pelatihan['no_reg']; ?></b></td>
            </tr>
            <tr>
                <td><b>2. Nama</b></td>
                <th></th>
                <th> : </th>
                <td><b><?= $pelatihan['nama']; ?></b></td>
            </tr>
            <tr>
                <td><b>3. Tanggal Masuk/ Sejak Tahun</b></td>
                <th></th>
                <th> : </th>
                <td><b><?= $pelatihan['tgl_masuk']; ?></b></td>
            </tr>
            <tr>
                <td><b>4. Kedudukan/Fungsi</b></td>
                <th></th>
                <th> : </th>
                <td><b><?= $pelatihan['fungsi_anggota']; ?></b></td>
            </tr>
            <tr>
                <td><b>5. Pelatihan yang pernah diikuti</b></td>
                <th></th>
                <th> : </th>
            </tr>
        </table>
        <table style="font-size: 12px; width: 750px;" rules="all" border="1" cellpadding="5px">
            <thead>
                <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">NAMA PELATIHAN</th>
                    <th scope="col">KRITERIA KADER</th>
                    <th scope="col">TANGGAL</th>
                    <th scope="col">PENYELENGGARA</th>
                    <th scope="col">KETERANGAN</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($datapelatihan as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['nama_pelatihan']; ?></td>
                        <td><?= $k['kriteria_kader']; ?></td>
                        <td><?= $k['tanggal']; ?></td>
                        <td><?= $k['penyelenggara']; ?></td>
                        <td><?= $k['keterangan']; ?></td>
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