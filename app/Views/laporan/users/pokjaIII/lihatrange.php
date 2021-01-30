<?= $this->extend('layout/users/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <center>
        <h5>Data Kegiatan PKK</h5>
        <p><b>TP. PKK : Kecamatan Berbah<br>Tahun : <?= $tahun1; ?>/<?= $tahun2; ?></b></p>
    </center>
    <h5 class="mt-2">POKJA III</h5>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col" rowspan="3">NO.</th>
                    <th scope="col" rowspan="3">NAMA<br>WILAYAH <br>(Dusun/Ling<br>/Desa/Kel<br>/Kec/Kab<br>/Kota/Prov)</th>
                    <th scope="col" colspan="3">JUMLAH KADER</th>
                    <th scope="col" colspan="8">PANGAN</th>
                    <th scope="col" colspan="3">JUMLAH INDUSTRI<br>RUMAH TANGGA</th>
                    <th scope="col" colspan="2">JUMLAH RUMAH</th>
                    <th scope="col" rowspan="3">KETERANGAN</th>
                </tr>
                <tr>
                    <th scope="col" rowspan="2">PANGAN</th>
                    <th scope="col" rowspan="2">SANDANG</th>
                    <th scope="col" rowspan="2">TATA LAKSANA<br>RUMAH TANGGA</th>
                    <th scope="col" colspan="2">MAKANAN<br>POKOK</th>
                    <th scope="col" colspan="6">PEMANFAATAN PEKARANGAN/HATINYA PKK</th>
                    <th scope="col" rowspan="2">PANGAN</th>
                    <th scope="col" rowspan="2">SANDANG</th>
                    <th scope="col" rowspan="2">JASA</th>
                    <th scope="col" rowspan="2">SEHAT DAN<br>LAYAK HUNI</th>
                    <th scope="col" rowspan="2">TIDAK SEHAT DAN<br>TIDAK LAYAK HUNI</th>
                </tr>
                <tr>
                    <th scope="col">BERAS</th>
                    <th scope="col">NON<br>BERAS</th>
                    <th scope="col">PETERNAKAN</th>
                    <th scope="col">PERIKANAN</th>
                    <th scope="col">WARUNG<br>HIDUP</th>
                    <th scope="col">LUMBUNG<br>HIDUP</th>
                    <th scope="col">TOGA</th>
                    <th scope="col">TANAMAN<br>KERAS</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($pokjaIII as $k) : ?>
                    <tr>
                        <?php foreach ($wilayah as $w) :
                            $kdwilayah = $w['kd_wilayah'];
                            if ($k['kd_wilayah'] == $w['kd_wilayah']) { ?>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $w['kelurahan']; ?></td>
                                <td><?= $k['jml_kader_pangan']; ?></td>
                                <td><?= $k['jml_kader_sandang']; ?></td>
                                <td><?= $k['jml_kader_tatart']; ?></td>
                                <td><?= $k['jml_mknpokok_beras']; ?></td>
                                <td><?= $k['jml_mknpokok_nonberas']; ?></td>
                                <td><?= $k['jml_pmnfaatn_ternak']; ?></td>
                                <td><?= $k['jml_pmnfaatn_ikan']; ?></td>
                                <td><?= $k['jml_pmnfaatn_warung']; ?></td>
                                <td><?= $k['jml_pmnfaatn_lumbung']; ?></td>
                                <td><?= $k['jml_pmnfaatn_toga']; ?></td>
                                <td><?= $k['jml_pmnfaatn_tnmkeras']; ?></td>
                                <td><?= $k['jml_ind_pangan']; ?></td>
                                <td><?= $k['jml_ind_sandang']; ?></td>
                                <td><?= $k['jml_ind_jasa']; ?></td>
                                <td><?= $k['jml_rmh_layak']; ?></td>
                                <td><?= $k['jml_rmh_tidaklayak']; ?></td>
                                <td><?= $k['keterangan']; ?></td>
                            <?php } ?>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <th colspan="2">Jumlah</th>
                    <?php foreach ($total as $t) : ?>
                        <td><?= $t['totalkaderpangan']; ?></td>
                        <td><?= $t['totalkadersandang']; ?></td>
                        <td><?= $t['totalkadertatart']; ?></td>
                        <td><?= $t['totalmknberas']; ?></td>
                        <td><?= $t['totalmknnonberas']; ?></td>
                        <td><?= $t['totalternak']; ?></td>
                        <td><?= $t['totalikan']; ?></td>
                        <td><?= $t['totalwarung']; ?></td>
                        <td><?= $t['totallumbung']; ?></td>
                        <td><?= $t['totaltoga']; ?></td>
                        <td><?= $t['totaltnmkeras']; ?></td>
                        <td><?= $t['totalindpangan']; ?></td>
                        <td><?= $t['totalindsandang']; ?></td>
                        <td><?= $t['totalindjasa']; ?></td>
                        <td><?= $t['totalrmhlayak']; ?></td>
                        <td><?= $t['totalrmhtdklayak']; ?></td>
                    <?php endforeach; ?>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<br><br>
<p><b>
        <center>Grafik Data Kegiatan PKK<br>POKJA III<br>Periode <?= date('d F Y', strtotime($awal)); ?> sampai <?= date('d F Y', strtotime($akhir)); ?></center>
    </b></p>
<canvas id="myLineChart" height="200"></canvas>
<script>
    var warna = ['#c5e417', '#12e20b', '#0dd5f0', '#0b1ae6', '#d10404', '#8f06b1', '#f71bb5', '#94eb6b', '#eba56b', '#6bebb6', '#6badeb', '#5c0000', '#005c4d']
    var ctx = document.getElementById('myLineChart');
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Pangan', 'Sandang', 'Tata laksana RT', 'Beras', 'Non beras', 'Peternakan', 'Perikanan', 'Warung hidup', 'Lumbung hidup', 'Toga', 'Tanaman keras', 'Sandang', 'Pangan', 'Jasa', 'Layak huni', 'Tidak layak huni'],
            datasets: [
                <?php $i = 1;
                foreach ($pokjaIII as $p) : ?>
                    <?php foreach ($wilayah as $w) :
                        $kdwilayah = $w['kd_wilayah'];
                        if ($p['kd_wilayah'] == $w['kd_wilayah']) { ?> {
                                label: '<?= $w['kelurahan']; ?>',
                                fill: false,
                                lineTension: 0.3,
                                backgroundColor: warna[<?= $i; ?>],
                                borderColor: warna[<?= $i; ?>],
                                pointHoverBackgroundColor: warna[<?= $i; ?>],
                                pointHoverBorderColor: warna[<?= $i; ?>],
                                data: [
                                    <?= $p['jml_kader_pangan']; ?>,
                                    <?= $p['jml_kader_sandang']; ?>,
                                    <?= $p['jml_kader_tatart']; ?>,
                                    <?= $p['jml_mknpokok_beras']; ?>,
                                    <?= $p['jml_mknpokok_nonberas']; ?>,
                                    <?= $p['jml_pmnfaatn_ternak']; ?>,
                                    <?= $p['jml_pmnfaatn_ikan']; ?>,
                                    <?= $p['jml_pmnfaatn_warung']; ?>,
                                    <?= $p['jml_pmnfaatn_lumbung']; ?>,
                                    <?= $p['jml_pmnfaatn_toga']; ?>,
                                    <?= $p['jml_pmnfaatn_tnmkeras']; ?>,
                                    <?= $p['jml_ind_pangan']; ?>,
                                    <?= $p['jml_ind_sandang']; ?>,
                                    <?= $p['jml_ind_jasa']; ?>,
                                    <?= $p['jml_rmh_layak']; ?>,
                                    <?= $p['jml_rmh_tidaklayak']; ?>
                                ],
                            },
                        <?php } ?>
                    <?php endforeach; ?>
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
<a href="/users/rangepokjaiii" class="btn btn-danger">Kembali</a>
<?= $this->endSection(); ?>