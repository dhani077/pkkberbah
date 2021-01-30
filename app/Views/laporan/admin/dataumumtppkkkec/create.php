<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form tambah data Umum TP PKK Kecamatan
    </h5>
    <form action="/DataumumtppkkkecCon/save" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group row">
            <label for="tanggal" class="col-sm-3 col-form-label">Tanggal pendataan</label>
            <div class="col-sm-3">
                <input type="date" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" id="tanggal" name="tanggal" autofocus value="<?= old('tanggal'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tanggal'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="nama_wilayah" class="col-sm-3 col-form-label">Nama desa/kelurahan</label>
            <div class="col-sm-4">
                <select class="form-control <?= ($validation->hasError('nama_wilayah')) ? 'is-invalid' : ''; ?>" id="nama_wilayah" name="nama_wilayah">
                    <option value="">--Desa/Kelurahan--</option>
                    <?php foreach ($wilayah as $w) : ?>
                        <option value="<?= $w['kelurahan']; ?>"><?= $w['kelurahan']; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('nama_wilayah'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_klp_dusun" class="col-sm-3 col-form-label">Jumlah dusun/lingkungan</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_klp_dusun')) ? 'is-invalid' : ''; ?>" id="jml_klp_dusun" name="jml_klp_dusun" value="<?= old('jml_klp_dusun'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_klp_dusun'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_klp_pkkrw" class="col-sm-3 col-form-label">Jumlah PKK RW</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_klp_pkkrw')) ? 'is-invalid' : ''; ?>" id="jml_klp_pkkrw" name="jml_klp_pkkrw" value="<?= old('jml_klp_pkkrw'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_klp_pkkrw'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_klp_pkkrt" class="col-sm-3 col-form-label">Jumlah PKK RT</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_klp_pkkrt')) ? 'is-invalid' : ''; ?>" id="jml_klp_pkkrt" name="jml_klp_pkkrt" value="<?= old('jml_klp_pkkrt'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_klp_pkkrt'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_klp_dasawisma" class="col-sm-3 col-form-label">Jumlah kelompok dasawisma</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_klp_dasawisma" name="jml_klp_dasawisma" value="<?= old('jml_klp_dasawisma'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_krt" class="col-sm-3 col-form-label">Jumlah KRT</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_krt" name="jml_krt" value="<?= old('jml_krt'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_kk" class="col-sm-3 col-form-label">Jumlah KK</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_kk" name="jml_kk" value="<?= old('jml_kk'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_jiwa_L" class="col-sm-3 col-form-label">Jumlah jiwa (Laki-laki)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_jiwa_L" name="jml_jiwa_L" value="<?= old('jml_jiwa_L'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_jiwa_P" class="col-sm-3 col-form-label">Jumlah jiwa (Perempuan)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_jiwa_P" name="jml_jiwa_P" value="<?= old('jml_jiwa_P'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_kader_angL" class="col-sm-3 col-form-label">Jumlah kader anggota TP PKK (Laki-laki)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_kader_angL" name="jml_kader_angL" value="<?= old('jml_kader_angL'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_kader_angP" class="col-sm-3 col-form-label">Jumlah kader anggota TP PKK (Perempuan)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_kader_angP" name="jml_kader_angP" value="<?= old('jml_kader_angP'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_kader_umumL" class="col-sm-3 col-form-label">Jumlah kader umum (Laki-laki)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_kader_umumL" name="jml_kader_umumL" value="<?= old('jml_kader_umumL'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_kader_umumP" class="col-sm-3 col-form-label">Jumlah kader umum (Perempuan)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_kader_umumP" name="jml_kader_umumP" value="<?= old('jml_kader_umumP'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_kader_khususL" class="col-sm-3 col-form-label">Jumlah kader khusus (Laki-laki)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_kader_khususL" name="jml_kader_khususL" value="<?= old('jml_kader_khususL'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_kader_khususP" class="col-sm-3 col-form-label">Jumlah kader khusus (Perempuan)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_kader_khususP" name="jml_kader_khususP" value="<?= old('jml_kader_khususP'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_skrt_honorerL" class="col-sm-3 col-form-label">Jumlah tenaga sekretariat<br>honorer (Laki-laki)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_skrt_honorerL" name="jml_skrt_honorerL" value="<?= old('jml_skrt_honorerL'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_skrt_honorerP" class="col-sm-3 col-form-label">Jumlah tenaga sekretariat<br>honorer (Perempuan)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_skrt_honorerP" name="jml_skrt_honorerP" value="<?= old('jml_skrt_honorerP'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_skrt_bantuanL" class="col-sm-3 col-form-label">Jumlah tenaga sekretariat<br>bantuan (Laki-laki)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_skrt_bantuanL" name="jml_skrt_bantuanL" value="<?= old('jml_skrt_bantuanL'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_skrt_bantuanP" class="col-sm-3 col-form-label">Jumlah tenaga sekretariat<br>bantuan (Perempuan)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_skrt_bantuanP" name="jml_skrt_bantuanP" value="<?= old('jml_skrt_bantuanP'); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
            <div class="col-sm-7">
                <textarea type="text" class="form-control" id="keterangan" name="keterangan" value=""><?= old('keterangan'); ?></textarea>
            </div>
        </div>

        <div class="form-group row">
            <div class="col mt-5">
                <button id="aksi" name="aksi" type="submit" class="btn btn-primary" value="tambah">Tambah data</button>
                <button id="aksi" name="aksi" type="submit" class="btn btn-danger" value="batal">Batal</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>