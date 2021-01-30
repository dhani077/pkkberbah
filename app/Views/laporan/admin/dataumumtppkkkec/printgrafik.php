<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dokumen</title>
    <!-- chartjs -->
    <script src="/linechartjs/Chart.js"></script>
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
</body>

</html>
<p><b>
        <center>Grafik Data Umum PKK Kecamatan <br>Periode <?= date('d F Y', strtotime($awal)); ?> sampai <?= date('d F Y', strtotime($akhir)); ?></center>
    </b></p>
<br>
<canvas id="myLineChart" height="200"></canvas>
<script>
    var warna = ['#c5e417', '#12e20b', '#0dd5f0', '#0b1ae6', '#d10404', '#8f06b1', '#f71bb5', '#94eb6b', '#eba56b', '#6bebb6', '#6badeb', '#5c0000', '#005c4d']
    var ctx = document.getElementById('myLineChart');
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Dusun', 'PKK RT', 'PKK RW', 'Dasawisma', 'KRT', 'KK', 'Jiwa(L)', 'Jiwa(P)', 'Anggota TP PKK(L)', 'Anggota TP PKK(P)', 'Kader umum(L)', 'Kader umum(P)', 'Kader khusus(L)', 'Kader khusus(P)', 'Tenaga Honorer(L)', 'Tenaga Honorer(P)', 'Tenaga Bantuan(L)', 'Tenaga Bantuan(P)'],
            datasets: [
                <?php $i = 1;
                foreach ($dataumumtppkkkec as $dt) : ?> {
                        label: '<?= $dt['tahun']; ?>(<?= $dt['nama_wilayah']; ?>)',
                        fill: false,
                        lineTension: 0.3,

                        backgroundColor: warna[<?= $i; ?>],
                        borderColor: warna[<?= $i; ?>],
                        pointHoverBackgroundColor: warna[<?= $i; ?>],
                        pointHoverBorderColor: warna[<?= $i; ?>],

                        data: [
                            <?= $dt['jml_klp_dusun']; ?>,
                            <?= $dt['jml_klp_pkkrw']; ?>,
                            <?= $dt['jml_klp_pkkrt']; ?>,
                            <?= $dt['jml_klp_dasawisma']; ?>,
                            <?= $dt['jml_krt']; ?>,
                            <?= $dt['jml_kk']; ?>,
                            <?= $dt['jml_jiwa_L']; ?>,
                            <?= $dt['jml_jiwa_P']; ?>,
                            <?= $dt['jml_kader_angL']; ?>,
                            <?= $dt['jml_kader_angP']; ?>,
                            <?= $dt['jml_kader_umumL']; ?>,
                            <?= $dt['jml_kader_umumP']; ?>,
                            <?= $dt['jml_kader_khususL']; ?>,
                            <?= $dt['jml_kader_khususP']; ?>,
                            <?= $dt['jml_skrt_honorerL']; ?>,
                            <?= $dt['jml_skrt_honorerP']; ?>,
                            <?= $dt['jml_skrt_bantuanL']; ?>,
                            <?= $dt['jml_skrt_bantuanP']; ?>,
                        ],
                        // backgroundColor: [
                        //     'rgba(255, 99, 132, 0.2)',
                        //     // 'rgba(54, 162, 235, 0.2)',
                        //     // 'rgba(255, 206, 86, 0.2)',
                        //     // 'rgba(75, 192, 192, 0.2)',
                        //     // 'rgba(153, 102, 255, 0.2)',
                        //     // 'rgba(255, 159, 64, 0.2)'
                        // ],
                        // borderColor: [
                        //     'rgba(255, 99, 132, 1)',
                        //     // 'rgba(54, 162, 235, 1)',
                        //     // 'rgba(255, 206, 86, 1)',
                        //     // 'rgba(75, 192, 192, 1)',
                        //     // 'rgba(153, 102, 255, 1)',
                        //     // 'rgba(255, 159, 64, 1)'
                        // ],
                        // borderWidth: 1

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
<script type="text/javascript">
    window.print();
</script>