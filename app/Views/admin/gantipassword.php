<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form ubah password</h5>
    <?php if (session()->getFlashdata('gagal')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashData('gagal'); ?>
        </div>
    <?php endif; ?>
    <form action="/AdminCon/gantiPassword/<?= $admin['id_admin']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="id_admin" value="<?= $admin['id_admin']; ?>">
        <input type="hidden" name="nama" value="<?= $admin['nama']; ?>">
        <input type="hidden" name="email" value="<?= $admin['email']; ?>">
        <input type="hidden" name="no_hp" value="<?= $admin['no_hp']; ?>">
        <input type="hidden" name="username" value="<?= $admin['username']; ?>">
        <input type="hidden" name="is_active" value="<?= $admin['is_active']; ?>">
        <input type="hidden" name="level" value="<?= $admin['level']; ?>">
        <div class="form-group row">
            <label for="passwordLama" class="col-sm-3 col-form-label">Password lama</label>
            <div class="col-sm-5">
                <input type="password" class="form-control  <?= ($validation->hasError('passwordLama')) ? 'is-invalid' : ''; ?>" id="passwordLama" name="passwordLama" value="">
                <div class="invalid-feedback">
                    <?= $validation->getError('passwordLama'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="passwordA" class="col-sm-3 col-form-label">Password baru</label>
            <div class="col-sm-5">
                <input type="password" class="form-control  <?= ($validation->hasError('passwordA')) ? 'is-invalid' : ''; ?>" id="passwordA" name="passwordA" value="">
                <div class="invalid-feedback">
                    <?= $validation->getError('passwordA'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="passwordB" class="col-sm-3 col-form-label">Konfirmasi password</label>
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