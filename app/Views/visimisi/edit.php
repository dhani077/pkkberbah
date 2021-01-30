<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form ubah Visi Misi</h5>
    <form action="/VisiMisiCon/update/<?= $getvisimisi['id']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="no" value="<?= $visimisi['id']; ?>">
        <div class="form-group row">
            <label for="visi" class="col-sm-2 col-form-label">Visi</label>
            <div class="col-sm-12">
                <textarea type="text" class="form-control <?= ($validation->hasError('visi')) ? 'is-invalid' : ''; ?>" id="visi" name="visi" autofocus value="<?= old('visi'); ?>"><?= (old('visi')) ? old('visi') : $getvisimisi['visi']; ?></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('visi'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="misi" class="col-sm-2 col-form-label">Misi</label>
            <div class="col-sm-12">
                <textarea style="height: 200px;" type="text" class="form-control <?= ($validation->hasError('misi')) ? 'is-invalid' : ''; ?>" id="misi" name="misi" autofocus value="<?= old('misi'); ?>"><?= (old('misi')) ? old('misi') : $getvisimisi['misi']; ?></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('misi'); ?>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col pt-5">
                <button id="aksi" name="aksi" type="submit" class="btn btn-primary" value="tambah">Simpan</button>
                <button id="aksi" name="aksi" type="submit" class="btn btn-danger" value="batal">Batal</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>