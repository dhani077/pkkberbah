<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form tambah data ibu hamil, kelahiran, kematian bayi, kematian balita dan kematian ibu hamil, melahirkan dan nifas</h5>
    <form action="/CatatanibuhamilCon/save" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group row">
            <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Pendataan</label>*
            <div class="col-sm-3">
                <input type="date" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" id="tanggal" name="tanggal" value="<?= old('tanggal'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tanggal'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="nama_kelurahan" class="col-sm-3 col-form-label">Nama desa/kelurahan</label>*
            <div class="col-sm-4">
                <select class="form-control <?= ($validation->hasError('nama_kelurahan')) ? 'is-invalid' : ''; ?>" id="nama_kelurahan" name="nama_kelurahan">
                    <option value="">--Desa/Kelurahan--</option>
                    <?php foreach ($wilayah as $w) : ?>
                        <option value="<?= $w['kelurahan']; ?>"><?= $w['kelurahan']; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('nama_kelurahan'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_dusun" class="col-sm-3 col-form-label">Jumlah dusun/lingkungan</label>*
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_dusun')) ? 'is-invalid' : ''; ?>" id="jml_dusun" name="jml_dusun" value="<?= old('jml_dusun'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_rw" class="col-sm-3 col-form-label">Jumlah RW</label>*
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_rw')) ? 'is-invalid' : ''; ?>" id="jml_rw" name="jml_rw" value="<?= old('jml_rw'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_rt" class="col-sm-3 col-form-label">Jumlah RT</label>*
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_rt')) ? 'is-invalid' : ''; ?>" id="jml_rt" name="jml_rt" value="<?= old('jml_rt'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_dasawisma" class="col-sm-3 col-form-label">Jumlah dasawisma</label>*
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_dasawisma')) ? 'is-invalid' : ''; ?>" id="jml_dasawisma" name="jml_dasawisma" value="<?= old('jml_dasawisma'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_ibu_hamil" class="col-sm-3 col-form-label">Jumlah ibu hamil</label>*
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_ibu_hamil')) ? 'is-invalid' : ''; ?>" id="jml_ibu_hamil" name="jml_ibu_hamil" value="<?= old('jml_ibu_hamil'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_ibu_melahir" class="col-sm-3 col-form-label">Jumlah ibu melahirkan</label>*
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_ibu_melahir')) ? 'is-invalid' : ''; ?>" id="jml_ibu_melahir" name="jml_ibu_melahir" value="<?= old('jml_ibu_melahir'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_ibu_nifas" class="col-sm-3 col-form-label">Jumlah ibu nifas</label>*
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_ibu_nifas')) ? 'is-invalid' : ''; ?>" id="jml_ibu_nifas" name="jml_ibu_nifas" value="<?= old('jml_ibu_nifas'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_ibu_mngl" class="col-sm-3 col-form-label">Jumlah ibu meninggal</label>*
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_ibu_mngl')) ? 'is-invalid' : ''; ?>" id="jml_ibu_mngl" name="jml_ibu_mngl" value="<?= old('jml_ibu_mngl'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_bayi_lahirL" class="col-sm-3 col-form-label">Jumlah bayi lahir (Laki-laki)</label>*
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_bayi_lahirL')) ? 'is-invalid' : ''; ?>" id="jml_bayi_lahirL" name="jml_bayi_lahirL" value="<?= old('jml_bayi_lahirL'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_bayi_LahirP" class="col-sm-3 col-form-label">Jumlah bayi lahir (Perempuan)</label>*
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_bayi_LahirP')) ? 'is-invalid' : ''; ?>" id="jml_bayi_LahirP" name="jml_bayi_LahirP" value="<?= old('jml_bayi_LahirP'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_bayi_akte_ada" class="col-sm-3 col-form-label">Jumlah bayi ada akte kelahiran</label>*
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_bayi_akte_ada')) ? 'is-invalid' : ''; ?>" id="jml_bayi_akte_ada" name="jml_bayi_akte_ada" value="<?= old('jml_bayi_akte_ada'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_bayi_akte_tidak" class="col-sm-3 col-form-label">Jumlah bayi tidak ada akte kelahiran</label>*
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_bayi_akte_tidak')) ? 'is-invalid' : ''; ?>" id="jml_bayi_akte_tidak" name="jml_bayi_akte_tidak" value="<?= old('jml_bayi_akte_tidak'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_bayi_mnglL" class="col-sm-3 col-form-label">Jumlah bayi meninggal<br>(Laki-laki)</label>*
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_bayi_mnglL')) ? 'is-invalid' : ''; ?>" id="jml_bayi_mnglL" name="jml_bayi_mnglL" value="<?= old('jml_bayi_mnglL'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_bayi_mnglP" class="col-sm-3 col-form-label">Jumlah bayi meninggal (Perempuan)</label>*
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_bayi_mnglP')) ? 'is-invalid' : ''; ?>" id="jml_bayi_mnglP" name="jml_bayi_mnglP" value="<?= old('jml_bayi_mnglP'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_balita_mnglL" class="col-sm-3 col-form-label">Jumlah balita meninggal<br>(Laki-laki)</label>*
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_balita_mnglL')) ? 'is-invalid' : ''; ?>" id="jml_balita_mnglL" name="jml_balita_mnglL" value="<?= old('jml_balita_mnglL'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_balita_mnglP" class="col-sm-3 col-form-label">Jumlah balita meninggal (Perempuan)</label>*
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_balita_mnglP')) ? 'is-invalid' : ''; ?>" id="jml_balita_mnglP" name="jml_balita_mnglP" value="<?= old('jml_balita_mnglP'); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
            <div class="col-sm-7">
                <textarea type="text" class="form-control" id="keterangan" name="keterangan" value=""><?= old('keterangan'); ?></textarea>
            </div>
        </div>
        <p style="font-style: italic;">(* harus diisi)</p>
        <div class="form-group row">
            <div class="col pt-5">
                <button id="aksi" name="aksi" type="submit" class="btn btn-primary" value="tambah">Tambah data</button>
                <button id="aksi" name="aksi" type="submit" class="btn btn-danger" value="batal">Batal</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>