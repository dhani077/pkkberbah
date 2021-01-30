<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form tambah data Industri Rumah Tangga</h5>
    <form action="/IndustrirtCon/save" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group row">
            <label for="tgl_pendataan" class="col-sm-4 col-form-label">Tanggal Pendataan</label>
            <div class="col-sm-3">
                <input type="date" class="form-control <?= ($validation->hasError('tgl_pendataan')) ? 'is-invalid' : ''; ?>" id="tgl_pendataan" name="tgl_pendataan" value="<?= old('tgl_pendataan'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tgl_pendataan'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="kategori" class="col-sm-4 col-form-label">Kategori jenis industri rumah tangga yang diusahakan</label>
            <div class="col-sm-4">
                <input type="text" class="form-control <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>" id="kategori" name="kategori" autofocus value="<?= old('kategori'); ?>">
                <p>(misal : pangan, sandang, konveksi, jasa, dll)</p>
                <div class="invalid-feedback">
                    <?= $validation->getError('kategori'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="komoditi" class="col-sm-4 pt-3 col-form-label">Komoditi yang diusahakan</label>
            <div class="col-sm-4">
                <input type="text" class="form-control <?= ($validation->hasError('komoditi')) ? 'is-invalid' : ''; ?>" id="komoditi" name="komoditi" value="<?= old('komoditi'); ?>">
                <p>(misal : catering, beras, pakaian jadi, dll)</p>
                <div class="invalid-feedback">
                    <?= $validation->getError('komoditi'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="volume" class="col-sm-4 pt-3 col-form-label">Volume komoditi yang dikelola</label>
            <div class="col-sm-4">
                <input type="volume" class="form-control <?= ($validation->hasError('volume')) ? 'is-invalid' : ''; ?>" id="volume" name="volume" value="<?= old('volume'); ?>">
                <p>(misal : 100 porsi, 100 ton, 100 lusin, dll)</p>
                <div class="invalid-feedback">
                    <?= $validation->getError('volume'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col pt-5">
                <button id="aksi" name="aksi" type="submit" class="btn btn-primary" value="tambah">Tambah data</button>
                <button id="aksi" name="aksi" type="submit" class="btn btn-danger" value="batal">Batal</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>