<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <center>
        <h5>Kejar Paket</h5>
    </center>
    <div class="row">
        <div class="col">
            <table>
                <tr>
                    <th>Kelurahan</th>
                    <th></th>
                    <th>:</th>
                    <th><?= $kelurahan; ?></th>
                </tr>
                <tr>
                    <th>Kab/Kota</th>
                    <th></th>
                    <th>:</th>
                    <th><?= $kabupaten; ?></th>
                </tr>
            </table>
        </div>
        <div class="col">
            <table>
                <tr>
                    <th>Kecamatan</th>
                    <th></th>
                    <th>:</th>
                    <th><?= $kecamatan; ?></th>
                </tr>
                <tr>
                    <th>Provinsi</th>
                    <th></th>
                    <th>:</th>
                    <th><?= $provinsi; ?></th>
                </tr>
            </table>
        </div>
    </div>
    <div class="table-responsive pt-2">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col" rowspan="2">NO.</th>
                    <th scope="col" rowspan="2">NAMA KEJAR PAKET/KF/PAUD</th>
                    <th scope="col" rowspan="2">JENIS PAKET<br>(A/B/C/KF/PAUD)</th>
                    <th scope="col" rowspan="2">TANGGAL MULAI</th>
                    <th scope="col" colspan="2">JUMLAH WARGA<br>BELAJAR/SISWA</th>
                    <th scope="col" colspan="2">JUMLAH PENGAJAR</th>
                </tr>
                <tr>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($kejarpaket as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['nama_paket']; ?></td>
                        <td><?= $k['jns_paket']; ?></td>
                        <td><?= $k['tgl_mulai']; ?></td>
                        <td><?= $k['jml_wrg_bljr_L']; ?></td>
                        <td><?= $k['jml_wrg_bljr_P']; ?></td>
                        <td><?= $k['jml_pengajar_L']; ?></td>
                        <td><?= $k['jml_pengajar_P']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br>
    <form action="/kejarpaket/print/<?= $kdwilayah; ?>" method="post" class="d-inline">
        <?= csrf_field(); ?>
        <input type="hidden" id="awal" name="awal" value="<?= $awal; ?>">
        <input type="hidden" id="akhir" name="akhir" value="<?= $akhir; ?>">
        <?php if ($kejarpaket) : ?>
            <button id="aksi" name="aksi" type="submit" class="btn btn-outline-secondary" value="print">Cetak Tabel</button>
        <?php endif; ?>
    </form>
</div>
<br><br>
<p><b>
        <center>Grafik Kejar Paket <br>Kelurahan <?= $kelurahan; ?> Kecamatan <?= $kecamatan; ?> <br>Periode <?= date('d F Y', strtotime($awal)); ?> sampai <?= date('d F Y', strtotime($akhir)); ?></center>
    </b></p>
<canvas id="myChart" height="200"></canvas>
<script>
    var warna = ['#c5e417', '#12e20b', '#0dd5f0', '#0b1ae6', '#d10404', '#8f06b1', '#f71bb5', '#94eb6b', '#eba56b', '#6bebb6', '#6badeb', '#5c0000', '#005c4d']
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php foreach ($kejarpaket as $kp) : ?> '<?= $kp['nama_paket']; ?>', <?php endforeach; ?>
            ],
            datasets: [{
                    label: 'Warga belajar/siswa(L)',
                    data: [<?php foreach ($kejarpaket as $kp) : ?> '<?= $kp['jml_wrg_bljr_L']; ?>', <?php endforeach; ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Warga belajar/siswa(P)',
                    data: [<?php foreach ($kejarpaket as $kp) : ?> '<?= $kp['jml_wrg_bljr_P']; ?>', <?php endforeach; ?>],
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
                    label: 'Jumlah Pengajar(L)',
                    data: [<?php foreach ($kejarpaket as $kp) : ?> '<?= $kp['jml_pengajar_L']; ?>', <?php endforeach; ?>],
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
                    label: 'Jumlah Pengajar(P)',
                    data: [<?php foreach ($kejarpaket as $kp) : ?> '<?= $kp['jml_pengajar_P']; ?>', <?php endforeach; ?>],
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
<form action="/kejarpaket/print/<?= $kdwilayah; ?>" method="post" class="d-inline">
    <?= csrf_field(); ?>
    <button id="aksi" name="aksi" type="submit" class="btn btn-danger" value="batal">Kembali</button>
</form>
<?= $this->endSection(); ?>