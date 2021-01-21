<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form Tambah Data Kejar Paket</h5>
    <form action="/KejarpaketCon/save/<?= $wilayah['kd_wilayah']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group row">
            <label for="kd_wilayah" class="col-sm-4 col-form-label">Desa\Kelurahan</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="<?= $wilayah['kelurahan']; ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="nama_paket" class="col-sm-4 col-form-label">Nama Kejar Paket/KF/PAUD </label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('nama_paket')) ? 'is-invalid' : ''; ?>" id="nama_paket" name="nama_paket" value="<?= old('nama_paket'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nama_paket'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jns_paket" class="col-sm-4 col-form-label">Jenis Kejar Paket/KF/PAUD</label>
            <div class="col-sm-2">
                <select class="form-control <?= ($validation->hasError('jns_paket')) ? 'is-invalid' : ''; ?>" id="jns_paket" name="jns_paket">
                    <option value="<?= (old('jns_paket')) ? old('jns_paket') : "" ?>"><?= (old('jns_paket')) ? old('jns_paket') : "--Pilih--"; ?></option>
                    <?php if ('A' != old('jns_paket')) : ?>
                        <option value="A">A</option>
                    <?php endif; ?>
                    <?php if ('B' != old('jns_paket')) : ?>
                        <option value="B">B</option>
                    <?php endif; ?>
                    <?php if ('C' != old('jns_paket')) : ?>
                        <option value="C">C</option>
                    <?php endif; ?>
                    <?php if ('KF' != old('jns_paket')) : ?>
                        <option value="KF">KF</option>
                    <?php endif; ?>
                    <?php if ('PAUD' != old('jns_paket')) : ?>
                        <option value="PAUD">PAUD</option>
                    <?php endif; ?>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('jns_paket'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_mulai" class="col-sm-4 col-form-label">Tanggal mulai pelaksanaan</label>
            <div class="col-sm-3">
                <input type="date" class="form-control <?= ($validation->hasError('tgl_mulai')) ? 'is-invalid' : ''; ?>" id="tgl_mulai" name="tgl_mulai" value="<?= old('tgl_mulai'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tgl_mulai'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_wrg_bljr_L" class="col-sm-4 col-form-label">Jumlah Warga/Siswa (Laki-laki)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_wrg_bljr_L')) ? 'is-invalid' : ''; ?>" id="jml_wrg_bljr_L" name="jml_wrg_bljr_L" value="<?= old('jml_wrg_bljr_L'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_wrg_bljr_L'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_wrg_bljr_P" class="col-sm-4 col-form-label">Jumlah Warga/Siswa (Perempuan)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_wrg_bljr_P')) ? 'is-invalid' : ''; ?>" id="jml_wrg_bljr_P" name="jml_wrg_bljr_P" value="<?= old('jml_wrg_bljr_P'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_wrg_bljr_P'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_pengajar_L" class="col-sm-4 col-form-label">Jumlah Pengajar (Laki-laki)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_pengajar_L')) ? 'is-invalid' : ''; ?>" id="jml_pengajar_L" name="jml_pengajar_L" value="<?= old('jml_pengajar_L'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_pengajar_L'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_pengajar_P" class="col-sm-4 col-form-label">Jumlah Pengajar (Perempuan)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_pengajar_P')) ? 'is-invalid' : ''; ?>" id="jml_pengajar_P" name="jml_pengajar_P" value="<?= old('jml_pengajar_P'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_pengajar_P'); ?>
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