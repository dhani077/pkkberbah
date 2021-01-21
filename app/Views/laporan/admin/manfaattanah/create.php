<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form Tambah Data Pemanfaatan Tanah Pekarangan</h5>
    <form action="/ManfaattanahCon/save" method="post" enctype="multipart/form-data">
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
            <label for="kategori" class="col-sm-4 col-form-label">Kategori jenis pemanfaatan lahan</label>
            <div class="col-sm-7">
                <input type="text" class="form-control <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>" id="kategori" name="kategori" autofocus value="<?= old('kategori'); ?>">
                <p>(misal : peternakan, perikanan, warung hidup, toga, tanaman keras, dll)</p>
                <div class="invalid-feedback">
                    <?= $validation->getError('kategori'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="komoditi" class="col-sm-4 col-form-label">Komoditi yang dibudidayakan</label>
            <div class="col-sm-7 pt-3">
                <input type="text" class="form-control <?= ($validation->hasError('komoditi')) ? 'is-invalid' : ''; ?>" id="komoditi" name="komoditi" value="<?= old('komoditi'); ?>">
                <p>(misal : kopi, ayam, lele, wortel, sawi, dll)</p>
                <div class="invalid-feedback">
                    <?= $validation->getError('komoditi'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jumlah" class="col-sm-4 col-form-label">Jumlah komoditi yang dibudidayakan</label>
            <div class="col-sm-7">
                <input type="text" class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" id="jumlah" name="jumlah" value="<?= old('jumlah'); ?>">
                <p>(misal : 100 ekor, 100 pohon, dll)</p>
                <div class="invalid-feedback">
                    <?= $validation->getError('jumlah'); ?>
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