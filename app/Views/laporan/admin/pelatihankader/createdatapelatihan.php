<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form Tambah Data Pelatihan</h5>
    <form action="/PelatihankaderCon/saveDatapelatihan" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="no_reg" value="<?= $pos; ?>">
        <div class="form-group row">
            <label for="nama_pelatihan" class="col-sm-3 col-form-label">Nama Pelatihan</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('nama_pelatihan')) ? 'is-invalid' : ''; ?>" id="nama_pelatihan" name="nama_pelatihan" value="<?= old('nama_pelatihan'); ?>" autofocus>
                <div class="invalid-feedback">
                    <?= $validation->getError('nama_pelatihan'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="kriteria_kader" class="col-sm-3 col-form-label">Kriteria Kader</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('kriteria_kader')) ? 'is-invalid' : ''; ?>" id="kriteria_kader" name="kriteria_kader" value="<?= old('kriteria_kader'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('kriteria_kader'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="tanggal" class="col-sm-3 col-form-label">Tanggal pelatihan</label>
            <div class="col-sm-3">
                <input type="date" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" id="tanggal" name="tanggal" value="<?= old('tanggal'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tanggal'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="penyelenggara" class="col-sm-3 col-form-label">Penyelenggara</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('penyelenggara')) ? 'is-invalid' : ''; ?>" id="penyelenggara" name="penyelenggara" value="<?= old('penyelenggara'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('penyelenggara'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
            <div class="col-sm-6">
                <textarea type="text" class="form-control" id="keterangan" name="keterangan" value=""><?= old('keterangan'); ?></textarea>
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