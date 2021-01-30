<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form Tambah Data Surat Masuk</h5>
    <form action="/SuratmasukCon/save" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group row">
            <label for="tgl_terima" class="col-sm-3 col-form-label">Tanggal surat diterima</label>
            <div class="col-sm-3">
                <input type="date" class="form-control <?= ($validation->hasError('tgl_terima')) ? 'is-invalid' : ''; ?>" id="tgl_terima" name="tgl_terima" autofocus value="<?= old('tgl_terima'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tgl_terima'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_surat" class="col-sm-3 col-form-label">Tanggal surat </label>
            <div class="col-sm-3">
                <input type="date" class="form-control <?= ($validation->hasError('tgl_surat')) ? 'is-invalid' : ''; ?>" id="tgl_surat" name="tgl_surat" value="<?= old('tgl_surat'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tgl_surat'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="no_surat" class="col-sm-3 col-form-label">Nomor surat</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('no_surat')) ? 'is-invalid' : ''; ?>" id="no_surat" name="no_surat" value="<?= old('no_surat'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('no_surat'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="asal_surat" class="col-sm-3 col-form-label">Asal surat dari</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('asal_surat')) ? 'is-invalid' : ''; ?>" id="asal_surat" name="asal_surat" value="<?= old('asal_surat'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('asal_surat'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="perihal" class="col-sm-3 col-form-label">Perihal surat</label>
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
            <label for="teruskan_kpd" class="col-sm-3 col-form-label">Teruskan Kepada</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('teruskan_kpd')) ? 'is-invalid' : ''; ?>" id="teruskan_kpd" name="teruskan_kpd" value="<?= old('teruskan_kpd'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('teruskan_kpd'); ?>
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