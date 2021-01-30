<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form ubah data kegiatan</h5>
    <form action="/BukukegiatanCon/update/<?= $bukukegiatan['no']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="fotoLama" value="<?= $bukukegiatan['foto']; ?>">
        <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-7">
                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= (old('nama')) ? old('nama') : $bukukegiatan['nama']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nama'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
            <div class="col-sm-7">
                <input type="text" class="form-control <?= ($validation->hasError('jabatan')) ? 'is-invalid' : ''; ?>" id="jabatan" name="jabatan" value="<?= (old('jabatan')) ? old('jabatan') : $bukukegiatan['jabatan']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jabatan'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_kegiatan" class="col-sm-3 col-form-label">Tanggal Kegiatan</label>
            <div class="col-sm-3">
                <input type="date" class="form-control <?= ($validation->hasError('tgl_kegiatan')) ? 'is-invalid' : ''; ?>" id="tgl_kegiatan" name="tgl_kegiatan" value="<?= (old('tgl_kegiatan')) ? old('tgl_kegiatan') : $bukukegiatan['tgl_kegiatan']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tgl_kegiatan'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_rt" class="col-sm-3 col-form-label">Tempat Kegiatan</label>
            <div class="col-sm-7">
                <input type="text" class="form-control <?= ($validation->hasError('tempat_kegiatan')) ? 'is-invalid' : ''; ?>" id="tempat_kegiatan" name="tempat_kegiatan" value="<?= (old('tempat_kegiatan')) ? old('tempat_kegiatan') : $bukukegiatan['tempat_kegiatan']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tempat_kegiatan'); ?>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="uraian_kegiatan" class="col-sm-3 col-form-label">Uraian Kegiatan</label>
            <div class="col-sm-7">
                <textarea type="text" class="form-control <?= ($validation->hasError('uraian_kegiatan')) ? 'is-invalid' : ''; ?>" id="uraian_kegiatan" name="uraian_kegiatan" value=""><?= (old('uraian_kegiatan')) ? old('uraian_kegiatan') : $bukukegiatan['uraian_kegiatan']; ?></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('uraian_kegiatan'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="foto" class="col-sm-3 col-form-label">Foto Kegiatan</label>
            <div class="col-sm-7">
                <div class="custom-file">
                    <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" onchange="previewImg()">
                    <div class="invalid-feedback">
                        <?= $validation->getError('foto'); ?>
                    </div>
                    <label class="custom-file-label" for="Foto"><?= $bukukegiatan['foto']; ?></label>
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