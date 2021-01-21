<?= $this->extend('layout/users/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <center>
        <h5 class="mb-3">Data Kegiatan PKK</h5>
        <p><b>TP. PKK : Kecamatan Berbah<br>Tahun : <?= $tahun1; ?>/<?= $tahun2; ?></b></p>
    </center>
    <p class="mt-2"><b>POKJA I</b></p>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col" rowspan="3">NO.</th>
                    <th scope="col" rowspan="3">NAMA WILAYAH<br>(Desa/Kelurahan)</th>
                    <th scope="col" colspan="3">JUMLAH KADER</th>
                    <th scope="col" colspan="8">PENGHAYATAN DAN PENGAMALAN PANCASILA</th>
                    <th scope="col" colspan="5">GOTONG ROYONG</th>
                    <th scope="col" rowspan="3">KETERANGAN</th>
                </tr>
                <tr>
                    <th scope="col" rowspan="2">PKBN</th>
                    <th scope="col" rowspan="2">PKDRT</th>
                    <th scope="col" rowspan="2">POLA ASUH</th>
                    <th scope="col" colspan="2">PKBN</th>
                    <th scope="col" colspan="2">PKDRT</th>
                    <th scope="col" colspan="2">POLA ASUH</th>
                    <th scope="col" colspan="2">LANSIA</th>
                    <th scope="col" colspan="5">JUMLAH KELOMPOK</th>
                </tr>
                <tr>
                    <th scope="col">JUMLAH KELOMPOK SIMULASI</th>
                    <th scope="col">JUMLAH ANGGOTA</th>
                    <th scope="col">JUMLAH KELOMPOK SIMULASI</th>
                    <th scope="col">JUMLAH ANGGOTA</th>
                    <th scope="col">JUMLAH KELOMPOK</th>
                    <th scope="col">JUMLAH ANGGOTA</th>
                    <th scope="col">JUMLAH KELOMPOK</th>
                    <th scope="col">JUMLAH ANGGOTA</th>
                    <th scope="col">KERJA BAKTI</th>
                    <th scope="col">RUKUN KEMATIAN</th>
                    <th scope="col">KEAGAMAAN</th>
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
                    <th colspan="2">Jumlah</th>
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
    </div>
</div>
<br><br>
<p><b>
        <center>Grafik Data Kegiatan PKK<br>POKJA I<br>Periode <?= date('d F Y', strtotime($awal)); ?> sampai <?= date('d F Y', strtotime($akhir)); ?></center>
    </b></p>
<canvas id="myLineChart" height="200"></canvas>
<script>
    var warna = ['#c5e417', '#12e20b', '#0dd5f0', '#0b1ae6', '#d10404', '#8f06b1', '#f71bb5', '#94eb6b', '#eba56b', '#6bebb6', '#6badeb', '#5c0000', '#005c4d']
    var ctx = document.getElementById('myLineChart');
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Kader PKBN', 'Kader PKDRT', 'Kader Pola Asuh', 'Kelompok PKBN', 'Anggota PKBN', 'Kelompok PKDRT', 'Anggota PKDRT', 'Kelompok Pola Asuh', 'Anggota Pola Asuh', 'Kelompok Lansia', 'Anggota Lansia', 'Kelompok Kerja Bakti', 'Kelompok Rukun Kematian', 'Kelompok Keagamaan', 'Kelompok Jimpitan', 'Kelompok Arisan'],
            datasets: [
                <?php $i = 1;
                foreach ($pokjaI as $p) : ?>
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
                                    <?= $p['jml_kader_pkbn']; ?>,
                                    <?= $p['jml_kader_pkdrt']; ?>,
                                    <?= $p['jml_kader_polaasuh']; ?>,
                                    <?= $p['jml_klp_simulasi_pkbn']; ?>,
                                    <?= $p['jml_anggota_pkbn']; ?>,
                                    <?= $p['jml_klp_simulasi_pkdrt']; ?>,
                                    <?= $p['jml_anggota_pkdrt']; ?>,
                                    <?= $p['jml_klp_polaasuh']; ?>,
                                    <?= $p['jml_anggota_polaasuh']; ?>,
                                    <?= $p['jml_klp_lansia']; ?>,
                                    <?= $p['jml_anggota_lansia']; ?>,
                                    <?= $p['jml_klp_kerjabakti']; ?>,
                                    <?= $p['jml_klp_rknmati']; ?>,
                                    <?= $p['jml_klp_keagamaan']; ?>,
                                    <?= $p['jml_klp_jimpitan']; ?>,
                                    <?= $p['jml_klp_arisan']; ?>
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
<!-- <canvas id="myChart" height="200"></canvas>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php foreach ($pokjaI as $p) : ?>
                    <?php foreach ($wilayah as $w) :
                        $kdwilayah = $w['kd_wilayah'];
                        if ($p['kd_wilayah'] == $w['kd_wilayah']) { ?> '<?= $w['kelurahan']; ?>',
                        <?php } ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            ],
            datasets: [{
                    label: 'Kader PKBN',
                    data: [<?php foreach ($pokjaI as $p) : ?> '<?= $p['jml_kader_pkbn']; ?>',
                        <?php endforeach; ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Kader PKDRT',
                    data: [<?php foreach ($pokjaI as $p) : ?> '<?= $p['jml_kader_pkdrt']; ?>',

                        <?php endforeach; ?>
                    ],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Kader Pola Asuh',
                    data: [<?php foreach ($pokjaI as $p) : ?> '<?= $p['jml_kader_polaasuh']; ?>',

                        <?php endforeach; ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 206, 86, 0.2)'

                    ],
                    borderColor: [
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 206, 86, 1)'

                    ],
                    borderWidth: 1
                },
                {
                    label: 'PKBN Jumlah Kelompok',
                    data: [<?php foreach ($pokjaI as $p) : ?> '<?= $p['jml_klp_simulasi_pkbn']; ?>',

                        <?php endforeach; ?>
                    ],
                    backgroundColor: [
                        ' rgba(10, 184, 77, 0.2)',
                        ' rgba(10, 184, 77, 0.2)',
                        ' rgba(10, 184, 77, 0.2)',
                        ' rgba(10, 184, 77, 0.2)'
                    ],
                    borderColor: [
                        'rgba(10, 184, 77, 1)',
                        'rgba(10, 184, 77, 1)',
                        'rgba(10, 184, 77, 1)',
                        'rgba(10, 184, 77, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'PKBN Jumlah Anggota',
                    data: [<?php foreach ($pokjaI as $p) : ?> '<?= $p['jml_anggota_pkbn']; ?>',

                        <?php endforeach; ?>
                    ],
                    backgroundColor: [
                        'rgba(184, 114, 10, 0.2)',
                        'rgba(184, 114, 10, 0.2)',
                        'rgba(184, 114, 10, 0.2)',
                        'rgba(184, 114, 10, 0.2)'
                    ],
                    borderColor: [
                        'rgba(184, 114, 10, 1)',
                        'rgba(184, 114, 10, 1)',
                        'rgba(184, 114, 10, 1)',
                        'rgba(184, 114, 10, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'PKDRT Jumlah Kelompok',
                    data: [<?php foreach ($pokjaI as $p) : ?> '<?= $p['jml_klp_simulasi_pkdrt']; ?>',

                        <?php endforeach; ?>
                    ],
                    backgroundColor: [
                        'rgba(15, 236, 236, 0.2)',
                        'rgba(15, 236, 236, 0.2)',
                        'rgba(15, 236, 236, 0.2)',
                        'rgba(15, 236, 236, 0.2)'

                    ],
                    borderColor: [
                        'rgba(15, 236, 236, 1)',
                        'rgba(15, 236, 236, 1)',
                        'rgba(15, 236, 236, 1)',
                        'rgba(15, 236, 236, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'PKDRT Jumlah Anggota',
                    data: [<?php foreach ($pokjaI as $p) : ?> '<?= $p['jml_anggota_pkdrt']; ?>',

                        <?php endforeach; ?>
                    ],
                    backgroundColor: [
                        'rgba(223, 20, 241, 0.2)',
                        'rgba(223, 20, 241, 0.2)',
                        'rgba(223, 20, 241, 0.2)',
                        'rgba(223, 20, 241, 0.2)'

                    ],
                    borderColor: [
                        'rgba(223, 20, 241, 1)',
                        'rgba(223, 20, 241, 1)',
                        'rgba(223, 20, 241, 1)',
                        'rgba(223, 20, 241, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Pola Asuh Jumlah Kelompok',
                    data: [<?php foreach ($pokjaI as $p) : ?> '<?= $p['jml_klp_polaasuh']; ?>',

                        <?php endforeach; ?>
                    ],
                    backgroundColor: [
                        'rgba(117, 63, 38, 0.2)',
                        'rgba(117, 63, 38, 0.2)',
                        'rgba(117, 63, 38, 0.2)',
                        'rgba(117, 63, 38, 0.2)'
                    ],
                    borderColor: [
                        'rgba(117, 63, 38, 1)',
                        'rgba(117, 63, 38, 1)',
                        'rgba(117, 63, 38, 1)',
                        'rgba(117, 63, 38, 1)'
                    ],

                    borderWidth: 1
                },
                {
                    label: 'Pola Asuh Jumlah Anggota',
                    data: [<?php foreach ($pokjaI as $p) : ?> '<?= $p['jml_anggota_polaasuh']; ?>',

                        <?php endforeach; ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 106, 198, 0.2)',
                        'rgba(255, 106, 198, 0.2)',
                        'rgba(255, 106, 198, 0.2)',
                        'rgba(255, 106, 198, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 106, 198, 1)',
                        'rgba(255, 106, 198, 1)',
                        'rgba(255, 106, 198, 1)',
                        'rgba(255, 106, 198, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Lansia Jumlah Kelompok',
                    data: [<?php foreach ($pokjaI as $p) : ?> '<?= $p['jml_klp_lansia']; ?>',

                        <?php endforeach; ?>
                    ],
                    backgroundColor: [
                        'rgb(183, 106, 255, 0.2)',
                        'rgb(183, 106, 255, 0.2)',
                        'rgb(183, 106, 255, 0.2)',
                        'rgb(183, 106, 255, 0.2)'

                    ],
                    borderColor: [
                        'rgb(183, 106, 255, 1)',
                        'rgb(183, 106, 255, 1)',
                        'rgb(183, 106, 255, 1)',
                        'rgb(183, 106, 255, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Lansia Jumlah Anggota',
                    data: [<?php foreach ($pokjaI as $p) : ?> '<?= $p['jml_anggota_lansia']; ?>',

                        <?php endforeach; ?>
                    ],
                    backgroundColor: [
                        'rgba(155, 240, 121, 0.2)',
                        'rgba(155, 240, 121, 0.2)',
                        'rgba(155, 240, 121, 0.2)',
                        'rgba(155, 240, 121, 0.2)'
                    ],
                    borderColor: [
                        'rgba(155, 240, 121, 1)',
                        'rgba(155, 240, 121, 1)',
                        'rgba(155, 240, 121, 1)',
                        'rgba(155, 240, 121, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Kerja Bakti',
                    data: [<?php foreach ($pokjaI as $p) : ?> '<?= $p['jml_klp_kerjabakti']; ?>',

                        <?php endforeach; ?>
                    ],
                    backgroundColor: [
                        'rgba(202, 0, 0, 0.2)',
                        'rgba(202, 0, 0, 0.2)',
                        'rgba(202, 0, 0, 0.2)',
                        'rgba(202, 0, 0, 0.2)'
                    ],
                    borderColor: [
                        'rgba(202, 0, 0, 1)',
                        'rgba(202, 0, 0, 1)',
                        'rgba(202, 0, 0, 1)',
                        'rgba(202, 0, 0, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Rukun Kematian',
                    data: [<?php foreach ($pokjaI as $p) : ?> '<?= $p['jml_klp_rknmati']; ?>',

                        <?php endforeach; ?>
                    ],
                    backgroundColor: [
                        'rgba(22, 0, 0, 0.2)',
                        'rgba(22, 0, 0, 0.2)',
                        'rgba(22, 0, 0, 0.2)',
                        'rgba(22, 0, 0, 0.2)'
                    ],
                    borderColor: [
                        'rgba(22, 0, 0, 1)',
                        'rgba(22, 0, 0, 1)',
                        'rgba(22, 0, 0, 1)',
                        'rgba(22, 0, 0, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Keagamaan',
                    data: [<?php foreach ($pokjaI as $p) : ?> '<?= $p['jml_klp_keagamaan']; ?>',

                        <?php endforeach; ?>
                    ],
                    backgroundColor: [
                        ' rgba(234, 149, 241, 0.2)',
                        ' rgba(234, 149, 241, 0.2)',
                        ' rgba(234, 149, 241, 0.2)',
                        ' rgba(234, 149, 241, 0.2)'
                    ],
                    borderColor: [
                        'rgba(234, 149, 241, 1)',
                        'rgba(234, 149, 241, 1)',
                        'rgba(234, 149, 241, 1)',
                        'rgba(234, 149, 241, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Jimpitan',
                    data: [<?php foreach ($pokjaI as $p) : ?> '<?= $p['jml_klp_jimpitan']; ?>',

                        <?php endforeach; ?>
                    ],
                    backgroundColor: [
                        ' rgba(255, 187, 0, 0.2)',
                        ' rgba(255, 187, 0, 0.2)',
                        ' rgba(255, 187, 0, 0.2)',
                        ' rgba(255, 187, 0, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 187, 0, 1)',
                        'rgba(255, 187, 0, 1)',
                        'rgba(255, 187, 0, 1)',
                        'rgba(255, 187, 0, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Arisan',
                    data: [<?php foreach ($pokjaI as $p) : ?> '<?= $p['jml_klp_arisan']; ?>',

                        <?php endforeach; ?>
                    ],
                    backgroundColor: [
                        'rgba(136, 36, 119, 0.2)',
                        'rgba(136, 36, 119, 0.2)',
                        'rgba(136, 36, 119, 0.2)',
                        'rgba(136, 36, 119, 0.2)'
                    ],
                    borderColor: [
                        'rgba(136, 36, 119, 1)',
                        'rgba(136, 36, 119, 1)',
                        'rgba(136, 36, 119, 1)',
                        'rgba(136, 36, 119, 1)'
                    ],
                    borderWidth: 1
                }
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
</script> -->
<br><br>
<a href="/users/rangepokjai" class="btn btn-danger">Kembali</a>
<?= $this->endSection(); ?>