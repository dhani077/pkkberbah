<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form Ubah Data Pokja IV</h5>
    <form action="/PokjaIVCon/update/<?= $pokjaIV['no']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="no" value="<?= $pokjaIV['no']; ?>">
        <div class="form-group row">
            <label for="tanggal" class="col-sm-4 col-form-label">Tanggal pendataan</label>
            <div class="col-sm-3">
                <input type="date" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" id="tanggal" name="tanggal" autofocus value="<?= (old('tanggal')) ? old('tanggal') : $pokjaIV['tanggal']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tanggal'); ?>
                </div>
            </div>
        </div>
        <!-- <div class="form-group row">
            <label for="tahun" class="col-sm-4 col-form-label">Tahun</label>
            <div class="col-sm-2">
                <select class="form-control </?= ($validation->hasError('tahun')) ? 'is-invalid' : ''; ?>" id="tahun" name="tahun" autofocus>
                    <option value="</?= (old('tahun')) ? old('tahun') : $pokjaIV['tahun']; ?>"></?= (old('tahun')) ? old('tahun') : $pokjaIV['tahun']; ?></option>
                    </?php
                    $thn_skr = date('Y');
                    for ($x = $thn_skr; $x >= 2010; $x--) {
                    ?>
                        <option value="</?= $x; ?>"></?= $x; ?></option>
                    </?php
                    }
                    ?>
                </select>
                <div class="invalid-feedback">
                    </?= $validation->getError('tahun'); ?>
                </div>
            </div>
        </div> -->
        <div class="form-group row">
            <label for="kd_wilayah" class="col-sm-4 col-form-label">Nama desa/kelurahan</label>
            <div class="col-sm-3">
                <select class="form-control <?= ($validation->hasError('kd_wilayah')) ? 'is-invalid' : ''; ?>" id="kd_wilayah" name="kd_wilayah">
                    <?php foreach ($wilayah as $w) : ?>
                        <?php if ($pokjaIV['kd_wilayah'] == $w['kd_wilayah']) : ?>
                            <option value="<?= $pokjaIV['kd_wilayah']; ?>"><?= $w['kelurahan']; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <?php foreach ($wilayah as $w) : ?>
                        <?php if ($pokjaIV['kd_wilayah'] != $w['kd_wilayah']) : ?>
                            <option value="<?= $w['kd_wilayah']; ?>"><?= $w['kelurahan']; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('kd_wilayah'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_kader_posyandu" class="col-sm-4 col-form-label">Jumlah kader posyandu</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_kader_posyandu" name="jml_kader_posyandu" value="<?= (old('jml_kader_posyandu')) ? old('jml_kader_posyandu') : $pokjaIV['jml_kader_posyandu']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_kader_gizi" class="col-sm-4 col-form-label">Jumlah kader gizi</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_kader_gizi" name="jml_kader_gizi" value="<?= (old('jml_kader_gizi')) ? old('jml_kader_gizi') : $pokjaIV['jml_kader_gizi']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_kader_kesling" class="col-sm-4 col-form-label">Jumlah kader kesling</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_kader_kesling" name="jml_kader_kesling" value="<?= (old('jml_kader_kesling')) ? old('jml_kader_kesling') : $pokjaIV['jml_kader_kesling']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_kader_narkoba" class="col-sm-4 col-form-label">Jumlah kader penyuluhan narkoba</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_kader_narkoba" name="jml_kader_narkoba" value="<?= (old('jml_kader_narkoba')) ? old('jml_kader_narkoba') : $pokjaIV['jml_kader_narkoba']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_kader_phbs" class="col-sm-4 col-form-label">Jumlah kader PHBS</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_kader_phbs" name="jml_kader_phbs" value="<?= (old('jml_kader_phbs')) ? old('jml_kader_phbs') : $pokjaIV['jml_kader_phbs']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_kader_kb" class="col-sm-4 col-form-label">Jumlah kader KB</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_kader_kb" name="jml_kader_kb" value="<?= (old('jml_kader_kb')) ? old('jml_kader_kb') : $pokjaIV['jml_kader_kb']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_posyandu_ksht" class="col-sm-4 col-form-label">Jumlah total/keseluruhan psoyandu</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_posyandu_ksht" name="jml_posyandu_ksht" value="<?= (old('jml_posyandu_ksht')) ? old('jml_posyandu_ksht') : $pokjaIV['jml_posyandu_ksht']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_posyandu_integrasi" class="col-sm-4 col-form-label">Jumlah total/keseluruhan psoyandu yang telah terintegrasi</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_posyandu_integrasi" name="jml_posyandu_integrasi" value="<?= (old('jml_posyandu_integrasi')) ? old('jml_posyandu_integrasi') : $pokjaIV['jml_posyandu_integrasi']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_klp_lansia_posyandu" class="col-sm-4 col-form-label">Jumlah total kelompok lansia</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_klp_lansia_posyandu" name="jml_klp_lansia_posyandu" value="<?= (old('jml_klp_lansia_posyandu')) ? old('jml_klp_lansia_posyandu') : $pokjaIV['jml_klp_lansia_posyandu']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_anggota_lansia_posyandu" class="col-sm-4 col-form-label">Jumlah anggota lansia</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_anggota_lansia_posyandu" name="jml_anggota_lansia_posyandu" value="<?= (old('jml_anggota_lansia_posyandu')) ? old('jml_anggota_lansia_posyandu') : $pokjaIV['jml_anggota_lansia_posyandu']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_kartu_lansia_posyandu" class="col-sm-4 col-form-label">Jumlah anggota lansia yang memiliki kartu berobat gratis</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_kartu_lansia_posyandu" name="jml_kartu_lansia_posyandu" value="<?= (old('jml_kartu_lansia_posyandu')) ? old('jml_kartu_lansia_posyandu') : $pokjaIV['jml_kartu_lansia_posyandu']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_rmh_jamban_kshtlh" class="col-sm-4 col-form-label">Jumlah rumah yang memiliki jamban keluarga</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_rmh_jamban_kshtlh" name="jml_rmh_jamban_kshtlh" value="<?= (old('jml_rmh_jamban_kshtlh')) ? old('jml_rmh_jamban_kshtlh') : $pokjaIV['jml_rmh_jamban_kshtlh']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_rmh_spal_kshtlh" class="col-sm-4 col-form-label">Jumlah SPAL keluarga</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_rmh_spal_kshtlh" name="jml_rmh_spal_kshtlh" value="<?= (old('jml_rmh_spal_kshtlh')) ? old('jml_rmh_spal_kshtlh') : $pokjaIV['jml_rmh_spal_kshtlh']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_rmh_sampah_kshtlh" class="col-sm-4 col-form-label">Jumlah tempat pembuangan sampah keluarga</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_rmh_sampah_kshtlh" name="jml_rmh_sampah_kshtlh" value="<?= (old('jml_rmh_sampah_kshtlh')) ? old('jml_rmh_sampah_kshtlh') : $pokjaIV['jml_rmh_sampah_kshtlh']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_mck_kshtlh" class="col-sm-4 col-form-label">Jumlah MCK</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_mck_kshtlh" name="jml_mck_kshtlh" value="<?= (old('jml_mck_kshtlh')) ? old('jml_mck_kshtlh') : $pokjaIV['jml_mck_kshtlh']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_air_pdam_kshtlh" class="col-sm-4 col-form-label">Jumlah kepala rumah tangga menggunakan air PDAM</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_air_pdam_kshtlh" name="jml_air_pdam_kshtlh" value="<?= (old('jml_air_pdam_kshtlh')) ? old('jml_air_pdam_kshtlh') : $pokjaIV['jml_air_pdam_kshtlh']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_air_sumur_kshtlh" class="col-sm-4 col-form-label">Jumlah kepala rumah tangga menggunakan air sumur</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_air_sumur_kshtlh" name="jml_air_sumur_kshtlh" value="<?= (old('jml_air_sumur_kshtlh')) ? old('jml_air_sumur_kshtlh') : $pokjaIV['jml_air_sumur_kshtlh']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_air_lain_kshtlh" class="col-sm-4 col-form-label">Jumlah kepala rumah tangga menggunakan lain-lain</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_air_lain_kshtlh" name="jml_air_lain_kshtlh" value="<?= (old('jml_air_lain_kshtlh')) ? old('jml_air_lain_kshtlh') : $pokjaIV['jml_air_lain_kshtlh']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_pus_rncnsehat" class="col-sm-4 col-form-label">Jumlah pasangan usia subur (PUS)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_pus_rncnsehat" name="jml_pus_rncnsehat" value="<?= (old('jml_pus_rncnsehat')) ? old('jml_pus_rncnsehat') : $pokjaIV['jml_pus_rncnsehat']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_wus_rncnsehat" class="col-sm-4 col-form-label">Jumlah wanita usia subur (WUS)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_wus_rncnsehat" name="jml_wus_rncnsehat" value="<?= (old('jml_wus_rncnsehat')) ? old('jml_wus_rncnsehat') : $pokjaIV['jml_wus_rncnsehat']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_akseptorl_rncnsehat" class="col-sm-4 col-form-label">Jumlah akseptor KB (Laki-laki)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_akseptorl_rncnsehat" name="jml_akseptorl_rncnsehat" value="<?= (old('jml_akseptorl_rncnsehat')) ? old('jml_akseptorl_rncnsehat') : $pokjaIV['jml_akseptorl_rncnsehat']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_akseptorp_rncnsehat" class="col-sm-4 col-form-label">Jumlah akseptor KB (Perempuan)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_akseptorp_rncnsehat" name="jml_akseptorp_rncnsehat" value="<?= (old('jml_akseptorp_rncnsehat')) ? old('jml_akseptorp_rncnsehat') : $pokjaIV['jml_akseptorp_rncnsehat']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_tabkel_rncnsehat" class="col-sm-4 col-form-label">Jumlah KK yang mempunyai tabungan (bila pada data isian warga didata 1 KK memiliki 2 tabungan, cukup didata 1)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_tabkel_rncnsehat" name="jml_tabkel_rncnsehat" value="<?= (old('jml_tabkel_rncnsehat')) ? old('jml_tabkel_rncnsehat') : $pokjaIV['jml_tabkel_rncnsehat']; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
            <div class="col-sm-7">
                <textarea type="text" class="form-control" id="keterangan" name="keterangan" value=""><?= (old('keterangan')) ? old('keterangan') : $pokjaIV['keterangan']; ?></textarea>
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