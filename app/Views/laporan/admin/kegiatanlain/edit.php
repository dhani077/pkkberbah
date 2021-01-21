<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form Ubah Data Kegiatan Lain-lain</h5>
    <form action="/KegiatanLainCon/update/<?= $kegiatanlain['kd_kegiatan']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="kd_kegiatan" value="<?= $kegiatanlain['kd_kegiatan']; ?>">
        <input type="hidden" name="fotoLama" value="<?= $kegiatanlain['foto']; ?>">
        <input type="hidden" name="videoLama" value="<?= $kegiatanlain['video']; ?>">
        <div class="form-group row">
            <label for="nama_kegiatan" class="col-sm-3 col-form-label">Nama Kegiatan</label>
            <div class="col-sm-7">
                <input type="text" class="form-control <?= ($validation->hasError('nama_kegiatan')) ? 'is-invalid' : ''; ?>" id="nama_kegiatan" name="nama_kegiatan" autofocus value="<?= (old('nama_kegiatan')) ? old('nama_kegiatan') : $kegiatanlain['nama_kegiatan']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nama_kegiatan'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="tempat_pelaksanaan" class="col-sm-3 col-form-label">Tempat Pelaksanaan</label>
            <div class="col-sm-7">
                <input type="text" class="form-control <?= ($validation->hasError('tempat_pelaksanaan')) ? 'is-invalid' : ''; ?>" id="tempat_pelaksanaan" name="tempat_pelaksanaan" value="<?= (old('tempat_pelaksanaan')) ? old('tempat_pelaksanaan') : $kegiatanlain['tempat_pelaksanaan']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tempat_pelaksanaan'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_pelaksanaan" class="col-sm-3 col-form-label">Tanggal</label>
            <div class="col-sm-3">
                <input type="date" class="form-control <?= ($validation->hasError('tgl_pelaksanaan')) ? 'is-invalid' : ''; ?>" id="tgl_pelaksanaan" name="tgl_pelaksanaan" value="<?= (old('tgl_pelaksanaan')) ? old('tgl_pelaksanaan') : $kegiatanlain['tgl_pelaksanaan']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tgl_pelaksanaan'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="foto" class="col-sm-3 col-form-label">Foto</label>
            <!-- <div class="col-sm-2 pt-3">
                        <img src="/img/</?= $kegiatanpkk['foto']; ?>" class="img-thumbnail img-preview">
                    </div> -->
            <div class="col-sm-7">
                <div class="custom-file">
                    <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" onchange="previewImg()">
                    <div class="invalid-feedback">
                        <?= $validation->getError('foto'); ?>
                    </div>
                    <label class="custom-file-label" for="Foto"><?= $kegiatanlain['foto']; ?></label>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="video" class="col-sm-3 col-form-label">Video</label>
            <!-- <div class="col-sm-2 pt-3">
                        <img src="/img/</?= $kegiatanpkk['video']; ?>" class="img-thumbnail img-preview">
                    </div> -->
            <div class="col-sm-7">
                <div class="custom-file">
                    <input type="file" class="custom-file-input <?= ($validation->hasError('video')) ? 'is-invalid' : ''; ?>" id="video" name="video" onchange="previewVideo()">
                    <div class="invalid-feedback">
                        <?= $validation->getError('video'); ?>
                    </div>
                    <label class="video custom-file-label" for="video"><?= $kegiatanlain['video']; ?></label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
            <div class="col-sm-7">
                <textarea type="text" class="form-control" id="keterangan" name="keterangan" value="<?= (old('keterangan')) ? old('keterangan') : $kegiatanlain['keterangan']; ?>"><?= $kegiatanlain['keterangan']; ?></textarea>
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