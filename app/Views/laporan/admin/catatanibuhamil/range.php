<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <form action="/catatanibuhamil/lihatrange" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <p><b>Rekapitulasi Data Ibu Hamil, Melahirkan, Nifas, Meninggal, Kelahiran Bayi, Bayi Meninggal Dan Kematian Balita</b></p>
        <div class="form-group col">
            <label for="awal" class="col-sm">Dari tanggal</label>
            <div class="col-sm-3">
                <div class="custom-file">
                    <select class="form-control <?= ($validation->hasError('range')) ? 'is-invalid' : ''; ?>" id="awal" name="awal" autofocus>
                        <?php foreach ($catatanibuhamil as $ch) : ?>
                            <option value="<?= $ch['tanggal']; ?>"><?= $ch['tanggal']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('range'); ?>
                    </div>
                </div>
            </div>
            <label for="akhir" class="col-sm">sampai tanggal</label>
            <div class="col-sm-3">
                <div class="custom-file">
                    <select class="form-control <?= ($validation->hasError('range')) ? 'is-invalid' : ''; ?>" id="akhir" name="akhir" autofocus>
                        <?php foreach ($catatanibuhamil as $ch) : ?>
                            <option value="<?= $ch['tanggal']; ?>"><?= $ch['tanggal']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('range'); ?>
                    </div>
                </div>
            </div>
            <div class="col pt-5">
                <button id="aksi" name="aksi" type="submit" class="btn btn-success" value="lihat">Lihat</button>
                <button id="aksi" name="aksi" type="submit" class="btn btn-danger" value="batal">Batal</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>