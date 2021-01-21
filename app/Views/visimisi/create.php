<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<h4 class="my-3">Form Tambah Visi Misi</h4>
<form action="/VisiMisiCon/save" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="form-group row">
        <label for="visi" class="col-sm-2 pt-5 col-form-label">Visi</label>
        <div class="col-sm-9 pt-5">
            <textarea type="text" class="form-control <?= ($validation->hasError('visi')) ? 'is-invalid' : ''; ?>" id="visi" name="visi" autofocus value="<?= old('visi'); ?>"><?= old('visi'); ?></textarea>
            <div class="invalid-feedback">
                <?= $validation->getError('visi'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="misi" class="col-sm-2 pt-3 col-form-label">Misi</label>
        <div class="col-sm-9 pt-3">
            <textarea type="text" class="form-control <?= ($validation->hasError('misi')) ? 'is-invalid' : ''; ?>" id="misi" name="misi" autofocus value="<?= old('misi'); ?>"><?= old('misi'); ?></textarea>
            <div class="invalid-feedback">
                <?= $validation->getError('misi'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="pt-5">
            <button id="aksi" name="aksi" type="submit" class="btn btn-primary" value="tambah">Tambah data</button>
            <button id="aksi" name="aksi" type="submit" class="btn btn-danger" value="batal">Batal</button>
        </div>
    </div>
</form>

<?= $this->endSection(); ?>