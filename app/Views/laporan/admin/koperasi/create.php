<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>

<div class="col">
    <h5 class="mb-5">Form Tambah Data Koperasi</h5>
    <form action="/KoperasiCon/save/<?= $kdwilayah; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group row">
            <label for="kd_wilayah" class="col-sm-4 col-form-label">Desa/Kelurahan</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="<?= $wilayah['kelurahan'] ?>" readonly>
                <input type="hidden" class="form-control" name="kd_wilayah" id="kd_wilayah" value="<?= $kdwilayah; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="nama_koperasi" class="col-sm-4 col-form-label">Nama Koperasi</label>
            <div class="col-sm-4">
                <input type="text" class="form-control <?= ($validation->hasError('nama_koperasi')) ? 'is-invalid' : ''; ?>" id="nama_koperasi" name="nama_koperasi" value="<?= old('nama_koperasi'); ?>" autofocus>
                <div class="invalid-feedback">
                    <?= $validation->getError('nama_koperasi'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jns_koperasi" class="col-sm-4 col-form-label">Jenis Koperasi</label>
            <div class="col-sm-4">
                <input type="text" class="form-control <?= ($validation->hasError('jns_koperasi')) ? 'is-invalid' : ''; ?>" id="jns_koperasi" name="jns_koperasi" value="<?= old('jns_koperasi'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jns_koperasi'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="status_hkm_yes" class="col-sm-4 col-form-label">Berbadan Hukum</label>
            <div class="col-sm-3">
                <select class="form-control <?= ($validation->hasError('status_hkm_yes')) ? 'is-invalid' : ''; ?>" id="status_hkm_yes" name="status_hkm_yes">
                    <option value="">Pilih Status Hukum--></option>
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('status_hkm_yes'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_anggota_L" class="col-sm-4 col-form-label">Jumlah Anggota (Laki-Laki)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_anggota_L')) ? 'is-invalid' : ''; ?>" id="jml_anggota_L" name="jml_anggota_L" value="<?= old('jml_anggota_L'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_anggota_L'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_anggota_P" class="col-sm-4 col-form-label">Jumlah Anggota (Perempuan)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_anggota_P')) ? 'is-invalid' : ''; ?>" id="jml_anggota_P" name="jml_anggota_P" value="<?= old('jml_anggota_P'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_anggota_P'); ?>
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