<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">
        <center>Rekapitulasi Data<br>Ibu Hamil, Melahirkan, Nifas, Meninggal, Kelahiran Bayi, Bayi Meninggal <br>Dan Kematian Balita</center>
    </h5>
    <a href="/catatanibuhamil/create" class="btn btn-primary">Tambah Catatan Ibu Hamil</a>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashData('pesan'); ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('hapus')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashData('hapus'); ?>
        </div>
    <?php endif; ?>
    <div class="pt-2">
        <table>
            <tr>
                <th>Tahun</th>
            </tr>
        </table>
        <form action="/catatanibuhamil/bulan" method="post" enctype="multipart/form-data">
            <div class="col">
                <div class="form-group row">
                    <select id="tahun" name="tahun">
                        <?php foreach ($catatanibuhamil as $c) : ?>
                            <option value="<?= $c['tahun']; ?>"><?= $c['tahun']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="btn btn-success">Lihat</button>
                    <!-- <div class="invalid-feedback">
                </?= $validation->getError('nama_wilayah'); ?>
            </div> -->
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endsection(); ?>