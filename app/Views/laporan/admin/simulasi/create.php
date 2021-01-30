<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>

<div class="col">
    <h5 class="mb-5">Form Tambah Data Simulasi Dan Penyuluhan</h5>
    <form action="/SimulasiCon/save" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group row">
            <label for="kd_wilayah" class="col-sm-4 col-form-label">Desa/Kelurahan</label>
            <div class="col-sm-3">
                <select class="form-control" id="kd_wilayah" name="kd_wilayah" readonly>
                    <option value="<?= $kdwilayah; ?>"><?= $kelurahan; ?></option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="nama_kegiatan" class="col-sm-4 col-form-label">Nama Kegiatan</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('nama_kegiatan')) ? 'is-invalid' : ''; ?>" id="nama_kegiatan" name="nama_kegiatan" value="<?= old('nama_kegiatan'); ?>" autofocus>
                <div class="invalid-feedback">
                    <?= $validation->getError('nama_kegiatan'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jns_simulasi" class="col-sm-4 col-form-label">Jenis Simulasi/Penyuluhan</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('jns_simulasi')) ? 'is-invalid' : ''; ?>" id="jns_simulasi" name="jns_simulasi" value="<?= old('jns_simulasi'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jns_simulasi'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="tanggal" class="col-sm-4 col-form-label">Tanggal Pelaksanaan</label>
            <div class="col-sm-3">
                <input type="date" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" id="tanggal" name="tanggal" value="<?= old('tanggal'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tanggal'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_klp" class="col-sm-4 col-form-label">Jumlah Kelompok</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_klp')) ? 'is-invalid' : ''; ?>" id="jml_klp" name="jml_klp" value="<?= old('jml_klp'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_klp'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_sosialisasi" class="col-sm-4 col-form-label">Jumlah Sosialisasi</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_sosialisasi')) ? 'is-invalid' : ''; ?>" id="jml_sosialisasi" name="jml_sosialisasi" value="<?= old('jml_sosialisasi'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_sosialisasi'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_kader_L" class="col-sm-4 col-form-label">Jumlah Kader (Laki-laki)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_kader_L')) ? 'is-invalid' : ''; ?>" id="jml_kader_L" name="jml_kader_L" value="<?= old('jml_kader_L'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_kader_L'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_kader_P" class="col-sm-4 col-form-label">Jumlah Kader (Perempuan)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_kader_P')) ? 'is-invalid' : ''; ?>" id="jml_kader_P" name="jml_kader_P" value="<?= old('jml_kader_P'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_kader_P'); ?>
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