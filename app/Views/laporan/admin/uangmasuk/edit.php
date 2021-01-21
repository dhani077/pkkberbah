<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form Ubah Data Uang Masuk</h5>
    <form action="/UangmasukCon/update/<?= $uangmasuk['no']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="no" value="<?= $uangmasuk['no']; ?>">
        <div class="form-group row">
            <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Uang Diterima</label>
            <div class="col-sm-3">
                <input type="date" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" id="tanggal" name="tanggal" autofocus value="<?= (old('tanggal')) ? old('tanggal') : $uangmasuk['tanggal']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tanggal'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="sumber_dana" class="col-sm-3 col-form-label">Sumber Dana</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('sumber_dana')) ? 'is-invalid' : ''; ?>" id="sumber_dana" name="sumber_dana" value="<?= (old('sumber_dana')) ? old('sumber_dana') : $uangmasuk['sumber_dana']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('sumber_dana'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="uraian" class="col-sm-3 col-form-label">Uraian</label>
            <div class="col-sm-7">
                <input type="text" class="form-control <?= ($validation->hasError('uraian')) ? 'is-invalid' : ''; ?>" id="uraian" name="uraian" value="<?= (old('uraian')) ? old('uraian') : $uangmasuk['uraian']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('uraian'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="no_bukti" class="col-sm-3 col-form-label">Nomor Bukti Kas</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('no_bukti')) ? 'is-invalid' : ''; ?>" id="no_bukti" name="no_bukti" value="<?= (old('no_bukti')) ? old('no_bukti') : $uangmasuk['no_bukti']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('no_bukti'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_terima" class="col-sm-3 col-form-label">Jumlah Penerimaan (Rp.) </label>
            <div class="col-sm-5">
                <input type="number" class="form-control <?= ($validation->hasError('jml_terima')) ? 'is-invalid' : ''; ?>" id="jml_terima" name="jml_terima" value="<?= (old('jml_terima')) ? old('jml_terima') : $uangmasuk['jml_terima']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_terima'); ?>
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