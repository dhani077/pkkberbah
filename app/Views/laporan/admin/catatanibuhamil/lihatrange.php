<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5>
        <center>Rekapitulasi Data<br>Ibu Hamil, Melahirkan, Nifas, Meninggal, Kelahiran Bayi,<br> Bayi Meninggal Dan Kematian Balita</center>
    </h5>
    <table>
        <tr>
            <th>Kecamatan
            </th>
            <th></th>
            <th>:</th>
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
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col" rowspan="3">NO.</th>
                    <th scope="col" rowspan="3">NAMA DESA/<br>KELURAHAN</th>
                    <th scope="col" rowspan="3">TAHUN</th>
                    <th scope="col" rowspan="3">BULAN</th>
                    <th scope="col" colspan="4">JUMLAH</th>
                    <th scope="col" rowspan="2" colspan="4">JUMLAH IBU</th>
                    <th scope="col" colspan="6">JUMLAH BAYI</th>
                    <th scope="col" colspan="2" rowspan="2">JUMLAH BALITA<br>MENINGGAL</th>
                    <th scope="col" rowspan="3">KETERANGAN</th>
                </tr>
                <tr>
                    <th scope="col" rowspan="2">DUSUN/<br>LINGKUNGAN</th>
                    <th scope="col" rowspan="2">RW</th>
                    <th scope="col" rowspan="2">RT</th>
                    <th scope="col" rowspan="2">DASA<br>WISMA</th>
                    <th scope="col" colspan="2">LAHIR</th>
                    <th scope="col" colspan="2">AKTE<br>KELAHIRAN</th>
                    <th scope="col" colspan="2">MENINGGAL</th>
                </tr>
                <tr>
                    <th scope="col">HAMIL</th>
                    <th scope="col">MELAHIRKAN</th>
                    <th scope="col">NIFAS</th>
                    <th scope="col">MENINGGAL</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">ADA</th>
                    <th scope="col">TIDAK</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($catatanibuhamil as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['nama_kelurahan']; ?></td>
                        <td><?= $k['tahun']; ?></td>
                        <?php if ($k['bulan'] == '01') {
                            $bulan = 'Januari';
                        } elseif ($k['bulan'] == '02') {
                            $bulan = 'Februari';
                        } elseif ($k['bulan'] == '03') {
                            $bulan = 'Maret';
                        } elseif ($k['bulan'] == '04') {
                            $bulan = 'April';
                        } elseif ($k['bulan'] == '05') {
                            $bulan = 'Mei';
                        } elseif ($k['bulan'] == '06') {
                            $bulan = 'Juni';
                        } elseif ($k['bulan'] == '07') {
                            $bulan = 'Juli';
                        } elseif ($k['bulan'] == '08') {
                            $bulan = 'Agustus';
                        } elseif ($k['bulan'] == '09') {
                            $bulan = 'Sepetember';
                        } elseif ($k['bulan'] == '10') {
                            $bulan = 'Oktober';
                        } elseif ($k['bulan'] == '11') {
                            $bulan = 'November';
                        } elseif ($k['bulan'] == '12') {
                            $bulan = 'Desember';
                        }
                        ?>
                        <td><?= $bulan; ?></td>
                        <td><?= $k['jml_dusun']; ?></td>
                        <td><?= $k['jml_rw']; ?></td>
                        <td><?= $k['jml_rt']; ?></td>
                        <td><?= $k['jml_dasawisma']; ?></td>
                        <td><?= $k['jml_ibu_hamil']; ?></td>
                        <td><?= $k['jml_ibu_melahir']; ?></td>
                        <td><?= $k['jml_ibu_nifas']; ?></td>
                        <td><?= $k['jml_ibu_mngl']; ?></td>
                        <td><?= $k['jml_bayi_lahirL']; ?></td>
                        <td><?= $k['jml_bayi_LahirP']; ?></td>
                        <td><?= $k['jml_bayi_akte_ada']; ?></td>
                        <td><?= $k['jml_bayi_akte_tidak']; ?></td>
                        <td><?= $k['jml_bayi_mnglL']; ?></td>
                        <td><?= $k['jml_bayi_mnglP']; ?></td>
                        <td><?= $k['jml_balita_mnglL']; ?></td>
                        <td><?= $k['jml_balita_mnglP']; ?></td>
                        <td><?= $k['keterangan']; ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <th colspan="4">Jumlah</th>
                    <?php foreach ($total as $t) : ?>
                        <td><?= $t['totaldusun']; ?></td>
                        <td><?= $t['totalrw']; ?></td>
                        <td><?= $t['totalrt']; ?></td>
                        <td><?= $t['totaldasawisma']; ?></td>
                        <td><?= $t['totalhamil']; ?></td>
                        <td><?= $t['totallahir']; ?></td>
                        <td><?= $t['totalnifas']; ?></td>
                        <td><?= $t['totalmngl']; ?></td>
                        <td><?= $t['totallahirL']; ?></td>
                        <td><?= $t['totallahirP']; ?></td>
                        <td><?= $t['totalakte']; ?></td>
                        <td><?= $t['totalaktetdk']; ?></td>
                        <td><?= $t['totalmnglL']; ?></td>
                        <td><?= $t['totalmnglP']; ?></td>
                        <td><?= $t['totalblitmnglL']; ?></td>
                        <td><?= $t['totalblitmnglP']; ?></td>
                    <?php endforeach; ?>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <br><br>
    <form action="/catatanibuhamil/print" method="post" class="d-inline">
        <?= csrf_field(); ?>
        <input type="hidden" id="awal" name="awal" value="<?= $awal; ?>">
        <input type="hidden" id="akhir" name="akhir" value="<?= $akhir; ?>">
        <?php if ($catatanibuhamil) : ?>
            <button id="aksi" name="aksi" type="submit" class="btn btn-outline-secondary" value="print">Cetak Tabel</button>
        <?php endif; ?>
    </form>
</div>
<br><br>
<p><b>
        <center>Grafik Rekapitulasi Data<br>Ibu Hamil, Melahirkan, Nifas, Meninggal, Kelahiran Bayi,<br> Bayi Meninggal Dan Kematian Balita <br>Periode <?= date('d F Y', strtotime($awal)); ?> sampai <?= date('d F Y', strtotime($akhir)); ?></center>
    </b></p>
<br>
<canvas id="myLineChart" height="200"></canvas>
<script>
    var warna = ['#c5e417', '#12e20b', '#0dd5f0', '#0b1ae6', '#d10404', '#8f06b1', '#f71bb5', '#94eb6b', '#eba56b', '#6bebb6', '#6badeb', '#5c0000', '#005c4d']
    var ctx = document.getElementById('myLineChart');
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Dusun', 'RW', 'RT', 'Dasawisma', 'Ibu Hamil', 'Ibu Melahirkan', 'Ibu Nifas', 'Ibu Meninggal', 'Bayi Lahir(L)', 'Bayi Lahir(P)', 'Akte Lahir Bayi(Ada)', 'Akte Lahir Bayi(Tidak Ada)', 'Bayi Meninggal(L)', 'Bayi Meninggal(P)', 'Balita Meninggal(L)', 'Balita Meninggal(P)'],
            datasets: [
                <?php $i = 1;
                foreach ($catatanibuhamil as $t) : ?> {
                        <?php if ($t['bulan'] == '01') {
                            $bulan = 'Januari';
                        } elseif ($t['bulan'] == '02') {
                            $bulan = 'Februari';
                        } elseif ($t['bulan'] == '03') {
                            $bulan = 'Maret';
                        } elseif ($t['bulan'] == '04') {
                            $bulan = 'April';
                        } elseif ($t['bulan'] == '05') {
                            $bulan = 'Mei';
                        } elseif ($t['bulan'] == '06') {
                            $bulan = 'Juni';
                        } elseif ($t['bulan'] == '07') {
                            $bulan = 'Juli';
                        } elseif ($t['bulan'] == '08') {
                            $bulan = 'Agustus';
                        } elseif ($t['bulan'] == '09') {
                            $bulan = 'Sepetember';
                        } elseif ($t['bulan'] == '10') {
                            $bulan = 'Oktober';
                        } elseif ($t['bulan'] == '11') {
                            $bulan = 'November';
                        } elseif ($t['bulan'] == '12') {
                            $bulan = 'Desember';
                        }
                        ?>
                        label: '<?= $t['nama_kelurahan']; ?>(<?= $bulan; ?>/<?= $t['tahun']; ?>)',
                            fill: false,
                            lineTension: 0.3,
                            backgroundColor: warna[<?= $i; ?>],
                            borderColor: warna[<?= $i; ?>],
                            pointHoverBackgroundColor: warna[<?= $i; ?>],
                            pointHoverBorderColor: warna[<?= $i; ?>],
                            data: [
                                <?= $t['jml_dusun']; ?>,
                                <?= $t['jml_rw']; ?>,
                                <?= $t['jml_rt']; ?>,
                                <?= $t['jml_dasawisma']; ?>,
                                <?= $t['jml_ibu_hamil']; ?>,
                                <?= $t['jml_ibu_melahir']; ?>,
                                <?= $t['jml_ibu_nifas']; ?>,
                                <?= $t['jml_ibu_mngl']; ?>,
                                <?= $t['jml_bayi_lahirL']; ?>,
                                <?= $t['jml_bayi_LahirP']; ?>,
                                <?= $t['jml_bayi_akte_ada']; ?>,
                                <?= $t['jml_bayi_akte_tidak']; ?>,
                                <?= $t['jml_bayi_mnglL']; ?>,
                                <?= $t['jml_bayi_mnglP']; ?>,
                                <?= $t['jml_balita_mnglL']; ?>,
                                <?= $t['jml_balita_mnglP']; ?>
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
<form action="/catatanibuhamil/print" method="post" class="d-inline">
    <?= csrf_field(); ?>
    <input type="hidden" id="awal" name="awal" value="<?= $awal; ?>">
    <input type="hidden" id="akhir" name="akhir" value="<?= $akhir; ?>">
    <button id="aksi" name="aksi" type="submit" class="btn btn-danger" value="batal">Kembali</button>
</form>
<?= $this->endSection(); ?>