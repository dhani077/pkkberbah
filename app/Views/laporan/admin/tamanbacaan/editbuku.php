<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form Ubah Daftar Buku</h5>
    <form action="/TamanbacaanCon/updateBuku/<?= $buku['no_buku']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="no_buku" value="<?= $buku['no_buku']; ?>">
        <input type="hidden" name="kd_taman" value="<?= $buku['kd_taman']; ?>">
        <div class="form-group row">
            <label for="jns_buku" class="col-sm-2 col-form-label">Jenis Buku</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('jns_buku')) ? 'is-invalid' : ''; ?>" id="jns_buku" name="jns_buku" value="<?= (old('jns_buku')) ? old('jns_buku') : $buku['jns_buku']; ?>" autofocus>
                <div class="invalid-feedback">
                    <?= $validation->getError('jns_buku'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>" id="kategori" name="kategori" value="<?= (old('kategori')) ? old('kategori') : $buku['kategori']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('kategori'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" id="jumlah" name="jumlah" value="<?= (old('jumlah')) ? old('jumlah') : $buku['jumlah']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jumlah'); ?>
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