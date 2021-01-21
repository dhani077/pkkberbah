<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form Ubah Data Admin</h5>
    <form action="/AdminCon/update/<?= $admin['id_admin']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <?php if (session()->getFlashdata('gagal')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashData('gagal'); ?>
            </div>
        <?php endif; ?>
        <input type="hidden" name="no" value="<?= $admin['id_admin']; ?>">
        <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
            <div class="col-sm-5">
                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= (old('nama')) ? old('nama') : $admin['nama']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nama'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-5">
                <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= (old('email')) ? old('email') : $admin['email']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('email'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="no_hp" class="col-sm-3 col-form-label">No. HP</label>
            <div class="col-sm-5">
                <input type="text" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" id="no_hp" name="no_hp" value="<?= (old('no_hp')) ? old('no_hp') : $admin['no_hp']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('no_hp'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="is_active" class="col-sm-3 col-form-label">Status Aktif</label>
            <div class="col-sm-3">
                <select class="form-control <?= ($validation->hasError('is_active')) ? 'is-invalid' : ''; ?>" id="is_active" name="is_active">
                    <?php if ($admin['is_active'] == '0') {
                        $status = "Tidak aktif";
                    } elseif ($admin['is_active'] == '1') {
                        $status = "Aktif";
                    }
                    ?>
                    <option value="<?= (old('is_active')) ? old('is_active') : $admin['is_active']; ?>"><?= $status; ?></option>
                    <?php if ($admin['is_active'] == 0) : ?>
                        <option value="1">Aktif</option>
                    <?php endif; ?>
                    <?php if ($admin['is_active'] == 1) : ?>
                        <option value="0">Tidak aktif</option>
                    <?php endif; ?>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('is_active'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="level" class="col-sm-3 col-form-label">Level</label>
            <div class="col-sm-2">
                <select class="form-control <?= ($validation->hasError('level')) ? 'is-invalid' : ''; ?>" id="level" name="level">
                    <option value="<?= $admin['level']; ?>"><?= $admin['level']; ?></option>
                    <?php if ($admin['level'] == '0') : ?>
                        <option value="1">1</option>
                    <?php endif; ?>
                    <?php if ($admin['level'] == '1') : ?>
                        <option value="0">0</option>
                    <?php endif; ?>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('level'); ?>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="username" class="col-sm-3 col-form-label">Username</label>
            <div class="col-sm-5">
                <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= (old('username')) ? old('username') : $admin['username']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('username'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="passwordA" class="col-sm-3 col-form-label">New Password</label>
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
                <button id="aksi" name="aksi" type="submit" class="btn btn-primary" value="tambah">Simpan</button>
                <button id="aksi" name="aksi" type="submit" class="btn btn-danger" value="batal">Batal</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>