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
        <center>
            <table>
                <thead>
                    <tr>
                        <th>Catatan Data Dan Kegiatan Warga</th>
                    </tr>
                    <tr>
                        <th>TP PKK Kecamatan</th>
                    </tr>
                    <tr>
                        <th>Tahun <?= $tahun1; ?>/<?= $tahun2; ?></th>
                    </tr>
                </thead>
            </table>
        </center>
        <div class="table-responsive">
            <table>
                <tr>
                    <td><b>Kecamatan</b></td>
                    <th></th>
                    <th> : </th>
                    <td><b><?= $kecamatan; ?></b></td>
                </tr>
                <tr>
                    <td><b>Kab/Kota</b></td>
                    <th></th>
                    <th> : </th>
                    <td><b><?= $kabupaten; ?></b></td>
                </tr>
                <tr>
                    <td><b>Provinsi</b></td>
                    <th></th>
                    <th> : </th>
                    <td><b><?= $provinsi; ?></b></td>
                </tr>
            </table>

            <table rules="all" border="1" cellpadding="5px" style="font-size: 14px;">
                <thead>
                    <tr>
                        <th scope="col" rowspan="3">NO.</th>
                        <th scope="col" rowspan="3">NAMA DESA/<br>KELURAHAN</th>
                        <th scope="col" rowspan="3">JML. DUSUN/<br>LINGKUNGAN</th>
                        <th scope="col" rowspan="3">JML. RW</th>
                        <th scope="col" rowspan="3">JML. RT</th>
                        <th scope="col" rowspan="3">JML.<br> DASAWISMA</th>
                        <th scope="col" rowspan="3">JML. KRT</th>
                        <th scope="col" rowspan="3">JML. KK</th>
                        <th scope="col" colspan="11">JUMLAH ANGGOTA KELUARGA</th>
                        <th scope="col" colspan="5">KRITERIA RUMAH</th>
                        <th scope="col" colspan="4">SUMBER AIR KELUARGA</th>
                        <th scope="col" rowspan="3">JUMLAH <br>JAMBAN <br>KELUARGA</th>
                        <th scope="col" colspan="2">MAKANAN POKOK</th>
                        <th scope="col" colspan="4">WARGA MENGIKUTI KEGIATAN</th>
                        <th scope="col" rowspan="3">KETERANGAN</th>
                    </tr>
                    <tr>
                        <th scope="col" colspan="2">TOTAL</th>
                        <th scope="col" colspan="2">BALITA</th>
                        <th scope="col" rowspan="2">PUS</th>
                        <th scope="col" rowspan="2">WUS</th>
                        <th scope="col" rowspan="2">IBU <br>HAMIL</th>
                        <th scope="col" rowspan="2">IBU <br>ME-<br>NYUSUI</th>
                        <th scope="col" rowspan="2">LAN-<br>SIA</th>
                        <th scope="col" colspan="2">3 BUTA</th>
                        <th scope="col" rowspan="2">SEHAT</th>
                        <th scope="col" rowspan="2">KURANG<br>SEHAT</th>
                        <th scope="col" rowspan="2">MEMILIKI<br>TMP. PEMB.<br>SAMPAH</th>
                        <th scope="col" rowspan="2">ME-<br>MILIKI SPAL</th>
                        <th scope="col" rowspan="2">MENEMPEL<br>STIKER P4K</th>
                        <th scope="col" rowspan="2">PDAM</th>
                        <th scope="col" rowspan="2">SUMUR</th>
                        <th scope="col" rowspan="2">SUNGAI</th>
                        <th scope="col" rowspan="2">DLL</th>
                        <th scope="col" rowspan="2">BERAS</th>
                        <th scope="col" rowspan="2">NON<br>BERAS</th>
                        <th scope="col" rowspan="2">U<br>P<br>2<br>K</th>
                        <th scope="col" rowspan="2">PEMANFAATAN<br>TANAH<br>PEKARANGAN</th>
                        <th scope="col" rowspan="2">INDUSTRI<br>RUMAH<br>TANGGA</th>
                        <th scope="col" rowspan="2">KESEHATAN<br>LINGKUNGAN</th>
                    </tr>
                    <tr>
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
                    <?php foreach ($catatankegwarga as $k) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $k['nama_kelurahan']; ?></td>
                            <td><?= $k['jml_dusun']; ?></td>
                            <td><?= $k['jml_rw']; ?></td>
                            <td><?= $k['jml_rt']; ?></td>
                            <td><?= $k['jml_dasawisma']; ?></td>
                            <td><?= $k['jml_krt']; ?></td>
                            <td><?= $k['jml_kk']; ?></td>
                            <td><?= $k['jml_angt_keluarga_totL']; ?></td>
                            <td><?= $k['jml_angt_keluarga_totP']; ?></td>
                            <td><?= $k['jml_angt_keluarga_balitaL']; ?></td>
                            <td><?= $k['jml_angt_keluarga_balitaP']; ?></td>
                            <td><?= $k['jml_angt_keluarga_pus']; ?></td>
                            <td><?= $k['jml_angt_keluarga_wus']; ?></td>
                            <td><?= $k['jml_angt_keluarga_ibuhml']; ?></td>
                            <td><?= $k['jml_angt_keluarga_ibunyusu']; ?></td>
                            <td><?= $k['jml_angt_keluarga_lansia']; ?></td>
                            <td><?= $k['jml_angt_keluarga_butaL']; ?></td>
                            <td><?= $k['jml_angt_keluarga_butaP']; ?></td>
                            <td><?= $k['jml_rmh_sehat']; ?></td>
                            <td><?= $k['jml_rmh_krgsehat']; ?></td>
                            <td><?= $k['jml_rmh_sampah']; ?></td>
                            <td><?= $k['jml_rmh_spal']; ?></td>
                            <td><?= $k['jml_rmh_p4k']; ?></td>
                            <td><?= $k['jml_airkel_pdam']; ?></td>
                            <td><?= $k['jml_airkel_sumur']; ?></td>
                            <td><?= $k['jml_airkel_sungai']; ?></td>
                            <td><?= $k['jml_airkel_lain']; ?></td>
                            <td><?= $k['jml_jamban_kel']; ?></td>
                            <td><?= $k['jml_mknpokok_beras']; ?></td>
                            <td><?= $k['jml_mknpokok_nonberas']; ?></td>
                            <td><?= $k['jml_wrg_up2k']; ?></td>
                            <td><?= $k['jml_wrg_mnfaat_tanah']; ?></td>
                            <td><?= $k['jml_wrg_industrirt']; ?></td>
                            <td><?= $k['jml_wrg_keslingk']; ?></td>
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
                            <td><?= $t['totallaki']; ?></td>
                            <td><?= $t['totalperempuan']; ?></td>
                            <td><?= $t['totalbalitaL']; ?></td>
                            <td><?= $t['totalbalitaP']; ?></td>
                            <td><?= $t['totalpus']; ?></td>
                            <td><?= $t['totalwus']; ?></td>
                            <td><?= $t['totalibuhml']; ?></td>
                            <td><?= $t['totalibunyusu']; ?></td>
                            <td><?= $t['totallansia']; ?></td>
                            <td><?= $t['totalbutaL']; ?></td>
                            <td><?= $t['totalbutaP']; ?></td>
                            <td><?= $t['totalrmhsehat']; ?></td>
                            <td><?= $t['totalrmhkrgsehat']; ?></td>
                            <td><?= $t['totalrmhsampah']; ?></td>
                            <td><?= $t['totalrmhspal']; ?></td>
                            <td><?= $t['totalrmhp4k']; ?></td>
                            <td><?= $t['totalpdam']; ?></td>
                            <td><?= $t['totalsumur']; ?></td>
                            <td><?= $t['totalsungai']; ?></td>
                            <td><?= $t['totallain']; ?></td>
                            <td><?= $t['totaljamban']; ?></td>
                            <td><?= $t['totalberas']; ?></td>
                            <td><?= $t['totalnonberas']; ?></td>
                            <td><?= $t['totalup2k']; ?></td>
                            <td><?= $t['totaltanah']; ?></td>
                            <td><?= $t['totalindustri']; ?></td>
                            <td><?= $t['totalkeslingk']; ?></td>
                        <?php endforeach; ?>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <script type="text/javascript">
            window.print();
        </script>
</body>

</html>