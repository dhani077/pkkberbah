<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form Ubah Data Uang Keluar</h5>
    <form action="/UangkeluarCon/update/<?= $uangkeluar['no']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="no" value="<?= $uangkeluar['no']; ?>">
        <div class="form-group row">
            <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Pengeluaran</label>
            <div class="col-sm-3">
                <input type="date" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" id="tanggal" name="tanggal" autofocus value="<?= (old('tanggal')) ? old('tanggal') : $uangkeluar['tanggal']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tanggal'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="sumber_dana" class="col-sm-3 col-form-label">Sumber Dana</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('sumber_dana')) ? 'is-invalid' : ''; ?>" id="sumber_dana" name="sumber_dana" value="<?= (old('sumber_dana')) ? old('sumber_dana') : $uangkeluar['sumber_dana']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('sumber_dana'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="uraian" class="col-sm-3 col-form-label">Uraian</label>
            <div class="col-sm-7">
                <input type="text" class="form-control <?= ($validation->hasError('uraian')) ? 'is-invalid' : ''; ?>" id="uraian" name="uraian" value="<?= (old('uraian')) ? old('uraian') : $uangkeluar['uraian']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('uraian'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="no_bukti" class="col-sm-3 col-form-label">Nomor Bukti Kas</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('no_bukti')) ? 'is-invalid' : ''; ?>" id="no_bukti" name="no_bukti" value="<?= (old('no_bukti')) ? old('no_bukti') : $uangkeluar['no_bukti']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('no_bukti'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_keluar" class="col-sm-3 col-form-label">Jumlah Pengeluaran (Rp.) </label>
            <div class="col-sm-4">
                <input type="number" class="form-control <?= ($validation->hasError('jml_keluar')) ? 'is-invalid' : ''; ?>" id="jml_keluar" name="jml_keluar" value="<?= (old('jml_keluar')) ? old('jml_keluar') : $uangkeluar['jml_keluar']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_keluar'); ?>
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