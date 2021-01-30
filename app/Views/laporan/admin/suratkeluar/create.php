<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form Tambah Data Surat Keluar</h5>
    <form action="/SuratkeluarCon/save" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group row">
            <label for="no_surat" class="col-sm-3 col-form-label">Nomor Urut Surat</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('no_surat')) ? 'is-invalid' : ''; ?>" id="no_surat" name="no_surat" autofocus value="<?= old('no_surat'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('no_surat'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_surat" class="col-sm-3 col-form-label">Tanggal Surat</label>
            <div class="col-sm-3">
                <input type="date" class="form-control <?= ($validation->hasError('tgl_surat')) ? 'is-invalid' : ''; ?>" id="tgl_surat" name="tgl_surat" value="<?= old('tgl_surat'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tgl_surat'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="kepada" class="col-sm-3 col-form-label">Kepada</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('kepada')) ? 'is-invalid' : ''; ?>" id="kepada" name="kepada" value="<?= old('kepada'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('kepada'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="perihal" class="col-sm-3 col-form-label">Perihal Surat</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('perihal')) ? 'is-invalid' : ''; ?>" id="perihal" name="perihal" value="<?= old('perihal'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('perihal'); ?>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="lampiran" class="col-sm-3 col-form-label">Lampiran</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('lampiran')) ? 'is-invalid' : ''; ?>" id="lampiran" name="lampiran" value="<?= old('lampiran'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('lampiran'); ?>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="tembusan" class="col-sm-3 col-form-label">Tembusan</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('tembusan')) ? 'is-invalid' : ''; ?>" id="tembusan" name="tembusan" value="<?= old('tembusan'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tembusan'); ?>
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