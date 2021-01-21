<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form Tambah Daftar Admin</h5>
    <form action="/AdminCon/save" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <?php if (session()->getFlashdata('gagal')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashData('gagal'); ?>
            </div>
        <?php endif; ?>
        <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
            <div class="col-sm-5">
                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= old('nama'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nama'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-5">
                <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('email'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="no_hp" class="col-sm-3 col-form-label">No. HP</label>
            <div class="col-sm-5">
                <input type="text" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" id="no_hp" name="no_hp" value="<?= old('no_hp'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('no_hp'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="is_active" class="col-sm-3 col-form-label">Status Aktif</label>
            <div class="col-sm-3">
                <select class="form-control <?= ($validation->hasError('is_active')) ? 'is-invalid' : ''; ?>" id="is_active" name="is_active">
                    <option value="">--Pilih--</option>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak aktif</option>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('is_active'); ?>
                </div>
            </div>
        </div>
        <input type="hidden" name="level" value="0">

        <div class="form-group row">
            <label for="username" class="col-sm-3 col-form-label">Username</label>
            <div class="col-sm-5">
                <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= old('username'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('username'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="passwordA" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-5">
                <input type="password" class="form-control  <?= ($validation->hasError('passwordA')) ? 'is-invalid' : ''; ?>" id="passwordA" name="passwordA" value="">
                <div class="invalid-feedback">
                    <?= $validation->getError('passwordA'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="passwordB" class="col-sm-3 col-form-label">Konfirmasi Password</label>
            <div class="col-sm-5">
                <input type="password" class="form-control  <?= ($validation->hasError('passwordB')) ? 'is-invalid' : ''; ?>" id="passwordB" name="passwordB" value="">
                <div class="invalid-feedback">
                    <?= $validation->getError('passwordB'); ?>
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