<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5>
        <center>Data Umum PKK Kecamatan</center>
    </h5>
    <div class="table-responsive">
        <table>
            <tr>
                <th>Kecamatan</th>
                <th></th>
                <th>:</th>
                <th><?= $kecamatan; ?></th>
            </tr>
            <tr>
                <th>Kab/Kota</th>
                <th></th>
                <th>:</th>
                <th><?= $kabupaten; ?></th>
            </tr>
            <tr>
                <th>Provinsi</th>
                <th></th>
                <th>:</th>
                <th><?= $provinsi; ?></th>
            </tr>
            <tr>
                <th>Tahun</th>
                <th></th>
                <th>:</th>
                <th><?= $tahun1; ?>/<?= $tahun2; ?></th>
            </tr>
        </table>
    </div>
    <div class="table-responsive pt-2">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col" rowspan="3">NO.</th>
                    <th scope="col" rowspan="3">NAMA<br>DESA/<br>KELURAHAN</th>
                    <th scope="col" colspan="4">JUMLAH KELOMPOK</th>
                    <th scope="col" colspan="2">JUMLAH</th>
                    <th scope="col" colspan="2">JUMLAH JIWA</th>
                    <th scope="col" colspan="6">JUMLAH KADER</th>
                    <th scope="col" colspan="4">JUMLAH TENAGA<br>SEKRETARIS</th>
                    <th scope="col" rowspan="4">KETERANGAN</th>
                </tr>
                <tr>
                    <th scope="col" rowspan="2">DUSUN/<br>LINGKUNGAN</th>
                    <th scope="col" rowspan="2">PKK RT</th>
                    <th scope="col" rowspan="2">PKK RW</th>
                    <th scope="col" rowspan="2">DASA<br>WISMA</th>
                    <th scope="col" rowspan="2">KRT</th>
                    <th scope="col" rowspan="2">KK</th>
                    <th scope="col" rowspan="2">L</th>
                    <th scope="col" rowspan="2">P</th>
                    <th scope="col" colspan="2">ANGGOTA<br>TP PKK</th>
                    <th scope="col" colspan="2">UMUM</th>
                    <th scope="col" colspan="2">KKHUSUS</th>
                    <th scope="col" colspan="2">HONORER</th>
                    <th scope="col" colspan="2">BANTUAN</th>
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
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($dataumumtppkkkec as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['nama_wilayah']; ?></td>
                        <td><?= $k['jml_klp_dusun']; ?></td>
                        <td><?= $k['jml_klp_pkkrw']; ?></td>
                        <td><?= $k['jml_klp_pkkrt']; ?></td>
                        <td><?= $k['jml_klp_dasawisma']; ?></td>
                        <td><?= $k['jml_krt']; ?></td>
                        <td><?= $k['jml_kk']; ?></td>
                        <td><?= $k['jml_jiwa_L']; ?></td>
                        <td><?= $k['jml_jiwa_P']; ?></td>
                        <td><?= $k['jml_kader_angL']; ?></td>
                        <td><?= $k['jml_kader_angP']; ?></td>
                        <td><?= $k['jml_kader_umumL']; ?></td>
                        <td><?= $k['jml_kader_umumP']; ?></td>
                        <td><?= $k['jml_kader_khususL']; ?></td>
                        <td><?= $k['jml_kader_khususP']; ?></td>
                        <td><?= $k['jml_skrt_honorerL']; ?></td>
                        <td><?= $k['jml_skrt_honorerP']; ?></td>
                        <td><?= $k['jml_skrt_bantuanL']; ?></td>
                        <td><?= $k['jml_skrt_bantuanP']; ?></td>
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
                        <td><?= $t['totalL']; ?></td>
                        <td><?= $t['totalP']; ?></td>
                        <td><?= $t['totalangL']; ?></td>
                        <td><?= $t['totalangP']; ?></td>
                        <td><?= $t['totalumumL']; ?></td>
                        <td><?= $t['totalumumP']; ?></td>
                        <td><?= $t['totalkhususL']; ?></td>
                        <td><?= $t['totalkhususP']; ?></td>
                        <td><?= $t['totalhonorerL']; ?></td>
                        <td><?= $t['totalhonorerP']; ?></td>
                        <td><?= $t['totalbantuanL']; ?></td>
                        <td><?= $t['totalbantuanP']; ?></td>
                    <?php endforeach; ?>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <br><br>
    <?php if ($dataumumtppkkkec) : ?>
        <form action="/dataumumtppkkkec/print" method="post" class="d-inline">
            <?= csrf_field(); ?>
            <input type="hidden" id="awal" name="awal" value="<?= $awal; ?>">
            <input type="hidden" id="akhir" name="akhir" value="<?= $akhir; ?>">
            <button id="aksi" name="aksi" type="submit" class="btn btn-outline-secondary" value="print">Cetak Tabel</button>
            <!-- <button id="aksi" name="aksi" type="submit" class="btn btn-danger" value="batal">Batal</button> -->
        </form>
    <?php endif; ?>
</div>

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
                        label: '<?= $dt['nama_wilayah']; ?> (<?= $dt['tahun']; ?>)',
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
<br><br><br>
<form action="/dataumumtppkkkec/print" method="post" class="d-inline">
    <input type="hidden" id="awal" name="awal" value="<?= $awal; ?>">
    <input type="hidden" id="akhir" name="akhir" value="<?= $akhir; ?>">
    <?= csrf_field(); ?>
    <!-- <button id="aksi" name="aksi" type="submit" class="btn btn-outline-secondary" value="grafik">Cetak Grafik</button> -->
    <button id="aksi" name="aksi" type="submit" class="btn btn-danger" value="batal">Kembali</button>
</form>
<?= $this->endSection(); ?>