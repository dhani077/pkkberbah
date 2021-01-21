<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">
        <center>Form Ubah Data Pengunjung Posyandu</center>
    </h5>
    <form action="/DatapengunjungposyanduCon/update/<?= $datapengunjung['no']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="no" value="<?= $datapengunjung['no']; ?>">
        <input type="hidden" name="kd_posyandu" value="<?= $datapengunjung['kd_posyandu']; ?>">
        <div class="form-group row">
            <label for="tanggal" class="col-sm-5 col-form-label">Tanggal Pelayanan</label>
            <div class="col-sm-3">
                <input type="date" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" id="tanggal" name="tanggal" value="<?= (old('tanggal')) ? old('tanggal') : $datapengunjung['tanggal']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tanggal'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_pengunjung_sthun_baruL" class="col-sm-5 col-form-label">Jumlah balita umur 0-12 bulan (Laki-laki) baru pertama kali datang </label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_pengunjung_sthun_baruL" name="jml_pengunjung_sthun_baruL" value="<?= (old('jml_pengunjung_sthun_baruL')) ? old('jml_pengunjung_sthun_baruL') : $datapengunjung['jml_pengunjung_sthun_baruL']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_pengunjung_sthun_baruP" class="col-sm-5 col-form-label">Jumlah balita umur 0-12 bulan (Perempuan) baru pertama kali datang</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_pengunjung_sthun_baruP" name="jml_pengunjung_sthun_baruP" value="<?= (old('jml_pengunjung_sthun_baruP')) ? old('jml_pengunjung_sthun_baruP') : $datapengunjung['jml_pengunjung_sthun_baruP']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_pengunjung_sthun_lamaL" class="col-sm-5 col-form-label">Jumlah balita umur 0-12 bulan (Laki-laki) yang sudah lama menjadi sasaran</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_pengunjung_sthun_lamaL" name="jml_pengunjung_sthun_lamaL" value="<?= (old('jml_pengunjung_sthun_lamaL')) ? old('jml_pengunjung_sthun_lamaL') : $datapengunjung['jml_pengunjung_sthun_lamaL']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_pengunjung_sthun_lamaP" class="col-sm-5 col-form-label">Jumlah balita umur 0-12 bulan (Perempuan)yang sudah lama menjadi sasaran</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_pengunjung_sthun_lamaP" name="jml_pengunjung_sthun_lamaP" value="<?= (old('jml_pengunjung_sthun_lamaP')) ? old('jml_pengunjung_sthun_lamaP') : $datapengunjung['jml_pengunjung_sthun_lamaP']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_pengunjung_limath_baruL" class="col-sm-5 col-form-label">Jumlah balita umur 1-5 tahun (Laki-laki) baru pertama kali datang</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_pengunjung_limath_baruL" name="jml_pengunjung_limath_baruL" value="<?= (old('jml_pengunjung_limath_baruL')) ? old('jml_pengunjung_limath_baruL') : $datapengunjung['jml_pengunjung_limath_baruL']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_pengunjung_limath_baruP" class="col-sm-5 col-form-label">Jumlah balita umur 1-5 tahun (Perempuan) baru pertama kali datang</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_pengunjung_limath_baruP" name="jml_pengunjung_limath_baruP" value="<?= (old('jml_pengunjung_limath_baruP')) ? old('jml_pengunjung_limath_baruP') : $datapengunjung['jml_pengunjung_limath_baruP']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_pengunjung_limath_lamaL" class="col-sm-5 col-form-label">Jumlah balita umur 1-5 tahun (Laki-laki) yang sudah lama menjadi sasaran</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_pengunjung_limath_lamaL" name="jml_pengunjung_limath_lamaL" value="<?= (old('jml_pengunjung_limath_lamaL')) ? old('jml_pengunjung_limath_lamaL') : $datapengunjung['jml_pengunjung_limath_lamaL']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_pengunjung_limath_lamaP" class="col-sm-5 col-form-label">Jumlah balita umur 1-5 tahun (Perempuan) yang sudah lama menjadi sasaran</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_pengunjung_limath_lamaP" name="jml_pengunjung_limath_lamaP" value="<?= (old('jml_pengunjung_limath_lamaP')) ? old('jml_pengunjung_limath_lamaP') : $datapengunjung['jml_pengunjung_limath_lamaP']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_pengunjung_wus" class="col-sm-5 col-form-label">Jumlah wanita usia subur (WUS) yang datang</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_pengunjung_wus" name="jml_pengunjung_wus" value="<?= (old('jml_pengunjung_wus')) ? old('jml_pengunjung_wus') : $datapengunjung['jml_pengunjung_wus']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_pengunjung_pus_ibu" class="col-sm-5 col-form-label">Jumlah pasangan usia subur (PUS) yang datang</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_pengunjung_pus_ibu" name="jml_pengunjung_pus_ibu" value="<?= (old('jml_pengunjung_pus_ibu')) ? old('jml_pengunjung_pus_ibu') : $datapengunjung['jml_pengunjung_pus_ibu']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_pengunjung_hamil_ibu" class="col-sm-5 col-form-label">Jumlah ibu hamil yang datang</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_pengunjung_hamil_ibu" name="jml_pengunjung_hamil_ibu" value="<?= (old('jml_pengunjung_hamil_ibu')) ? old('jml_pengunjung_hamil_ibu') : $datapengunjung['jml_pengunjung_hamil_ibu']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_pengunjung_nyusu_ibu" class="col-sm-5 col-form-label">Jumlah ibu menyusui yang datang</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_pengunjung_nyusu_ibu" name="jml_pengunjung_nyusu_ibu" value="<?= (old('jml_pengunjung_nyusu_ibu')) ? old('jml_pengunjung_nyusu_ibu') : $datapengunjung['jml_pengunjung_nyusu_ibu']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_hadir_kader_l" class="col-sm-5 col-form-label">Jumlah kader (Laki-laki) yang aktif</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_hadir_kader_l" name="jml_hadir_kader_l" value="<?= (old('jml_hadir_kader_l')) ? old('jml_hadir_kader_l') : $datapengunjung['jml_hadir_kader_l']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_hadir_kader_p" class="col-sm-5 col-form-label">Jumlah kader (Perempuan) yang aktif</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_hadir_kader_p" name="jml_hadir_kader_p" value="<?= (old('jml_hadir_kader_p')) ? old('jml_hadir_kader_p') : $datapengunjung['jml_hadir_kader_p']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_hadir_plkb_l" class="col-sm-5 col-form-label">Jumlah petugas (Laki-laki) lapangan KB (PLKB) yang hadir</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_hadir_plkb_l" name="jml_hadir_plkb_l" value="<?= (old('jml_hadir_plkb_l')) ? old('jml_hadir_plkb_l') : $datapengunjung['jml_hadir_plkb_l']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_hadir_plkb_p" class="col-sm-5 col-form-label">Jumlah petugas (Perempuan) lapangan KB (PLKB) yang hadir</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_hadir_plkb_p" name="jml_hadir_plkb_p" value="<?= (old('jml_hadir_plkb_p')) ? old('jml_hadir_plkb_p') : $datapengunjung['jml_hadir_plkb_p']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_hadir_medis_l" class="col-sm-5 col-form-label">Jumlah tenaga medis dan para medis (Laki-laki) yang hadir</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_hadir_medis_l" name="jml_hadir_medis_l" value="<?= (old('jml_hadir_medis_l')) ? old('jml_hadir_medis_l') : $datapengunjung['jml_hadir_medis_l']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_hadir_medis_p" class="col-sm-5 col-form-label">Jumlah tenaga medis dan para medis (Perempuan) yang hadir</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_hadir_medis_p" name="jml_hadir_medis_p" value="<?= (old('jml_hadir_medis_p')) ? old('jml_hadir_medis_p') : $datapengunjung['jml_hadir_medis_p']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_bayi_lahirL" class="col-sm-5 col-form-label">Jumlah bayi lahir (Laki-laki)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_bayi_lahirL" name="jml_bayi_lahirL" value="<?= (old('jml_bayi_lahirL')) ? old('jml_bayi_lahirL') : $datapengunjung['jml_bayi_lahirL']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_bayi_lahirP" class="col-sm-5 col-form-label">Jumlah bayi lahir (Perempuan)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_bayi_lahirP" name="jml_bayi_lahirP" value="<?= (old('jml_bayi_lahirP')) ? old('jml_bayi_lahirP') : $datapengunjung['jml_bayi_lahirP']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_bayi_mnglL" class="col-sm-5 col-form-label">Jumlah bayi meninggal (Laki-laki)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_bayi_mnglL" name="jml_bayi_mnglL" value="<?= (old('jml_bayi_mnglL')) ? old('jml_bayi_mnglL') : $datapengunjung['jml_bayi_mnglL']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_bayi_mnglP" class="col-sm-5 col-form-label">Jumlah bayi meninggal (Perempuan)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_bayi_mnglP" name="jml_bayi_mnglP" value="<?= (old('jml_bayi_mnglP')) ? old('jml_bayi_mnglP') : $datapengunjung['jml_bayi_mnglP']; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="keterangan" class="col-sm-5 col-form-label">Keterangan</label>
            <div class="col-sm-6">
                <textarea type="text" class="form-control" id="keterangan" name="keterangan" value=""><?= (old('keterangan')) ? old('keterangan') : $datapengunjung['keterangan']; ?></textarea>
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