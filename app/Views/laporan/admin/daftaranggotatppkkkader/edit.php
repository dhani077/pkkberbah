<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>

<div class="col">
    <h5 class="mb-5">Form ubah daftar anggota TP PKK dan Kader</h5>
    <form action="/DaftaranggotatppkkkaderCon/update" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="no_regLama" value="<?= $daftaranggota['no_reg']; ?>">
        <div class="form-group row">
            <label for="kd_wilayah" class="col-sm-3 col-form-label">Desa/Kelurahan</label>
            <div class="col-sm-3">
                <select class="form-control <?= ($validation->hasError('kd_wilayah')) ? 'is-invalid' : ''; ?>" id="kd_wilayah" name="kd_wilayah" readonly>
                    <option value="<?= $wilayah['kd_wilayah']; ?>"><?= $wilayah['kelurahan']; ?></option>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('kd_wilayah'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="no_reg" class="col-sm-3 col-form-label">Nomor Registrasi</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('no_reg')) ? 'is-invalid' : ''; ?>" id="no_reg" name="no_reg" autofocus value="<?= (old('no_reg')) ? old('no_reg') : $daftaranggota['no_reg']; ?>" readonly>
                <div class="invalid-feedback">
                    <?= $validation->getError('no_reg'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_masuk" class="col-sm-3 col-form-label">Tanggal Masuk</label>
            <div class="col-sm-3">
                <input type="date" class="form-control <?= ($validation->hasError('tgl_masuk')) ? 'is-invalid' : ''; ?>" id="tgl_masuk" name="tgl_masuk" autofocus value="<?= (old('tgl_masuk')) ? old('tgl_masuk') : $daftaranggota['tgl_masuk']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tgl_masuk'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= (old('nama')) ? old('nama') : $daftaranggota['nama']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nama'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jk" class="col-sm-3 col-form-label">Jenis Kelamin</label>
            <div class="pl-4">
                <?= ($validation->hasError('jk')) ? '' : ''; ?>
                <?php if ($daftaranggota['jk'] == "Laki-laki") { ?>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" name="jk" id="jk" value="Laki-laki" checked>
                        <label class="custom-control-label" for="jk">Laki-laki</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" name="jk" id="jkP" value="Perempuan">
                        <label class="custom-control-label" for="jkP">Perempuan</label>
                    </div>
                <?php
                } elseif ($daftaranggota['jk'] == "Perempuan") { ?>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" name="jk" id="jk" value="Laki-laki">
                        <label class="custom-control-label" for="jk">Laki-laki</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" name="jk" id="jkP" value="Perempuan" checked>
                        <label class="custom-control-label" for="jkP">Perempuan</label>
                    </div>
                <?php
                } ?>
                <div style="color: red;">
                    <?= $validation->getError('jk'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="fungsi_anggota" class="col-sm-3 col-form-label">Kedudukan/Fungsi sebagai dalam keanggotaan</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="fungsi_anggota" name="fungsi_anggota" value="<?= (old('fungsi_anggota')) ? old('fungsi_anggota') : $daftaranggota['fungsi_anggota']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="fungsi_kader_umum" class="col-sm-3 col-form-label">Kedudukan/Fungsi sebagai kader umum</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="fungsi_kader_umum" name="fungsi_kader_umum" value="<?= (old('fungsi_kader_umum')) ? old('fungsi_kader_umum') : $daftaranggota['fungsi_kader_umum']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="fungsi_kader_khusus" class="col-sm-3 col-form-label">Kedudukan/Fungsi sebagai kader khusus</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="fungsi_kader_khusus" name="fungsi_kader_khusus" value="<?= (old('fungsi_kader_khusus')) ? old('fungsi_kader_khusus') : $daftaranggota['fungsi_kader_khusus']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal lahir</label>
            <div class="col-sm-3">
                <input type="date" class="form-control <?= ($validation->hasError('tgl_lahir')) ? 'is-invalid' : ''; ?>" id="tgl_lahir" name="tgl_lahir" value="<?= old(('tgl_lahir')) ? old('tgl_lahir') : $daftaranggota['tgl_lahir']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tgl_lahir'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="status" class="col-sm-3 col-form-label">Status</label>
            <div class="col-sm-3">
                <select class="form-control <?= ($validation->hasError('status')) ? 'is-invalid' : ''; ?>" id="status" name="status" autofocus>
                    <option value="<?= $daftaranggota['status']; ?>"><?= $daftaranggota['status']; ?></option>
                    <?php if ($daftaranggota['status'] != 'Lajang') : ?>
                        <option value="Lajang">Lajang</option>
                    <?php endif; ?>
                    <?php if ($daftaranggota['status'] != 'Menikah') : ?>
                        <option value="Menikah">Menikah</option>
                    <?php endif; ?>
                    <?php if ($daftaranggota['status'] != 'Cerai Mati') : ?>
                        <option value="Cerai Mati">Cerai Mati</option>
                    <?php endif; ?>
                    <?php if ($daftaranggota['status'] != 'Cerai Hidup') : ?>
                        <option value="Cerai Hidup">Cerai Hidup</option>
                    <?php endif; ?>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('status'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-7">
                <textarea type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value=""><?= (old('alamat')) ? old('alamat') : $daftaranggota['alamat']; ?></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('alamat'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="pendidikan" class="col-sm-3 col-form-label">Pendidikan</label>
            <div class="col-sm-3">
                <select class="form-control <?= ($validation->hasError('pendidikan')) ? 'is-invalid' : ''; ?>" id="pendidikan" name="pendidikan" autofocus>
                    <option value="<?= $daftaranggota['pendidikan']; ?>"><?= $daftaranggota['pendidikan']; ?></option>
                    <?php if ($daftaranggota['pendidikan'] != 'SD') : ?>
                        <option value="SD">SD</option>
                    <?php endif; ?>
                    <?php if ($daftaranggota['pendidikan'] != 'SMP') : ?>
                        <option value="SMP">SMP</option>
                    <?php endif; ?>
                    <?php if ($daftaranggota['pendidikan'] != 'SMA/SMK') : ?>
                        <option value="SMA/SMK">SMA/SMK</option>
                    <?php endif; ?>
                    <?php if ($daftaranggota['pendidikan'] != 'D3') : ?>
                        <option value="D3">D3</option>
                    <?php endif; ?>
                    <?php if ($daftaranggota['pendidikan'] != 'D4') : ?>
                        <option value="D4">D4</option>
                    <?php endif; ?>
                    <?php if ($daftaranggota['pendidikan'] != 'S1') : ?>
                        <option value="S1">S1</option>
                    <?php endif; ?>
                    <?php if ($daftaranggota['pendidikan'] != 'S2') : ?>
                        <option value="S2">S2</option>
                    <?php endif; ?>
                    <?php if ($daftaranggota['pendidikan'] != 'S3') : ?>
                        <option value="S3">S3</option>
                    <?php endif; ?>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('pendidikan'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
            <div class="col-sm-6">
                <input type="text" class="form-control <?= ($validation->hasError('pekerjaan')) ? 'is-invalid' : ''; ?>" id="pekerjaan" name="pekerjaan" value="<?= (old('pekerjaan')) ? old('pekerjaan') : $daftaranggota['pekerjaan']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('pekerjaan'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="foto" class="col-sm-3 col-form-label">Foto<br>(jika ada)</label>
            <!-- <div class="col-sm-2">
                        <img src="/img/defaultpkk.png" class="img-thumbnail img-preview">
                    </div> -->
            <div class="col-sm-7">
                <div class="custom-file">
                    <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" onchange="previewImg()">
                    <div class="invalid-feedback">
                        <?= $validation->getError('foto'); ?>
                    </div>
                    <label class="custom-file-label" for="foto">Pilih foto</label>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
            <div class="col-sm-7">
                <textarea type="text" class="form-control" id="keterangan" name="keterangan" value=""><?= (old('keterangan')) ? old('keterangan') : $daftaranggota['keterangan']; ?></textarea>
            </div>
        </div>

        <div class="form-group row">
            <div class="col mt-5">
                <button id="aksi" name="aksi" type="submit" class="btn btn-primary" value="tambah">Simpan</button>
                <button id="aksi" name="aksi" type="submit" class="btn btn-danger" value="batal">Batal</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>