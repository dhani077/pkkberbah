<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5>
        <center>Rekapitulasi Data<br>Ibu Hamil, Melahirkan, Nifas, Meninggal, Kelahiran Bayi, Bayi Meninggal Dan Kematian Balita <br>Tahun <?= $tahun; ?></center>
    </h5>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashData('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="pt-5">
        <table>
            <tr>
                <th>Bulan</th>
            </tr>
            <?php foreach ($catatanibuhamil as $b) : ?>
                <?php if ($b['bulan'] == '01') {
                    $bulan = 'Januari';
                } elseif ($b['bulan'] == '02') {
                    $bulan = 'Februari';
                } elseif ($b['bulan'] == '03') {
                    $bulan = 'Maret';
                } elseif ($b['bulan'] == '04') {
                    $bulan = 'April';
                } elseif ($b['bulan'] == '05') {
                    $bulan = 'Mei';
                } elseif ($b['bulan'] == '06') {
                    $bulan = 'Juni';
                } elseif ($b['bulan'] == '07') {
                    $bulan = 'Juli';
                } elseif ($b['bulan'] == '08') {
                    $bulan = 'Agustus';
                } elseif ($b['bulan'] == '09') {
                    $bulan = 'Sepetember';
                } elseif ($b['bulan'] == '10') {
                    $bulan = 'Oktober';
                } elseif ($b['bulan'] == '11') {
                    $bulan = 'November';
                } elseif ($b['bulan'] == '12') {
                    $bulan = 'Desember';
                }
                ?>
                <tr>
                    <td><a href="/catatanibuhamil/detail/<?= $b['bulan']; ?>/<?= $tahun; ?>" class="btn btn-warning"><?= $bulan; ?></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <br><br>
    <a href="/catatanibuhamil/index" class="btn btn-outline-danger">Kembali ke daftar tahun</a>
</div>

<?= $this->endsection(); ?>