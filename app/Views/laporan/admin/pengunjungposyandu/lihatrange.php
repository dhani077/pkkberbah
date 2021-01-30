<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <center>
        <h5 class="mb-3">
            Jumlah Pengunjung / Jumlah Petugas Posyandu / <br>Jumlah Bayi Lahir/Meninggal
        </h5>
    </center>
    <div class="table-responsive">
        <table>
            <tr>
                <th>Nama posyandu</th>
                <th></th>
                <th> : </th>
                <th><?= $namapos; ?></th>
            </tr>
            <tr>
                <th>Desa/Keluarhan</th>
                <th></th>
                <th> : </th>
                <th><?= $wilayah['kelurahan']; ?></th>
            </tr>
            <tr>
                <th>Kecamatan</th>
                <th></th>
                <th> : </th>
                <th><?= $wilayah['kecamatan']; ?></th>
            </tr>
        </table>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col" rowspan="5">NO.</th>
                    <th scope="col" rowspan="5">TAHUN</th>
                    <th scope="col" rowspan="5">BULAN</th>
                    <th scope="col" colspan="12">JUMLAH PENGUNJUNG</th>
                    <th scope="col" colspan="6">JUMLAH PETUGAS YANG HADIR</th>
                    <th scope="col" colspan="4">JUMLAH BAYI</th>
                    <th scope="col" rowspan="5">KETERANGAN</th>
                </tr>
                <tr>
                    <th scope="col" colspan="8">BALITA</th>
                    <th scope="col" rowspan="4">WUS</th>
                    <th scope="col" colspan="3">IBU</th>
                    <th scope="col" rowspan="3" colspan="2">KADER</th>
                    <th scope="col" rowspan="3" colspan="2">PLKB</th>
                    <th scope="col" rowspan="3" colspan="2">MEDIS DAN<br>PARA MEDIS</th>
                    <th scope="col" rowspan="3" colspan="2">YANG<br>LAHIR</th>
                    <th scope="col" rowspan="3" colspan="2">MENINGGAL</th>
                </tr>
                <tr>
                    <th scope="col" colspan="4">0-12 BLN</th>
                    <th scope="col" colspan="4">1-5 TH</th>
                    <th scope="col" rowspan="3">PUS</th>
                    <th scope="col" rowspan="3">HAMIL</th>
                    <th scope="col" rowspan="3">MENYUSUI</th>
                </tr>
                <tr>
                    <th scope="col" colspan="2">BARU</th>
                    <th scope="col" colspan="2">LAMA</th>
                    <th scope="col" colspan="2">BARU</th>
                    <th scope="col" colspan="2">LAMA</th>
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
                <?php foreach ($datapengunjung as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['tahun']; ?></td>
                        <td><?= $k['bulan']; ?></td>
                        <td><?= $k['jml_pengunjung_sthun_baruL']; ?></td>
                        <td><?= $k['jml_pengunjung_sthun_baruP']; ?></td>
                        <td><?= $k['jml_pengunjung_sthun_lamaL']; ?></td>
                        <td><?= $k['jml_pengunjung_sthun_lamaP']; ?></td>
                        <td><?= $k['jml_pengunjung_limath_baruL']; ?></td>
                        <td><?= $k['jml_pengunjung_limath_baruP']; ?></td>
                        <td><?= $k['jml_pengunjung_limath_lamaL']; ?></td>
                        <td><?= $k['jml_pengunjung_limath_lamaP']; ?></td>
                        <td><?= $k['jml_pengunjung_wus']; ?></td>
                        <td><?= $k['jml_pengunjung_pus_ibu']; ?></td>
                        <td><?= $k['jml_pengunjung_hamil_ibu']; ?></td>
                        <td><?= $k['jml_pengunjung_nyusu_ibu']; ?></td>
                        <td><?= $k['jml_hadir_kader_l']; ?></td>
                        <td><?= $k['jml_hadir_kader_p']; ?></td>
                        <td><?= $k['jml_hadir_plkb_l']; ?></td>
                        <td><?= $k['jml_hadir_plkb_p']; ?></td>
                        <td><?= $k['jml_hadir_medis_l']; ?></td>
                        <td><?= $k['jml_hadir_medis_p']; ?></td>
                        <td><?= $k['jml_bayi_lahirL']; ?></td>
                        <td><?= $k['jml_bayi_lahirP']; ?></td>
                        <td><?= $k['jml_bayi_mnglL']; ?></td>
                        <td><?= $k['jml_bayi_mnglP']; ?></td>
                        <td><?= $k['keterangan']; ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <th colspan="3">Jumlah</th>
                    <?php foreach ($total as $t) : ?>
                        <td><?= $t['totalbarustL']; ?></td>
                        <td><?= $t['totalbarustP']; ?></td>
                        <td><?= $t['totallamastL']; ?></td>
                        <td><?= $t['totallamastP']; ?></td>
                        <td><?= $t['totalbarulmL'] ?></td>
                        <td><?= $t['totalbarulmP']; ?></td>
                        <td><?= $t['totallamalmL']; ?></td>
                        <td><?= $t['totallamalmP']; ?></td>
                        <td><?= $t['totalwus']; ?></td>
                        <td><?= $t['totalpus']; ?></td>
                        <td><?= $t['totalhamil']; ?></td>
                        <td><?= $t['totalnyusu']; ?></td>
                        <td><?= $t['totalkaderL']; ?></td>
                        <td><?= $t['totalkaderP']; ?></td>
                        <td><?= $t['totalplkbL']; ?></td>
                        <td><?= $t['totalplkbP']; ?></td>
                        <td><?= $t['totalmedisL']; ?></td>
                        <td><?= $t['totalmedisP']; ?></td>
                        <td><?= $t['totallahirL']; ?></td>
                        <td><?= $t['totallahirP']; ?></td>
                        <td><?= $t['totalmnglL']; ?></td>
                        <td><?= $t['totalmnglP']; ?></td>
                    <?php endforeach; ?>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <form action="/pengunjungposyandu/print/<?= $kdposyandu; ?>" method="post" class="d-inline">
        <?= csrf_field(); ?>
        <input type="hidden" id="awal" name="awal" value="<?= $awal; ?>">
        <input type="hidden" id="akhir" name="akhir" value="<?= $akhir; ?>">
        <?php if ($datapengunjung) : ?>
            <button id="aksi" name="aksi" type="submit" class="btn btn-outline-secondary" value="print">Cetak Tabel</button>
        <?php endif; ?>
    </form>
</div>
<br><br>
<p><b>
        <center>Grafik Jumlah Pengunjung / Jumlah Petugas Posyandu / <br>Jumlah Bayi Lahir/Meninggal <br>Periode <?= date('d F Y', strtotime($awal)); ?> sampai <?= date('d F Y', strtotime($akhir)); ?></center>
    </b></p>
<canvas id="myLineChart" height="200"></canvas>
<script>
    var warna = ['#c5e417', '#12e20b', '#0dd5f0', '#0b1ae6', '#d10404', '#8f06b1', '#f71bb5', '#94eb6b', '#eba56b', '#6bebb6', '#6badeb', '#5c0000', '#005c4d']
    var ctx = document.getElementById('myLineChart');
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Balita 0-12 bln baru(L)', 'Balita 0-12 bln baru(P)', 'Balita 0-12 bln lama(L)', 'Balita 0-12 bln lama(P)', 'Balita 1-5 th baru(L)', 'Balita 1-5 th baru(P)', 'Balita 1-5 th lama(L)', 'Balita 1-5 th lama(P)', 'WUS', 'Ibu PUS', 'Ibu hamil', 'Ibu menyusui', 'Petugas kader(L)', 'Petugas kader(P)', 'Petugas PLKB(L)', 'Petugas PLKB(P)', 'Medis dan para medis(L)', 'Medis dan para medis(P)', 'Bayi lahir(L)', 'Bayi lahir(P)', 'Bayi meninggal(L)', 'Bayi meninggal(P)'],
            datasets: [
                <?php $i = 1;
                foreach ($datapengunjung as $dp) : ?> {
                        label: '<?= $dp['bulan']; ?>(<?= $dp['tahun']; ?>)',
                        fill: false,
                        lineTension: 0.3,
                        backgroundColor: warna[<?= $i; ?>],
                        borderColor: warna[<?= $i; ?>],
                        pointHoverBackgroundColor: warna[<?= $i; ?>],
                        pointHoverBorderColor: warna[<?= $i; ?>],
                        data: [
                            <?= $dp['jml_pengunjung_sthun_baruL']; ?>,
                            <?= $dp['jml_pengunjung_sthun_baruP']; ?>,
                            <?= $dp['jml_pengunjung_sthun_lamaL']; ?>,
                            <?= $dp['jml_pengunjung_sthun_lamaP']; ?>,
                            <?= $dp['jml_pengunjung_limath_baruL']; ?>,
                            <?= $dp['jml_pengunjung_limath_baruP']; ?>,
                            <?= $dp['jml_pengunjung_limath_lamaL']; ?>,
                            <?= $dp['jml_pengunjung_limath_lamaP']; ?>,
                            <?= $dp['jml_pengunjung_wus']; ?>,
                            <?= $dp['jml_pengunjung_pus_ibu']; ?>,
                            <?= $dp['jml_pengunjung_hamil_ibu']; ?>,
                            <?= $dp['jml_pengunjung_nyusu_ibu']; ?>,
                            <?= $dp['jml_hadir_kader_l']; ?>,
                            <?= $dp['jml_hadir_kader_p']; ?>,
                            <?= $dp['jml_hadir_plkb_l']; ?>,
                            <?= $dp['jml_hadir_plkb_p']; ?>,
                            <?= $dp['jml_hadir_medis_l']; ?>,
                            <?= $dp['jml_hadir_medis_p']; ?>,
                            <?= $dp['jml_bayi_lahirL']; ?>,
                            <?= $dp['jml_bayi_lahirP']; ?>,
                            <?= $dp['jml_bayi_mnglL']; ?>,
                            <?= $dp['jml_bayi_mnglP']; ?>
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
<form action="/pengunjungposyandu/print/<?= $kdposyandu; ?>" method="post" class="d-inline">
    <?= csrf_field(); ?>
    <input type="hidden" id="awal" name="awal" value="<?= $awal; ?>">
    <input type="hidden" id="akhir" name="akhir" value="<?= $akhir; ?>">
    <button id="aksi" name="aksi" type="submit" class="btn btn-danger" value="batal">Kembali</button>
</form>
<?= $this->endSection(); ?>