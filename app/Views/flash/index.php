<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Ubah tampilan flash</h5>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashData('pesan'); ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('gagal')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashData('gagal'); ?>
        </div>
    <?php endif; ?>
    <form action="/FlashCon/save" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group row">
            <div class="col-sm-5">
                <div class="custom-file">
                    <input type="file" class="custom-file-input <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" onchange="previewFlash()">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama'); ?>
                    </div>
                    <label class="custom-file-label" for="Nama">Pilih file</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col pt-5">
                <button id="aksi" name="aksi" type="submit" class="btn btn-primary" value="ubah">Ubah</button>
                <button id="aksi" name="aksi" type="submit" class="btn btn-danger" value="batal">Batal</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>