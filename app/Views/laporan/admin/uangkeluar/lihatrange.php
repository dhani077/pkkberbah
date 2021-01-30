<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <center>
        <h5>Uang Keluar</h5>
    </center>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">TAHUN, BULAN, TANGGAL</th>
                    <th scope="col">SUMBER DANA</th>
                    <th scope="col">URAIAN</th>
                    <th scope="col">NOMOR BUKTI KAS</th>
                    <th scope="col">JUMLAH<br>PENGELUARAN(.Rp)</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($uangkeluar as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['tanggal']; ?></td>
                        <td><?= $k['sumber_dana']; ?></td>
                        <td><?= $k['uraian']; ?></td>
                        <td><?= $k['no_bukti']; ?></td>
                        <td>Rp. <?= $k['jml_keluar']; ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <th colspan="5">Jumlah</th>
                    <?php foreach ($total as $t) : ?>
                        <th>Rp. <?= $t['total']; ?></th>
                    <?php
                    endforeach;
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <?php if ($uangkeluar) : ?>
        <form action="/uangkeluar/print" method="post" class="d-inline">
            <?= csrf_field(); ?>
            <input type="hidden" id="awal" name="awal" value="<?= $awal; ?>">
            <input type="hidden" id="akhir" name="akhir" value="<?= $akhir; ?>">
            <button id="aksi" name="aksi" type="submit" class="btn btn-outline-secondary" value="print">Cetak Tabel</button>
        </form>
    <?php endif; ?>
</div>
<br><br>
<p><b>
        <center>Grafik Uang Keluar <br>Periode <?= date('d F Y', strtotime($awal)); ?> sampai <?= date('d F Y', strtotime($akhir)); ?></center>
    </b></p>
<canvas id="myChart" height="200"></canvas>
<script>
    var warna = ['#c5e417', '#12e20b', '#0dd5f0', '#0b1ae6', '#d10404', '#8f06b1', '#f71bb5', '#94eb6b', '#eba56b', '#6bebb6', '#6badeb', '#5c0000', '#005c4d']
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                'Uang keluar',
            ],
            datasets: [<?php $i = 1; ?>
                <?php foreach ($uangkeluar as $uk) : ?> {
                        label: '<?= date('d F Y', strtotime($uk['tanggal'])); ?>',
                        data: ['<?= $uk['jml_keluar']; ?>', ],
                        backgroundColor: [
                            // 'rgba(255, 99, 132, 0.2)',
                            // 'rgba(54, 162, 235, 0.2)',
                            // 'rgba(255, 206, 86, 0.2)',
                            // 'rgba(75, 192, 192, 0.2)',
                            // 'rgba(153, 102, 255, 0.2)',
                            // 'rgba(255, 159, 64, 0.2)'
                            warna[<?= $i; ?>]
                        ],
                        borderColor: [
                            // 'rgba(255, 99, 132, 1)',
                            // 'rgba(54, 162, 235, 1)',
                            // 'rgba(255, 206, 86, 1)',
                            // 'rgba(75, 192, 192, 1)',
                            // 'rgba(153, 102, 255, 1)',
                            // 'rgba(255, 159, 64, 1)'
                            warna[<?= $i; ?>]
                        ],
                        borderWidth: 1
                    },
                    <?php $i++; ?>
                <?php endforeach; ?>
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
<form action="/uangkeluar/print" method="post" class="d-inline">
    <?= csrf_field(); ?>
    <button id="aksi" name="aksi" type="submit" class="btn btn-danger" value="batal">Kembali</button>
</form>
<?= $this->endSection(); ?>