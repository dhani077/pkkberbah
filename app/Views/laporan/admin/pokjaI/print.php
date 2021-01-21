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

    <h4 style="width: 1200px; text-align: center;">Data Kegiatan PKK<br>TP. PKK : Kecamatan Berbah<br>Tahun : <?= $tahun1; ?>/<?= $tahun2; ?></h4>
    <br>
    <table>
        <tr>
            <td><b>Pokja I</b></td>
        </tr>
    </table>
    <table rules="all" border="1" cellpadding="5px" style="font-size: 12px;">
        <thead>
            <tr>
                <th scope="col" rowspan="3">NO.</th>
                <th scope="col" rowspan="3">NAMA WILAYAH<br>(Desa/<br>Kelurahan)</th>
                <th scope="col" colspan="3">JUMLAH KADER</th>
                <th scope="col" colspan="8">PENGHAYATAN DAN PENGAMALAN PANCASILA</th>
                <th scope="col" colspan="5">GOTONG ROYONG</th>
                <th scope="col" rowspan="3">KETERANGAN</th>
            </tr>
            <tr>
                <th scope="col" rowspan="2">P<br>K<br>B<br>N</th>
                <th scope="col" rowspan="2">P<br>K<br>D<br>R<br>T</th>
                <th scope="col" rowspan="2">POLA ASUH</th>
                <th scope="col" colspan="2">PKBN</th>
                <th scope="col" colspan="2">PKDRT</th>
                <th scope="col" colspan="2">POLA ASUH</th>
                <th scope="col" colspan="2">LANSIA</th>
                <th scope="col" colspan="5">JUMLAH KELOMPOK</th>
            </tr>
            <tr>
                <th scope="col">JML. KLP.<br> SIMULASI</th>
                <th scope="col">JML.<br> ANGGOTA</th>
                <th scope="col">JML. KLP.<br> SIMULASI</th>
                <th scope="col">JML.<br> ANGGOTA</th>
                <th scope="col">JML.<br> KLP.</th>
                <th scope="col">JML.<br> ANGGOTA</th>
                <th scope="col">JML.<br> KLP.</th>
                <th scope="col">JML.<br> ANGGOTA</th>
                <th scope="col">KERJA<br>BAKTI</th>
                <th scope="col">RUKUN<br>KEMATIAN</th>
                <th scope="col">KE<br>AGAMA<br>AN</th>
                <th scope="col">JIMPITAN</th>
                <th scope="col">ARISAN</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($pokjaI as $k) : ?>
                <tr>
                    <?php foreach ($wilayah as $w) :
                        $kdwilayah = $w['kd_wilayah'];
                        if ($k['kd_wilayah'] == $w['kd_wilayah']) { ?>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $w['kelurahan']; ?></td>
                            <td><?= $k['jml_kader_pkbn']; ?></td>
                            <td><?= $k['jml_kader_pkdrt']; ?></td>
                            <td><?= $k['jml_kader_polaasuh']; ?></td>
                            <td><?= $k['jml_klp_simulasi_pkbn']; ?></td>
                            <td><?= $k['jml_anggota_pkbn']; ?></td>
                            <td><?= $k['jml_klp_simulasi_pkdrt']; ?></td>
                            <td><?= $k['jml_anggota_pkdrt']; ?></td>
                            <td><?= $k['jml_klp_polaasuh']; ?></td>
                            <td><?= $k['jml_anggota_polaasuh']; ?></td>
                            <td><?= $k['jml_klp_lansia']; ?></td>
                            <td><?= $k['jml_anggota_lansia']; ?></td>
                            <td><?= $k['jml_klp_kerjabakti']; ?></td>
                            <td><?= $k['jml_klp_rknmati']; ?></td>
                            <td><?= $k['jml_klp_keagamaan']; ?></td>
                            <td><?= $k['jml_klp_jimpitan']; ?></td>
                            <td><?= $k['jml_klp_arisan']; ?></td>
                            <td><?= $k['keterangan']; ?></td>
                        <?php } ?>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="2">Jumlah</td>
                <?php foreach ($total as $t) : ?>
                    <td><?= $t['totalpkbn']; ?></td>
                    <td><?= $t['totalpkdrt']; ?></td>
                    <td><?= $t['totalpola']; ?></td>
                    <td><?= $t['totalklppkbn']; ?></td>
                    <td><?= $t['totalanggotapkbn']; ?></td>
                    <td><?= $t['totalklppkdrt']; ?></td>
                    <td><?= $t['totalanggotapkdrt']; ?></td>
                    <td><?= $t['totalklppola']; ?></td>
                    <td><?= $t['totalanggotapola']; ?></td>
                    <td><?= $t['totalklplansia']; ?></td>
                    <td><?= $t['totalanggotalansia']; ?></td>
                    <td><?= $t['totalklpbakti']; ?></td>
                    <td><?= $t['totalklpagama']; ?></td>
                    <td><?= $t['totalklpmati']; ?></td>
                    <td><?= $t['totalklpjimpit']; ?></td>
                    <td><?= $t['totalklparisan']; ?></td>
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