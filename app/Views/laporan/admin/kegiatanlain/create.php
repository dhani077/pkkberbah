<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form Tambah Data Kegiatan</h5>
    <form action="/KegiatanLainCon/save" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group row">
            <label for="nama_kegiatan" class="col-sm-3 col-form-label">Nama Kegiatan</label>
            <div class="col-sm-7">
                <input type="text" class="form-control <?= ($validation->hasError('nama_kegiatan')) ? 'is-invalid' : ''; ?>" id="nama_kegiatan" name="nama_kegiatan" autofocus value="<?= old('nama_kegiatan'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nama_kegiatan'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="tempat_pelaksanaan" class="col-sm-3 col-form-label">Tempat Pelaksanaan</label>
            <div class="col-sm-7">
                <input type="text" class="form-control <?= ($validation->hasError('tempat_pelaksanaan')) ? 'is-invalid' : ''; ?>" id="tempat_pelaksanaan" name="tempat_pelaksanaan" value="<?= old('tempat_pelaksanaan'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tempat_pelaksanaan'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_pelaksanaan" class="col-sm-3 col-form-label">Tanggal</label>
            <div class="col-sm-3">
                <input type="date" class="form-control <?= ($validation->hasError('tgl_pelaksanaan')) ? 'is-invalid' : ''; ?>" id="tgl_pelaksanaan" name="tgl_pelaksanaan" value="<?= old('tgl_pelaksanaan'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tgl_pelaksanaan'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="foto" class="col-sm-3 col-form-label">Foto</label>
            <!-- <div class="col-sm-2 pt-3">
                        <img src="/img/defaultpkk.png" class="img-thumbnail img-preview">
                    </div> -->
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
            <label for="video" class="col-sm-3 col-form-label">Video</label>
            <!-- <div class="col-sm-2 pt-3">
                        <img src="/img/defaultpkk.png" class="img-thumbnail img-preview">
                    </div> -->
            <div class="col-sm-7">
                <div class="custom-file">
                    <input type="file" class="custom-file-input <?= ($validation->hasError('video')) ? 'is-invalid' : ''; ?>" id="video" name="video" onchange="previewVideo()">
                    <div class="invalid-feedback">
                        <?= $validation->getError('video'); ?>
                    </div>
                    <label class="video custom-file-label" for="Video">Pilih Video..</label>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
            <div class="col-sm-7">
                <textarea rows="8" type="text" class="form-control" id="keterangan" name="keterangan" value=""><?= old('keterangan'); ?></textarea>
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