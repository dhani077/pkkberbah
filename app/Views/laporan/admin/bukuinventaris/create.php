<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<h5 class="mb-5">Form Tambah Data Inventaris</h5>
<form action="/BukuinvenCon/save" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="form-group row">
        <label for="nama_brg" class="col-sm-3 col-form-label">Nama Barang</label>
        <div class="col-sm-7">
            <input type="text" class="form-control <?= ($validation->hasError('nama_brg')) ? 'is-invalid' : ''; ?>" id="nama_brg" name="nama_brg" autofocus value="<?= old('nama_brg'); ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('nama_brg'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="asal_brg" class="col-sm-3 col-form-label">Asal Barang</label>
        <div class="col-sm-7">
            <input type="text" class="form-control <?= ($validation->hasError('asal_brg')) ? 'is-invalid' : ''; ?>" id="asal_brg" name="asal_brg" value="<?= old('asal_brg'); ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('asal_brg'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="tgl_terima_beli" class="col-sm-3 col-form-label">Tanggal Penerimaan/<br>Pembelian</label>
        <div class="col-sm-3">
            <input type="date" class="form-control <?= ($validation->hasError('tgl_terima_beli')) ? 'is-invalid' : ''; ?>" id="tgl_terima_beli" name="tgl_terima_beli" value="<?= old('tgl_terima_beli'); ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('tgl_terima_beli'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
        <div class="col-sm-2">
            <input type="number" class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" id="jumlah" name="jumlah" value="<?= old('jumlah'); ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('jumlah'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="tempat_simpan" class="col-sm-3 col-form-label">Tempat Penyimpanan</label>
        <div class="col-sm-7">
            <input type="text" class="form-control <?= ($validation->hasError('tempat_simpan')) ? 'is-invalid' : ''; ?>" id="tempat_simpan" name="tempat_simpan" value="<?= old('tempat_simpan'); ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('tempat_simpan'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="kondisi_brg" class="col-sm-3 col-form-label">Kondisi Barang</label>
        <div class="col-sm-7">
            <input type="text" class="form-control <?= ($validation->hasError('kondisi_brg')) ? 'is-invalid' : ''; ?>" id="kondisi_brg" name="kondisi_brg" value="<?= old('kondisi_brg'); ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('kondisi_brg'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="foto" class="col-sm-3 col-form-label">Foto<br>(jika ada)</label>
        <div class="col-sm-7">
            <div class="custom-file">
                <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" onchange="previewImg()">
                <div class="invalid-feedback">
                    <?= $validation->getError('foto'); ?>
                </div>
                <label class="custom-file-label" for="foto">Pilih foto</label>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
        <div class="col-sm-7">
            <textarea type="text" class="form-control" id="keterangan" name="keterangan" value="<?= old('keterangan'); ?>"><?= old('keterangan'); ?></textarea>
        </div>
    </div>
    <div class="form-group row">
        <div class="col pt-5">
            <button id="aksi" name="aksi" type="submit" class="btn btn-primary" value="tambah">Tambah data</button>
            <button id="aksi" name="aksi" type="submit" class="btn btn-danger" value="batal">Batal</button>
        </div>
    </div>
</form>

<?= $this->endSection(); ?>