<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form Ubah Data Surat Masuk</h5>
    <form action="/SuratmasukCon/update/<?= $suratmasuk['no']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="no" value="<?= $suratmasuk['no']; ?>">
        <div class="form-group row">
            <label for="tgl_terima" class="col-sm-3 col-form-label">Tanggal Surat Diterima</label>
            <div class="col-sm-3">
                <input type="date" class="form-control <?= ($validation->hasError('tgl_terima')) ? 'is-invalid' : ''; ?>" id="tgl_terima" name="tgl_terima" autofocus value="<?= (old('tgl_terima')) ? old('tgl_terima') : $suratmasuk['tgl_terima']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tgl_terima'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_surat" class="col-sm-3 col-form-label">Tanggal Surat</label>
            <div class="col-sm-3">
                <input type="date" class="form-control <?= ($validation->hasError('tgl_surat')) ? 'is-invalid' : ''; ?>" id="tgl_surat" name="tgl_surat" value="<?= (old('tgl_surat')) ? old('tgl_surat') : $suratmasuk['tgl_surat']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tgl_surat'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="no_surat" class="col-sm-3 col-form-label">Nomor Surat</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('no_surat')) ? 'is-invalid' : ''; ?>" id="no_surat" name="no_surat" value="<?= (old('no_surat')) ? old('no_surat') : $suratmasuk['no_surat']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('no_surat'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="asal_surat" class="col-sm-3 col-form-label">Asal Surat Dari</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('asal_surat')) ? 'is-invalid' : ''; ?>" id="asal_surat" name="asal_surat" value="<?= (old('asal_surat')) ? old('asal_surat') : $suratmasuk['asal_surat']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('asal_surat'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="perihal" class="col-sm-3 col-form-label">Perihal Surat</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('perihal')) ? 'is-invalid' : ''; ?>" id="perihal" name="perihal" value="<?= (old('perihal')) ? old('perihal') : $suratmasuk['perihal']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('perihal'); ?>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="lampiran" class="col-sm-3 col-form-label">Lampiran</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('lampiran')) ? 'is-invalid' : ''; ?>" id="lampiran" name="lampiran" value="<?= (old('lampiran')) ? old('lampiran') : $suratmasuk['lampiran']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('lampiran'); ?>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="teruskan_kpd" class="col-sm-3 col-form-label">Teruskan Kepada</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('teruskan_kpd')) ? 'is-invalid' : ''; ?>" id="teruskan_kpd" name="teruskan_kpd" value="<?= (old('teruskan_kpd')) ? old('teruskan_kpd') : $suratmasuk['teruskan_kpd']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('teruskan_kpd'); ?>
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