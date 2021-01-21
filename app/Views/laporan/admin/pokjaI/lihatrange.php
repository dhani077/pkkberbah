<?= $this->extend('layout/admin/template'); ?>

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
    <br>
    <?php if ($pokjaI) : ?>
        <form action="/pokjai/print" method="post" class="d-inline">
            <input type="hidden" id="awal" name="awal" value="<?= $awal; ?>">
            <input type="hidden" id="akhir" name="akhir" value="<?= $akhir; ?>">
            <?= csrf_field(); ?>
            <button id="aksi" name="aksi" type="submit" class="btn btn-outline-secondary" value="print">Cetak Tabel</button>
        </form>
    <?php endif; ?>
</div>
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
                                label: '<?= $w['kelurahan']; ?> (<?= $p['tahun']; ?>)',
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
<form action="/pokjai/print" method="post" class="d-inline">
    <?= csrf_field(); ?>
    <button id="aksi" name="aksi" type="submit" class="btn btn-danger" value="batal">Kembali</button>
</form>
<?= $this->endSection(); ?>