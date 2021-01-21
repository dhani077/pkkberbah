<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form tambah daftar anggota TP PKK Desa/Kelurahan <?= $kelurahan; ?></h5>
    <form class="res" action="/DaftartimpkkCon/save/<?= $kdwilayah; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="kd_wilayah" value="<?= $kdwilayah; ?>">
        <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-7">
                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= old('nama'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nama'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_masuk" class="col-sm-3 col-form-label">Tanggal Masuk Anggota</label>
            <div class="col-sm-3">
                <input type="date" class="form-control <?= ($validation->hasError('tgl_masuk')) ? 'is-invalid' : ''; ?>" id="tgl_masuk" name="tgl_masuk" value="<?= old('tgl_masuk'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tgl_masuk'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
            <div class="col-sm-7">
                <input type="text" class="form-control <?= ($validation->hasError('jabatan')) ? 'is-invalid' : ''; ?>" id="jabatan" name="jabatan" value="<?= old('jabatan'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jabatan'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jk" class="col-sm-3 col-form-label">Jenis Kelamin</label>
            <div class="pl-4">
                <?= ($validation->hasError('jk')) ? '' : ''; ?>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" name="jk" id="jk" value="Laki-laki">
                    <label class="custom-control-label" for="jk">Laki-laki</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" name="jk" id="jkP" value="Perempuan">
                    <label class="custom-control-label" for="jkP">Perempuan</label>
                </div>
                <div style="color: red;">
                    <?= $validation->getError('jk'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
            <div class="col-sm-7">
                <input type="text" class="form-control <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : ''; ?>" id="tempat_lahir" name="tempat_lahir" value="<?= old('tempat_lahir'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tempat_lahir'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-3">
                <input type="date" class="form-control <?= ($validation->hasError('tgl_lahir')) ? 'is-invalid' : ''; ?>" id="tgl_lahir" name="tgl_lahir" value="<?= old('tgl_lahir'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tgl_lahir'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="status" class="col-sm-3 col-form-label">Status</label>
            <div class="pl-4">
                <?= ($validation->hasError('status')) ? '' : ''; ?>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" name="status" id="status" value="Kawin">
                    <label class="custom-control-label" for="status">Kawin</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" name="status" id="statusTK" value="Tidak kawin">
                    <label class="custom-control-label" for="statusTK">Tidak kawin</label>
                </div>
                <div style="color: red;">
                    <?= $validation->getError('status'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="alamat" class="col-sm-3 col-form-label">Alamat lengkap</label>
            <div class="col-sm-7">
                <textarea type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value=""><?= old('alamat'); ?></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('alamat'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="pendidikan" class="col-sm-3 col-form-label">Pendidikan terakhir</label>
            <div class="col-sm-3">
                <select class="form-control <?= ($validation->hasError('pendidikan')) ? 'is-invalid' : ''; ?>" id="pendidikan" name="pendidikan" autofocus>
                    <option value="">--Pendidikan--</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA/SMK">SMA/SMK</option>
                    <option value="D3">D3</option>
                    <option value="D4">D4</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('pendidikan'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
            <div class="col-sm-4">
                <input type="text" class="form-control <?= ($validation->hasError('pekerjaan')) ? 'is-invalid' : ''; ?>" id="pekerjaan" name="pekerjaan" value="<?= old('pekerjaan'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('pekerjaan'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="foto" class="col-sm-3 col-form-label">Foto</label>
            <div class="col-sm-7">
                <div class="custom-file">
                    <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" onchange="previewImg()">
                    <div class="invalid-feedback">
                        <?= $validation->getError('foto'); ?>
                    </div>
                    <label class="custom-file-label" for="Foto">Pilih Foto..</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
            <div class="col-sm-7">
                <textarea type="text" class="form-control" id="keterangan" name="keterangan" value=""><?= old('keterangan'); ?></textarea>
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