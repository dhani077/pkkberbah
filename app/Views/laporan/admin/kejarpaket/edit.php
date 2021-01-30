<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>

<div class="col">
    <h5 class="mb-5">
        <center>Form Ubah Data Kejar Paket</center>
    </h5>
    <form action="/KejarpaketCon/update/<?= $kejarpaket['no']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="no" value="<?= $kejarpaket['no']; ?>">
        <div class="form-group row">
            <label for="kd_wilayah" class="col-sm-4 col-form-label">Desa/Kelurahan</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="" name="" value="<?= $wilayah['kelurahan']; ?>" readonly>
                <input type="hidden" class="form-control" id="kd_wilayah" name="kd_wilayah" value="<?= $wilayah['kd_wilayah']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="nama_paket" class="col-sm-4 col-form-label">Nama Kejar Paket/KF/PAUD </label>
            <div class="col-sm-4">
                <input type="text" class="form-control <?= ($validation->hasError('nama_paket')) ? 'is-invalid' : ''; ?>" id="nama_paket" name="nama_paket" value="<?= (old('nama_paket')) ? old('nama_paket') : $kejarpaket['nama_paket']; ?>" autofocus>
                <div class="invalid-feedback">
                    <?= $validation->getError('nama_paket'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jns_paket" class="col-sm-4 col-form-label">Jenis Kejar Paket/KF/PAUD</label>
            <div class="col-sm-2">
                <select class="form-control <?= ($validation->hasError('jns_paket')) ? 'is-invalid' : ''; ?>" id="jns_paket" name="jns_paket">
                    <option value="<?= $kejarpaket['jns_paket'] ?>"><?= $kejarpaket['jns_paket']; ?></option>
                    <?php if ('A' != $kejarpaket['jns_paket']) : ?>
                        <option value="A">A</option>
                    <?php endif; ?>
                    <?php if ('B' != $kejarpaket['jns_paket']) : ?>
                        <option value="B">B</option>
                    <?php endif; ?>
                    <?php if ('C' != $kejarpaket['jns_paket']) : ?>
                        <option value="C">C</option>
                    <?php endif; ?>
                    <?php if ('KF' != $kejarpaket['jns_paket']) : ?>
                        <option value="KF">KF</option>
                    <?php endif; ?>
                    <?php if ('PAUD' != $kejarpaket['jns_paket']) : ?>
                        <option value="PAUD">PAUD</option>
                    <?php endif; ?>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('jns_paket'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_mulai" class="col-sm-4 col-form-label">Tanggal Pendataan</label>
            <div class="col-sm-3">
                <input type="date" class="form-control <?= ($validation->hasError('tgl_mulai')) ? 'is-invalid' : ''; ?>" id="tgl_mulai" name="tgl_mulai" value="<?= (old('tgl_mulai')) ? old('tgl_mulai') : $kejarpaket['tgl_mulai']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tgl_mulai'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_wrg_bljr_L" class="col-sm-4 col-form-label">Jumlah Warga/Siswa (Laki-laki)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_wrg_bljr_L')) ? 'is-invalid' : ''; ?>" id="jml_wrg_bljr_L" name="jml_wrg_bljr_L" value="<?= (old('jml_wrg_bljr_L')) ? old('jml_wrg_bljr_L') : $kejarpaket['jml_wrg_bljr_L']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_wrg_bljr_L'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_wrg_bljr_P" class="col-sm-4 col-form-label">Jumlah Warga/Siswa (Perempuan)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_wrg_bljr_P')) ? 'is-invalid' : ''; ?>" id="jml_wrg_bljr_P" name="jml_wrg_bljr_P" value="<?= (old('jml_wrg_bljr_P')) ? old('jml_wrg_bljr_P') : $kejarpaket['jml_wrg_bljr_P']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_wrg_bljr_P'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_pengajar_L" class="col-sm-4 col-form-label">Jumlah Pengajar (Laki-laki)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_pengajar_L')) ? 'is-invalid' : ''; ?>" id="jml_pengajar_L" name="jml_pengajar_L" value="<?= (old('jml_pengajar_L')) ? old('jml_pengajar_L') : $kejarpaket['jml_pengajar_L']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_pengajar_L'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_pengajar_P" class="col-sm-4 col-form-label">Jumlah Pengajar (Perempuan)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_pengajar_P')) ? 'is-invalid' : ''; ?>" id="jml_pengajar_P" name="jml_pengajar_P" value="<?= (old('jml_pengajar_P')) ? old('jml_pengajar_P') : $kejarpaket['jml_pengajar_P']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_pengajar_P'); ?>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col pt-5">
                <button id="aksi" name="aksi" type="submit" class="btn btn-primary" value="simpan">Simpan</button>
                <button id="aksi" name="aksi" type="submit" class="btn btn-danger" value="batal">Batal</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>