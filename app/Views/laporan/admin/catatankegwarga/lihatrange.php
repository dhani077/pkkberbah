<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5>
        <center>Catatan Data Dan Kegiatan Warga<br>TP PKK Kecamatan</center>
    </h5>
    <p>
        <center><b>Tahun <?= $tahun1; ?>/<?= $tahun2; ?></b></center>
    </p>
    <div class="table-responsive">
        <table>
            <tr>
                <th>Kecamatan</th>
                <th></th>
                <th> : </th>
                <th><?= $kecamatan; ?></th>
            </tr>
            <tr>
                <th>Kab/Kota</th>
                <th></th>
                <th> : </th>
                <th><?= $kabupaten; ?></th>
            </tr>
            <tr>
                <th>Provinsi</th>
                <th></th>
                <th> : </th>
                <th><?= $provinsi; ?></th>
            </tr>
        </table>
    </div>
    <div class="table-responsive pt-2">
        <table class="table table-bordered table-striped">
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
                    <th scope="col" rowspan="2">IBU <br>MENYUSUI</th>
                    <th scope="col" rowspan="2">LANSIA</th>
                    <th scope="col" colspan="2">3 BUTA</th>
                    <th scope="col" rowspan="2">SEHAT</th>
                    <th scope="col" rowspan="2">KURANG<br>SEHAT</th>
                    <th scope="col" rowspan="2">MEMILIKI<br>TMP. PEMB.<br>SAMPAH</th>
                    <th scope="col" rowspan="2">MEMILIKI SPAL</th>
                    <th scope="col" rowspan="2">MENEMPEL<br>STIKER P4K</th>
                    <th scope="col" rowspan="2">PDAM</th>
                    <th scope="col" rowspan="2">SUMUR</th>
                    <th scope="col" rowspan="2">SUNGAI</th>
                    <th scope="col" rowspan="2">DLL</th>
                    <th scope="col" rowspan="2">BERAS</th>
                    <th scope="col" rowspan="2">NON<br>BERAS</th>
                    <th scope="col" rowspan="2">UP2K</th>
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
    <br>
    <?php if ($catatankegwarga) : ?>
        <form action="/catatankegwarga/print" method="post" class="d-inline">
            <?= csrf_field(); ?>
            <input type="hidden" id="awal" name="awal" value="<?= $awal; ?>">
            <input type="hidden" id="akhir" name="akhir" value="<?= $akhir; ?>">
            <button id="aksi" name="aksi" type="submit" class="btn btn-outline-secondary" value="print">Cetak Tabel</button>
        </form>
    <?php endif; ?>
</div>
<br><br><br>
<p><b>
        <center>Grafik Catatan Data Dan Kegiatan Warga<br>TP PKK Kecamatan <br>Periode <?= date('d F Y', strtotime($awal)); ?> sampai <?= date('d F Y', strtotime($akhir)); ?></center>
    </b></p>
<canvas id="myLineChart" height="200"></canvas>
<script>
    var warna = ['#c5e417', '#12e20b', '#0dd5f0', '#0b1ae6', '#d10404', '#8f06b1', '#f71bb5', '#94eb6b', '#eba56b', '#6bebb6', '#6badeb', '#5c0000', '#005c4d']
    var ctx = document.getElementById('myLineChart');
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Dusun', 'RW', 'RT', 'Dasawisma', 'KRT', 'KK', 'Anggota keluarga(L)', 'Anggota keluarga(P)', 'Anggota keluarga balita(L)', 'Anggota keluarga balita(P)', 'Anggota keluarga PUS', 'Anggota keluarga WUS', 'Ibu hamil', 'Ibu menyusui', 'Lansia', '3 Buta(L)', '3 Buta(P)', 'Rumah sehat', 'Rumah kurang sehat', 'Rumah memiliki TPS', 'Rumah memiliki SPAL', 'Rumah stiker P4K', 'Sumber PDAM', 'Sumber sumur', 'Sumber sungai', 'Sumber lain-lain', 'Jamban keluarga', 'Makanan pokok beras', 'Makanan pokok non beras', 'Kegiatan UP2K', 'Kegiatan pemanfaatan tanah', 'Kegiatan industri RT', 'Kegiatan kesehatan lingkungan'],
            datasets: [
                <?php $i = 1;
                foreach ($catatankegwarga as $ck) : ?> {
                        label: '<?= $ck['nama_kelurahan']; ?>(<?= $ck['tahun']; ?>)',
                        fill: false,
                        lineTension: 0.3,
                        backgroundColor: warna[<?= $i; ?>],
                        borderColor: warna[<?= $i; ?>],
                        pointHoverBackgroundColor: warna[<?= $i; ?>],
                        pointHoverBorderColor: warna[<?= $i; ?>],
                        data: [
                            <?= $ck['jml_dusun']; ?>,
                            <?= $ck['jml_rw']; ?>,
                            <?= $ck['jml_rt']; ?>,
                            <?= $ck['jml_dasawisma']; ?>,
                            <?= $ck['jml_krt']; ?>,
                            <?= $ck['jml_kk']; ?>,
                            <?= $ck['jml_angt_keluarga_totL']; ?>,
                            <?= $ck['jml_angt_keluarga_totP']; ?>,
                            <?= $ck['jml_angt_keluarga_balitaL']; ?>,
                            <?= $ck['jml_angt_keluarga_balitaP']; ?>,
                            <?= $ck['jml_angt_keluarga_pus']; ?>,
                            <?= $ck['jml_angt_keluarga_wus']; ?>,
                            <?= $ck['jml_angt_keluarga_ibuhml']; ?>,
                            <?= $ck['jml_angt_keluarga_ibunyusu']; ?>,
                            <?= $ck['jml_angt_keluarga_lansia']; ?>,
                            <?= $ck['jml_angt_keluarga_butaL']; ?>,
                            <?= $ck['jml_angt_keluarga_butaP']; ?>,
                            <?= $ck['jml_rmh_sehat']; ?>,
                            <?= $ck['jml_rmh_krgsehat']; ?>,
                            <?= $ck['jml_rmh_sampah']; ?>,
                            <?= $ck['jml_rmh_spal']; ?>,
                            <?= $ck['jml_rmh_p4k']; ?>,
                            <?= $ck['jml_airkel_pdam']; ?>,
                            <?= $ck['jml_airkel_sumur']; ?>,
                            <?= $ck['jml_airkel_sungai']; ?>,
                            <?= $ck['jml_airkel_lain']; ?>,
                            <?= $ck['jml_jamban_kel']; ?>,
                            <?= $ck['jml_mknpokok_beras']; ?>,
                            <?= $ck['jml_mknpokok_nonberas']; ?>,
                            <?= $ck['jml_wrg_up2k']; ?>,
                            <?= $ck['jml_wrg_mnfaat_tanah']; ?>,
                            <?= $ck['jml_wrg_industrirt']; ?>,
                            <?= $ck['jml_wrg_keslingk']; ?>
                        ],
                    },
                <?php $i++;
                endforeach; ?>
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<br><br>
<form action="/catatankegwarga/print" method="post" class="d-inline">
    <input type="hidden" id="awal" name="awal" value="<?= $awal; ?>">
    <input type="hidden" id="akhir" name="akhir" value="<?= $akhir; ?>">
    <?= csrf_field(); ?>
    <button id="aksi" name="aksi" type="submit" class="btn btn-danger" value="batal">Kembali</button>
</form>
<?= $this->endSection(); ?>