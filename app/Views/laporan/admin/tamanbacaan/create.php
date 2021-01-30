<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form Tambah Daftar Taman Bacaan</h5>
    <form action="/TamanbacaanCon/save/<?= $kdwilayah; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group row">
            <input type="hidden" name="kd_wilayah" value="<?= $kdwilayah; ?>">
            <label for="kd_wilayah" class="col-sm-3 col-form-label">Desa/Kelurahan</label>
            <div class="col-sm-4">
                <select class="form-control" id="kd_wilayah" name="kd_wilayah" readonly>
                    <option value="<?= $kdwilayah; ?>"><?= $kelurahan; ?></option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="nama_taman" class="col-sm-3 col-form-label">Nama Taman Bacaan</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('nama_taman')) ? 'is-invalid' : ''; ?>" id="nama_taman" name="nama_taman" value="<?= old('nama_taman'); ?>" autofocus>
                <div class="invalid-feedback">
                    <?= $validation->getError('nama_taman'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="pengelola" class="col-sm-3 col-form-label">Pengelola</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('pengelola')) ? 'is-invalid' : ''; ?>" id="pengelola" name="pengelola" value="<?= old('pengelola'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('pengelola'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_buku" class="col-sm-3 col-form-label">Jumlah Buku</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_buku')) ? 'is-invalid' : ''; ?>" id="jml_buku" name="jml_buku" value="<?= old('jml_buku'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_buku'); ?>
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