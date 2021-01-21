<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form Ubah Daftar Taman Bacaan</h5>
    <form action="/TamanbacaanCon/update/<?= $taman['kd_taman']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="kd_taman" value="<?= $taman['kd_taman']; ?>">
        <div class="form-group row">
            <label for="kd_wilayah" class="col-sm-3 col-form-label">Desa/Kelurahan</label>
            <div class="col-sm-4">
                <select class="form-control" id="kd_wilayah" name="kd_wilayah" readonly>
                    <option value="<?= (old('kd_wilayah')) ? old('kd_wilayah') : $taman['kd_wilayah']; ?>"><?= $kelurahan; ?></option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="nama_taman" class="col-sm-3 col-form-label">Nama Taman Bacaan</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('nama_taman')) ? 'is-invalid' : ''; ?>" id="nama_taman" name="nama_taman" value="<?= (old('nama_taman')) ? old('nama_taman') : $taman['nama_taman']; ?>" autofocus>
                <div class="invalid-feedback">
                    <?= $validation->getError('nama_taman'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="pengelola" class="col-sm-3 col-form-label">Pengelola</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('pengelola')) ? 'is-invalid' : ''; ?>" id="pengelola" name="pengelola" value="<?= (old('pengelola')) ? old('pengelola') : $taman['pengelola']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('pengelola'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_buku" class="col-sm-3 col-form-label">Jumlah Buku</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_buku')) ? 'is-invalid' : ''; ?>" id="jml_buku" name="jml_buku" value="<?= (old('jml_buku')) ? old('jml_buku') : $taman['jml_buku']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_buku'); ?>
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