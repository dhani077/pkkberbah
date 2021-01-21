<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<h5 class="mb-5">Form Tambah Daftar Posyandu</h5>
<form action="/PosyanduCon/save" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="form-group row">
        <label for="kd_wilayah" class="col-sm-3 col-form-label">Desa/Kelurahan</label>
        <div class="col-sm-4">
            <select class="form-control" id="kd_wilayah" name="kd_wilayah" readonly>
                <option value="<?= $kdwilayah; ?>"><?= $kelurahan; ?></option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="nama_posyandu" class="col-sm-3 col-form-label">Nama Posyandu</label>
        <div class="col-sm-6">
            <input type="text" class="form-control <?= ($validation->hasError('nama_posyandu')) ? 'is-invalid' : ''; ?>" id="nama_posyandu" name="nama_posyandu" value="<?= old('nama_posyandu'); ?>" autofocus>
            <div class="invalid-feedback">
                <?= $validation->getError('nama_posyandu'); ?>
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
        <label for="sekretaris" class="col-sm-3 col-form-label">Sekretaris</label>
        <div class="col-sm-6">
            <input type="text" class="form-control <?= ($validation->hasError('sekretaris')) ? 'is-invalid' : ''; ?>" id="sekretaris" name="sekretaris" value="<?= old('sekretaris'); ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('sekretaris'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="jns_posyandu" class="col-sm-3 col-form-label">Jenis Posyandu</label>
        <div class="col-sm-6">
            <input type="text" class="form-control <?= ($validation->hasError('jns_posyandu')) ? 'is-invalid' : ''; ?>" id="jns_posyandu" name="jns_posyandu" value="<?= old('jns_posyandu'); ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('jns_posyandu'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="jml_kader" class="col-sm-3 col-form-label">Jumlah Kader</label>
        <div class="col-sm-2">
            <input type="number" class="form-control <?= ($validation->hasError('jml_kader')) ? 'is-invalid' : ''; ?>" id="jml_kader" name="jml_kader" value="<?= old('jml_kader'); ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('jml_kader'); ?>
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

<?= $this->endSection(); ?>