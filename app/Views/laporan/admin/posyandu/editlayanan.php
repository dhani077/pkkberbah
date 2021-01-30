<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form ubah jenis layanan Posyandu <?= $posyandu['nama_posyandu']; ?></h5>
    <form action="/PosyanduCon/updateLayanan/<?= $layanan['no']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="kd_posyandu" value="<?= $layanan['kd_posyandu']; ?>">
        <div class="form-group row">
            <label for="jns_kegiatan" class="col-sm-4 col-form-label">Jenis Kegiatan/Layanan </label>
            <div class="col-sm-7">
                <input type="text" class="form-control <?= ($validation->hasError('jns_kegiatan')) ? 'is-invalid' : ''; ?>" id="jns_kegiatan" name="jns_kegiatan" value="<?= (old('jns_kegiatan')) ? old('jns_kegiatan') : $layanan['jns_kegiatan']; ?>" autofocus>
                <div class="invalid-feedback">
                    <?= $validation->getError('jns_kegiatan'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="frekwensi_layanan" class="col-sm-4 col-form-label">Frekwensi Layanan</label>
            <div class="col-sm-7">
                <input type="text" class="form-control <?= ($validation->hasError('frekwensi_layanan')) ? 'is-invalid' : ''; ?>" id="frekwensi_layanan" name="frekwensi_layanan" value="<?= (old('frekwensi_layanan')) ? old('frekwensi_layanan') : $layanan['frekwensi_layanan']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('frekwensi_layanan'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_pengunjung_L" class="col-sm-4 col-form-label">Jumlah Pengunjung (Laki-laki)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_pengunjung_L')) ? 'is-invalid' : ''; ?>" id="jml_pengunjung_L" name="jml_pengunjung_L" value="<?= (old('jml_pengunjung_L')) ? old('jml_pengunjung_L') : $layanan['jml_pengunjung_L']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_pengunjung_L'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_pengunjung_P" class="col-sm-4 col-form-label">Jumlah Pengunjung (Perempuan)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_pengunjung_P')) ? 'is-invalid' : ''; ?>" id="jml_pengunjung_P" name="jml_pengunjung_P" value="<?= (old('jml_pengunjung_P')) ? old('jml_pengunjung_P') : $layanan['jml_pengunjung_P']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_pengunjung_P'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_petugas_L" class="col-sm-4 col-form-label">Jumlah Petugas (Laki-laki)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_petugas_L')) ? 'is-invalid' : ''; ?>" id="jml_petugas_L" name="jml_petugas_L" value="<?= (old('jml_petugas_L')) ? old('jml_petugas_L') : $layanan['jml_petugas_L']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_petugas_L'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_petugas_P" class="col-sm-4 col-form-label">Jumlah Petugas (Perempuan)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_petugas_P')) ? 'is-invalid' : ''; ?>" id="jml_petugas_P" name="jml_petugas_P" value="<?= (old('jml_petugas_P')) ? old('jml_petugas_P') : $layanan['jml_petugas_P']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_petugas_P'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
            <div class="col-sm-7">
                <textarea type="text" class="form-control" id="keterangan" name="keterangan" value=""><?= (old('keterangan')) ? old('keterangan') : $layanan['keterangan']; ?></textarea>
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