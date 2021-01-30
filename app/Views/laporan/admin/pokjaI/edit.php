<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form Ubah Data Kegiatan Pokja I</h5>
    <form action="/PokjaICon/update/<?= $pokjaI['no']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="no" value="<?= $pokjaI['no']; ?>">
        <div class="form-group row">
            <label for="tanggal" class="col-sm-4 col-form-label">Tanggal pendataan</label>
            <div class="col-sm-3">
                <input type="date" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" id="tanggal" name="tanggal" autofocus value="<?= (old('tanggal')) ? old('tanggal') : $pokjaI['tanggal']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tanggal'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="kd_wilayah" class="col-sm-4 col-form-label">Nama desa/kelurahan</label>
            <div class="col-sm-3">
                <select class="form-control <?= ($validation->hasError('kd_wilayah')) ? 'is-invalid' : ''; ?>" id="kd_wilayah" name="kd_wilayah">
                    <?php foreach ($wilayah as $w) : ?>
                        <?php if ($pokjaI['kd_wilayah'] == $w['kd_wilayah']) : ?>
                            <option value="<?= $pokjaI['kd_wilayah']; ?>"><?= $w['kelurahan']; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <?php foreach ($wilayah as $w) : ?>
                        <?php if ($pokjaI['kd_wilayah'] != $w['kd_wilayah']) : ?>
                            <option value="<?= $w['kd_wilayah']; ?>"><?= $w['kelurahan']; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('kd_wilayah'); ?>
                </div>
            </div>
        </div>
        <hr>
        <label class="pt-3"><b>Jumlah Kader</b></label>
        <div class="col">
            <div class="form-group row">
                <label for="jml_kader_pkbn" class="col-sm-4 col-form-label">Jumlah kader PKBN</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="jml_kader_pkbn" name="jml_kader_pkbn" value="<?= (old('jml_kader_pkbn')) ? old('jml_kader_pkbn') : $pokjaI['jml_kader_pkbn']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_kader_pkdrt" class="col-sm-4 col-form-label">Jumlah kader PKDRT</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="jml_kader_pkdrt" name="jml_kader_pkdrt" value="<?= (old('jml_kader_pkdrt')) ? old('jml_kader_pkdrt') : $pokjaI['jml_kader_pkdrt']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_kader_polaasuh" class="col-sm-4 col-form-label">Jumlah kader pola asuh</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="jml_kader_polaasuh" name="jml_kader_polaasuh" value="<?= (old('jml_kader_polaasuh')) ? old('jml_kader_polaasuh') : $pokjaI['jml_kader_polaasuh']; ?>">
                </div>
            </div>
        </div>
        <hr>
        <label class="pt-3"><b>Penghayatan Dan Pengamalan Pancasila</b></label>
        <div class="col">
            <div class="form-group row">
                <label for="jml_klp_simulasi_pkbn" class="col-sm-4 col-form-label">Jumlah kelompok simulasi PKBN</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="jml_klp_simulasi_pkbn" name="jml_klp_simulasi_pkbn" value="<?= (old('jml_klp_simulasi_pkbn')) ? old('jml_klp_simulasi_pkbn') : $pokjaI['jml_klp_simulasi_pkbn']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_anggota_pkbn" class="col-sm-4 col-form-label">Jumlah anggota kelompok PKBN</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="jml_anggota_pkbn" name="jml_anggota_pkbn" value="<?= (old('jml_anggota_pkbn')) ? old('jml_anggota_pkbn') : $pokjaI['jml_anggota_pkbn']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_klp_simulasi_pkdrt" class="col-sm-4 col-form-label">Jumlah kelompok simulasi PKDRT</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="jml_klp_simulasi_pkdrt" name="jml_klp_simulasi_pkdrt" value="<?= (old('jml_klp_simulasi_pkdrt')) ? old('jml_klp_simulasi_pkdrt') : $pokjaI['jml_klp_simulasi_pkdrt']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_anggota_pkdrt" class="col-sm-4 col-form-label">Jumlah anggota kelompok PKDRT</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="jml_anggota_pkdrt" name="jml_anggota_pkdrt" value="<?= (old('jml_anggota_pkdrt')) ? old('jml_anggota_pkdrt') : $pokjaI['jml_anggota_pkdrt']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_klp_polaasuh" class="col-sm-4 col-form-label">Jumlah kelompok pola asuh</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="jml_klp_polaasuh" name="jml_klp_polaasuh" value="<?= (old('jml_klp_polaasuh')) ? old('jml_klp_polaasuh') : $pokjaI['jml_klp_polaasuh']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_anggota_polaasuh" class="col-sm-4 col-form-label">Jumlah anggota kelompok pola asuh</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="jml_anggota_polaasuh" name="jml_anggota_polaasuh" value="<?= (old('jml_anggota_polaasuh')) ? old('jml_anggota_polaasuh') : $pokjaI['jml_anggota_polaasuh']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_klp_lansia" class="col-sm-4 col-form-label">Jumlah kelompok lansia</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="jml_klp_lansia" name="jml_klp_lansia" value="<?= (old('jml_klp_lansia')) ? old('jml_klp_lansia') : $pokjaI['jml_klp_lansia']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_anggota_lansia" class="col-sm-4 col-form-label">Jumlah anggota kelompok lansia</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="jml_anggota_lansia" name="jml_anggota_lansia" value="<?= (old('jml_anggota_lansia')) ? old('jml_anggota_lansia') : $pokjaI['jml_anggota_lansia']; ?>">
                </div>
            </div>
        </div>
        <hr>
        <label class="pt-3"><b>Gotong Royong</b></label>
        <div class="col">
            <div class="form-group row">
                <label for="jml_klp_kerjabakti" class="col-sm-4 col-form-label">Jumlah kelompok kerja bakti</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="jml_klp_kerjabakti" name="jml_klp_kerjabakti" value="<?= (old('jml_klp_kerjabakti')) ? old('jml_klp_kerjabakti') : $pokjaI['jml_klp_kerjabakti']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_klp_rknmati" class="col-sm-4 col-form-label">Jumlah kelompok rukun kematian</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="jml_klp_rknmati" name="jml_klp_rknmati" value="<?= (old('jml_klp_rknmati')) ? old('jml_klp_rknmati') : $pokjaI['jml_klp_rknmati']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_klp_keagamaan" class="col-sm-4 col-form-label">Jumlah kelompok keagamaan</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="jml_klp_keagamaan" name="jml_klp_keagamaan" value="<?= (old('jml_klp_keagamaan')) ? old('jml_klp_keagamaan') : $pokjaI['jml_klp_keagamaan']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_klp_jimpitan" class="col-sm-4 col-form-label">Jumlah kelompok jimpitan</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="jml_klp_jimpitan" name="jml_klp_jimpitan" value="<?= (old('jml_klp_jimpitan')) ? old('jml_klp_jimpitan') : $pokjaI['jml_klp_jimpitan']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_klp_arisan" class="col-sm-4 col-form-label">Jumlah kelompok arisan</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="jml_klp_arisan" name="jml_klp_arisan" value="<?= (old('jml_klp_arisan')) ? old('jml_klp_arisan') : $pokjaI['jml_klp_arisan']; ?>">
                </div>
            </div>
        </div>
        <hr>

        <div class="form-group row">
            <label for="keterangan" class="col-sm-4 pt-3 col-form-label">Keterangan</label>
            <div class="col-sm-7 pt-3">
                <textarea type="text" class="form-control" id="keterangan" name="keterangan" value=""><?= (old('keterangan')) ? old('keterangan') : $pokjaI['keterangan']; ?></textarea>
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