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
    <h3 style="padding-left: 500px;">
        Data Umum TP PKK Kecamatan
    </h3>
    <table style="text-align: left;">
        <tr>
            <th>Kecamatan</th>
            <th></th>
            <th>:</th>
            <th><?= $kecamatan; ?></th>
        </tr>
        <tr>
            <th>Kab/Kota</th>
            <th></th>
            <th>:</th>
            <th><?= $kabupaten; ?></th>
        </tr>
        <tr>
            <th>Provinsi</th>
            <th></th>
            <th>:</th>
            <th><?= $provinsi; ?></th>
        </tr>
        <tr>
            <th>Tahun</th>
            <th></th>
            <th>:</th>
            <th><?= $tahun1; ?>/<?= $tahun2; ?></th>
        </tr>
    </table>
    <table style="width: 1200px; font-size: 12px;" rules="all" border="1" cellpadding="5px">
        <thead>
            <tr>
                <th scope="col" rowspan="3">NO.</th>
                <th scope="col" rowspan="3">NAMA<br>DESA/<br>KELURAHAN</th>
                <th scope="col" colspan="4">JUMLAH KELOMPOK</th>
                <th scope="col" colspan="2">JUMLAH</th>
                <th scope="col" colspan="2">JUMLAH JIWA</th>
                <th scope="col" colspan="6">JUMLAH KADER</th>
                <th scope="col" colspan="4">JUMLAH TENAGA<br>SEKRETARIS</th>
                <th scope="col" rowspan="4">KETERANGAN</th>
            </tr>
            <tr>
                <th scope="col" rowspan="2">DUSUN/<br>LINGKUNGAN</th>
                <th scope="col" rowspan="2">PKK RT</th>
                <th scope="col" rowspan="2">PKK RW</th>
                <th scope="col" rowspan="2">DASA<br>WISMA</th>
                <th scope="col" rowspan="2">KRT</th>
                <th scope="col" rowspan="2">KK</th>
                <th scope="col" rowspan="2">L</th>
                <th scope="col" rowspan="2">P</th>
                <th scope="col" colspan="2">ANGGOTA<br>TP PKK</th>
                <th scope="col" colspan="2">UMUM</th>
                <th scope="col" colspan="2">KKHUSUS</th>
                <th scope="col" colspan="2">HONORER</th>
                <th scope="col" colspan="2">BANTUAN</th>
            </tr>
            <tr>
                <th scope="col">L</th>
                <th scope="col">P</th>
                <th scope="col">L</th>
                <th scope="col">P</th>
                <th scope="col">L</th>
                <th scope="col">P</th>
                <th scope="col">L</th>
                <th scope="col">P</th>
                <th scope="col">L</th>
                <th scope="col">P</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($dataumumtppkkkec as $k) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $k['nama_wilayah']; ?></td>
                    <td><?= $k['jml_klp_dusun']; ?></td>
                    <td><?= $k['jml_klp_pkkrw']; ?></td>
                    <td><?= $k['jml_klp_pkkrt']; ?></td>
                    <td><?= $k['jml_klp_dasawisma']; ?></td>
                    <td><?= $k['jml_krt']; ?></td>
                    <td><?= $k['jml_kk']; ?></td>
                    <td><?= $k['jml_jiwa_L']; ?></td>
                    <td><?= $k['jml_jiwa_P']; ?></td>
                    <td><?= $k['jml_kader_angL']; ?></td>
                    <td><?= $k['jml_kader_angP']; ?></td>
                    <td><?= $k['jml_kader_umumL']; ?></td>
                    <td><?= $k['jml_kader_umumP']; ?></td>
                    <td><?= $k['jml_kader_khususL']; ?></td>
                    <td><?= $k['jml_kader_khususP']; ?></td>
                    <td><?= $k['jml_skrt_honorerL']; ?></td>
                    <td><?= $k['jml_skrt_honorerP']; ?></td>
                    <td><?= $k['jml_skrt_bantuanL']; ?></td>
                    <td><?= $k['jml_skrt_bantuanP']; ?></td>
                    <td><?= $k['keterangan']; ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th colspan="2">Jumlah</th>
                <?php foreach ($total as $t) : ?>
                    <td><?= $t['totaldusun']; ?></td>
                    <td><?= $t['totalrw']; ?></td>
                    <td><?= $t['totalrt']; ?></td>
                    <td><?= $t['totaldasawisma']; ?></td>
                    <td><?= $t['totalkrt']; ?></td>
                    <td><?= $t['totalkk']; ?></td>
                    <td><?= $t['totalL']; ?></td>
                    <td><?= $t['totalP']; ?></td>
                    <td><?= $t['totalangL']; ?></td>
                    <td><?= $t['totalangP']; ?></td>
                    <td><?= $t['totalumumL']; ?></td>
                    <td><?= $t['totalumumP']; ?></td>
                    <td><?= $t['totalkhususL']; ?></td>
                    <td><?= $t['totalkhususP']; ?></td>
                    <td><?= $t['totalhonorerL']; ?></td>
                    <td><?= $t['totalhonorerP']; ?></td>
                    <td><?= $t['totalbantuanL']; ?></td>
                    <td><?= $t['totalbantuanP']; ?></td>
                <?php endforeach; ?>
                <td></td>
            </tr>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>