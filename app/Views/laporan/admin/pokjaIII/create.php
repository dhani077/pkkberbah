<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form Tambah Data Pokja III</h5>
    <form action="/PokjaIIICon/save" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group row">
            <label for="tanggal" class="col-sm-4 col-form-label">Tanggal pendataan</label>
            <div class="col-sm-3">
                <input type="date" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" id="tanggal" name="tanggal" autofocus value="<?= old('tanggal'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tanggal'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="kd_wilayah" class="col-sm-4 col-form-label">Nama desa/kelurahan</label>
            <div class="col-sm-3">
                <select class="form-control <?= ($validation->hasError('kd_wilayah')) ? 'is-invalid' : ''; ?>" id="kd_wilayah" name="kd_wilayah">
                    <option value="">--Desa/Kelurahan--</option>
                    <?php foreach ($wilayah as $w) : ?>
                        <option value="<?= $w['kd_wilayah']; ?>"><?= $w['kelurahan']; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('kd_wilayah'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_kader_pangan" class="col-sm-4 col-form-label">Jumlah kader pangan</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_kader_pangan" name="jml_kader_pangan" value="<?= old('jml_kader_pangan'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_kader_sandang" class="col-sm-4 col-form-label">Jumlah kader sandang</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_kader_sandang" name="jml_kader_sandang" value="<?= old('jml_kader_sandang'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_kader_tatart" class="col-sm-4 col-form-label">Jumlah kader tata laksana rumah tangga</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_kader_tatart" name="jml_kader_tatart" value="<?= old('jml_kader_tatart'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_mknpokok_beras" class="col-sm-4 ptcol-form-label">Jumlah makanan pokok beras</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_mknpokok_beras" name="jml_mknpokok_beras" value="<?= old('jml_mknpokok_beras'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_mknpokok_nonberas" class="col-sm-4 col-form-label">Jumlah makanan pokok non beras</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_mknpokok_nonberas" name="jml_mknpokok_nonberas" value="<?= old('jml_mknpokok_nonberas'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_pmnfaatn_ternak" class="col-sm-4 col-form-label">Jumlah pemanfaatan pekarangan (Peternakan)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_pmnfaatn_ternak" name="jml_pmnfaatn_ternak" value="<?= old('jml_pmnfaatn_ternak'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_pmnfaatn_ikan" class="col-sm-4 col-form-label">Jumlah pemanfaatan pekarangan (Perikanan)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_pmnfaatn_ikan" name="jml_pmnfaatn_ikan" value="<?= old('jml_pmnfaatn_ikan'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_pmnfaatn_warung" class="col-sm-4 col-form-label">Jumlah pemanfaatan pekarangan (Warung hidup)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_pmnfaatn_warung" name="jml_pmnfaatn_warung" value="<?= old('jml_pmnfaatn_warung'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_pmnfaatn_lumbung" class="col-sm-4 col-form-label">Jumlah pemanfaatan pekarangan (Lumbung hidup)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_pmnfaatn_lumbung" name="jml_pmnfaatn_lumbung" value="<?= old('jml_pmnfaatn_lumbung'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_pmnfaatn_toga" class="col-sm-4 col-form-label">Jumlah pemanfaatan pekarangan (Toga)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_pmnfaatn_toga" name="jml_pmnfaatn_toga" value="<?= old('jml_pmnfaatn_toga'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_pmnfaatn_tnmkeras" class="col-sm-4 col-form-label">Jumlah pemanfaatan pekarangan (Tanaman Keras)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_pmnfaatn_tnmkeras" name="jml_pmnfaatn_tnmkeras" value="<?= old('jml_pmnfaatn_tnmkeras'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_ind_pangan" class="col-sm-4 col-form-label">Jumlah industri rumah tangga (Pangan)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_ind_pangan" name="jml_ind_pangan" value="<?= old('jml_ind_pangan'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_ind_sandang" class="col-sm-4 col-form-label">Jumlah industri rumah tangga (Sandang)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_ind_sandang" name="jml_ind_sandang" value="<?= old('jml_ind_sandang'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_ind_jasa" class="col-sm-4 col-form-label">Jumlah industri rumah tangga (Jasa)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_ind_jasa" name="jml_ind_jasa" value="<?= old('jml_ind_jasa'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_rmh_layak" class="col-sm-4 col-form-label">Jumlah Rumah Sehat dan layak huni</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_rmh_layak" name="jml_rmh_layak" value="<?= old('jml_rmh_layak'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_rmh_tidaklayak" class="col-sm-4 col-form-label">Jumlah Rumah Tidak sehat dan tidak layak huni</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_rmh_tidaklayak" name="jml_rmh_tidaklayak" value="<?= old('jml_rmh_tidaklayak'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="keterangan" class="col-sm-4 pt-3 col-form-label">Keterangan</label>
            <div class="col-sm-7 pt-3">
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