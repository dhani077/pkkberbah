<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form Ubah Catatan Data Dan Kegiatan Warga</h5>
    <form action="/CatatanKegwargaCon/update/<?= $catatankegwarga['no']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="no" value="<?= $catatankegwarga['no']; ?>">
        <input type="hidden" name="tahunLama" value="<?= $catatankegwarga['tahun']; ?>">
        <!-- <div class="form-group row">
            <label for="tahun" class="col-sm-3 col-form-label">Tahun</label>
            <div class="col-sm-2">
                <select class="form-control </?= ($validation->hasError('tahun')) ? 'is-invalid' : ''; ?>" id="tahun" name="tahun">
                    <option value="</?= (old('tahun')) ? old('tahun') : $catatankegwarga['tahun']; ?>"></?= (old('tahun')) ? old('tahun') : $catatankegwarga['tahun']; ?></option>
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
            <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Kegiatan</label>
            <div class="col-sm-3">
                <input type="date" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" id="tanggal" name="tanggal" value="<?= (old('tanggal')) ? old('tanggal') : $catatankegwarga['tanggal']; ?>">
            </div>
            <div class="invalid-feedback">
                <?= $validation->getError('tanggal'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="nama_kelurahan" class="col-sm-3 col-form-label">Nama Desa/Kelurahan</label>
            <div class="col-sm-3">
                <select class="form-control <?= ($validation->hasError('nama_kelurahan')) ? 'is-invalid' : ''; ?>" id="nama_kelurahan" name="nama_kelurahan">
                    <option value="<?= $catatankegwarga['nama_kelurahan']; ?>"><?= $catatankegwarga['nama_kelurahan']; ?></option>
                    <?php foreach ($wilayah as $w) : ?>
                        <?php if ($catatankegwarga['nama_kelurahan'] != $w['kelurahan']) : ?>
                            <option value="<?= $w['kelurahan']; ?>"><?= $w['kelurahan']; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('nama_kelurahan'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_dusun" class="col-sm-3 col-form-label">Jumlah kelompok PKK dusun/lingkungan</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_dusun')) ? 'is-invalid' : ''; ?>" id="jml_dusun" name="jml_dusun" value="<?= (old('jml_dusun')) ? old('jml_dusun') : $catatankegwarga['jml_dusun']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_rw" class="col-sm-3 col-form-label">Jumlah RW</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_rw')) ? 'is-invalid' : ''; ?>" id="jml_rw" name="jml_rw" value="<?= (old('jml_rw')) ? old('jml_rw') : $catatankegwarga['jml_rw']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_rt" class="col-sm-3 col-form-label">Jumlah RT</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_rt')) ? 'is-invalid' : ''; ?>" id="jml_rt" name="jml_rt" value="<?= (old('jml_rt')) ? old('jml_rt') : $catatankegwarga['jml_rt']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_dasawisma" class="col-sm-3 col-form-label">Jumlah dasawisma</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_dasawisma')) ? 'is-invalid' : ''; ?>" id="jml_dasawisma" name="jml_dasawisma" value="<?= (old('jml_dasawisma')) ? old('jml_dasawisma') : $catatankegwarga['jml_dasawisma']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_krt" class="col-sm-3 col-form-label">Jumlah KRT</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_krt')) ? 'is-invalid' : ''; ?>" id="jml_krt" name="jml_krt" value="<?= (old('jml_krt')) ? old('jml_krt') : $catatankegwarga['jml_krt']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_kk" class="col-sm-3 col-form-label">Jumlah KK</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_kk')) ? 'is-invalid' : ''; ?>" id="jml_kk" name="jml_kk" value="<?= (old('jml_kk')) ? old('jml_kk') : $catatankegwarga['jml_kk']; ?>">
            </div>
        </div>
        <hr>
        <label for="jumlah" class="pt-5"><b>Jumlah Anggota Keluarga</b></label>
        <div class="col">
            <div class="form-group row">
                <label for="jml_angt_keluarga_totL" class="col-sm-3 col-form-label">Total (Laki-laki)</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control <?= ($validation->hasError('jml_angt_keluarga_totL')) ? 'is-invalid' : ''; ?>" id="jml_angt_keluarga_totL" name="jml_angt_keluarga_totL" value="<?= (old('jml_angt_keluarga_totL')) ? old('jml_angt_keluarga_totL') : $catatankegwarga['jml_angt_keluarga_totL']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_angt_keluarga_totP" class="col-sm-3 col-form-label">Total (Perempuan)</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control <?= ($validation->hasError('jml_angt_keluarga_totP')) ? 'is-invalid' : ''; ?>" id="jml_angt_keluarga_totP" name="jml_angt_keluarga_totP" value="<?= (old('jml_angt_keluarga_totP')) ? old('jml_angt_keluarga_totP') : $catatankegwarga['jml_angt_keluarga_totP']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_angt_keluarga_balitaL" class="col-sm-3 col-form-label">Balita (Laki-laki)</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control <?= ($validation->hasError('jml_angt_keluarga_balitaL')) ? 'is-invalid' : ''; ?>" id="jml_angt_keluarga_balitaL" name="jml_angt_keluarga_balitaL" value="<?= (old('jml_angt_keluarga_balitaL')) ? old('jml_angt_keluarga_balitaL') : $catatankegwarga['jml_angt_keluarga_balitaL']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_angt_keluarga_balitaP" class="col-sm-3 col-form-label">Balita (Laki-laki)</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control <?= ($validation->hasError('jml_angt_keluarga_balitaP')) ? 'is-invalid' : ''; ?>" id="jml_angt_keluarga_balitaP" name="jml_angt_keluarga_balitaP" value="<?= (old('jml_angt_keluarga_balitaP')) ? old('jml_angt_keluarga_balitaP') : $catatankegwarga['jml_angt_keluarga_balitaP']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_angt_keluarga_pus" class="col-sm-3 col-form-label">Pasangan Usia Subur (PUS)</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control <?= ($validation->hasError('jml_angt_keluarga_pus')) ? 'is-invalid' : ''; ?>" id="jml_angt_keluarga_pus" name="jml_angt_keluarga_pus" value="<?= (old('jml_angt_keluarga_pus')) ? old('jml_angt_keluarga_pus') : $catatankegwarga['jml_angt_keluarga_pus']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_angt_keluarga_wus" class="col-sm-3 col-form-label">Wanita Usia Subur (WUS)</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control <?= ($validation->hasError('jml_angt_keluarga_wus')) ? 'is-invalid' : ''; ?>" id="jml_angt_keluarga_wus" name="jml_angt_keluarga_wus" value="<?= (old('jml_angt_keluarga_wus')) ? old('jml_angt_keluarga_wus') : $catatankegwarga['jml_angt_keluarga_wus']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_angt_keluarga_ibuhml" class="col-sm-3 col-form-label">Ibu hamil</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control <?= ($validation->hasError('jml_angt_keluarga_ibuhml')) ? 'is-invalid' : ''; ?>" id="jml_angt_keluarga_ibuhml" name="jml_angt_keluarga_ibuhml" value="<?= (old('jml_angt_keluarga_ibuhml')) ? old('jml_angt_keluarga_ibuhml') : $catatankegwarga['jml_angt_keluarga_ibuhml']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_angt_keluarga_ibunyusu" class="col-sm-3 col-form-label">Ibu menyusui</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control <?= ($validation->hasError('jml_angt_keluarga_ibunyusu')) ? 'is-invalid' : ''; ?>" id="jml_angt_keluarga_ibunyusu" name="jml_angt_keluarga_ibunyusu" value="<?= (old('jml_angt_keluarga_ibunyusu')) ? old('jml_angt_keluarga_ibunyusu') : $catatankegwarga['jml_angt_keluarga_ibunyusu']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_angt_keluarga_lansia" class="col-sm-3 col-form-label">Lansia</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control <?= ($validation->hasError('jml_angt_keluarga_lansia')) ? 'is-invalid' : ''; ?>" id="jml_angt_keluarga_lansia" name="jml_angt_keluarga_lansia" value="<?= (old('jml_angt_keluarga_lansia')) ? old('jml_angt_keluarga_lansia') : $catatankegwarga['jml_angt_keluarga_lansia']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_angt_keluarga_butaL" class="col-sm-3 col-form-label">3 Buta (Laki-laki)</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control <?= ($validation->hasError('jml_angt_keluarga_butaL')) ? 'is-invalid' : ''; ?>" id="jml_angt_keluarga_butaL" name="jml_angt_keluarga_butaL" value="<?= (old('jml_angt_keluarga_butaL')) ? old('jml_angt_keluarga_butaL') : $catatankegwarga['jml_angt_keluarga_butaL']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_angt_keluarga_butaP" class="col-sm-3 col-form-label">3 Buta (Perempuan)</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control <?= ($validation->hasError('jml_angt_keluarga_butaP')) ? 'is-invalid' : ''; ?>" id="jml_angt_keluarga_butaP" name="jml_angt_keluarga_butaP" value="<?= (old('jml_angt_keluarga_butaP')) ? old('jml_angt_keluarga_butaP') : $catatankegwarga['jml_angt_keluarga_butaP']; ?>">
                </div>
            </div>
        </div>
        <hr>
        <label for="jumlah" class="pt-5"><b>Kriteria Rumah</b></label>
        <div class="col">
            <div class="form-group row">
                <label for="jml_rmh_sehat" class="col-sm-3 col-form-label">Jumlah rumah sehat</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control <?= ($validation->hasError('jml_rmh_sehat')) ? 'is-invalid' : ''; ?>" id="jml_rmh_sehat" name="jml_rmh_sehat" value="<?= (old('jml_rmh_sehat')) ? old('jml_rmh_sehat') : $catatankegwarga['jml_rmh_sehat']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_rmh_krgsehat" class="col-sm-3 col-form-label">Jumlah rumah kurang sehat</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control <?= ($validation->hasError('jml_rmh_krgsehat')) ? 'is-invalid' : ''; ?>" id="jml_rmh_krgsehat" name="jml_rmh_krgsehat" value="<?= (old('jml_rmh_krgsehat')) ? old('jml_rmh_krgsehat') : $catatankegwarga['jml_rmh_krgsehat']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_rmh_sampah" class="col-sm-3 col-form-label">Jumlah rumah memiliki tempat pembuangan sampah</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control <?= ($validation->hasError('jml_rmh_sampah')) ? 'is-invalid' : ''; ?>" id="jml_rmh_sampah" name="jml_rmh_sampah" value="<?= (old('jml_rmh_sampah')) ? old('jml_rmh_sampah') : $catatankegwarga['jml_rmh_sampah']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_rmh_spal" class="col-sm-3 col-form-label">Jumlah rumah memiliki SPAL</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control <?= ($validation->hasError('jml_rmh_spal')) ? 'is-invalid' : ''; ?>" id="jml_rmh_spal" name="jml_rmh_spal" value="<?= (old('jml_rmh_spal')) ? old('jml_rmh_spal') : $catatankegwarga['jml_rmh_spal']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_rmh_p4k" class="col-sm-3 col-form-label">Jumlah rumah menempel stiker P4K</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control <?= ($validation->hasError('jml_rmh_p4k')) ? 'is-invalid' : ''; ?>" id="jml_rmh_p4k" name="jml_rmh_p4k" value="<?= (old('jml_rmh_p4k')) ? old('jml_rmh_p4k') : $catatankegwarga['jml_rmh_p4k']; ?>">
                </div>
            </div>
        </div>
        <hr>
        <label for="jumlah" class="pt-5"><b>Sumber Air Keluarga</b></label>
        <div class="col">
            <div class="form-group row">
                <label for="jml_airkel_pdam" class="col-sm-3 col-form-label">Jumlah pemakai PDAM</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control <?= ($validation->hasError('jml_airkel_pdam')) ? 'is-invalid' : ''; ?>" id="jml_airkel_pdam" name="jml_airkel_pdam" value="<?= (old('jml_airkel_pdam')) ? old('jml_airkel_pdam') : $catatankegwarga['jml_airkel_pdam']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_airkel_sumur" class="col-sm-3 col-form-label">Jumlah pemakai sumur</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control <?= ($validation->hasError('jml_airkel_sumur')) ? 'is-invalid' : ''; ?>" id="jml_airkel_sumur" name="jml_airkel_sumur" value="<?= (old('jml_airkel_sumur')) ? old('jml_airkel_sumur') : $catatankegwarga['jml_airkel_sumur']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_airkel_sungai" class="col-sm-3 col-form-label">Jumlah pemakai sungai</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control <?= ($validation->hasError('jml_airkel_sungai')) ? 'is-invalid' : ''; ?>" id="jml_airkel_sungai" name="jml_airkel_sungai" value="<?= (old('jml_airkel_sungai')) ? old('jml_airkel_sungai') : $catatankegwarga['jml_airkel_sungai']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_airkel_lain" class="col-sm-3 col-form-label">Jumlah pemakai lain-lain</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control <?= ($validation->hasError('jml_airkel_lain')) ? 'is-invalid' : ''; ?>" id="jml_airkel_lain" name="jml_airkel_lain" value="<?= (old('jml_airkel_lain')) ? old('jml_airkel_lain') : $catatankegwarga['jml_airkel_lain']; ?>">
                </div>
            </div>
        </div>
        <hr>
        <div class="form-group row pt-3">
            <label for="jml_jamban_kel" class="col-sm-3 col-form-label">Jumlah jamban keluarga</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_jamban_kel')) ? 'is-invalid' : ''; ?>" id="jml_jamban_kel" name="jml_jamban_kel" value="<?= (old('jml_jamban_kel')) ? old('jml_jamban_kel') : $catatankegwarga['jml_jamban_kel']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_mknpokok_beras" class="col-sm-3 col-form-label">Jumlah makanan pokok beras</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_mknpokok_beras')) ? 'is-invalid' : ''; ?>" id="jml_mknpokok_beras" name="jml_mknpokok_beras" value="<?= (old('jml_mknpokok_beras')) ? old('jml_mknpokok_beras') : $catatankegwarga['jml_mknpokok_beras']; ?>">
            </div>
        </div>
        <div class="form-group row pb-3">
            <label for="jml_mknpokok_nonberas" class="col-sm-3 col-form-label">Jumlah makanan pokok non beras</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('jml_mknpokok_nonberas')) ? 'is-invalid' : ''; ?>" id="jml_mknpokok_nonberas" name="jml_mknpokok_nonberas" value="<?= (old('jml_mknpokok_nonberas')) ? old('jml_mknpokok_nonberas') : $catatankegwarga['jml_mknpokok_nonberas']; ?>">
            </div>
        </div>
        <hr>
        <label for="jumlah" class="pt-5"><b>Jumlah Warga Mengikuti Kegiatan</b></label>
        <div class="col">
            <div class="form-group row">
                <label for="jml_wrg_up2k" class="col-sm-3 col-form-label">UP2K</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control <?= ($validation->hasError('jml_wrg_up2k')) ? 'is-invalid' : ''; ?>" id="jml_wrg_up2k" name="jml_wrg_up2k" value="<?= (old('jml_wrg_up2k')) ? old('jml_wrg_up2k') : $catatankegwarga['jml_wrg_up2k']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_wrg_mnfaat_tanah" class="col-sm-3 col-form-label">Pemanfaatan tanah pekarangan</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control <?= ($validation->hasError('jml_wrg_mnfaat_tanah')) ? 'is-invalid' : ''; ?>" id="jml_wrg_mnfaat_tanah" name="jml_wrg_mnfaat_tanah" value="<?= (old('jml_wrg_mnfaat_tanah')) ? old('jml_wrg_mnfaat_tanah') : $catatankegwarga['jml_wrg_mnfaat_tanah']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_wrg_industrirt" class="col-sm-3 col-form-label">Industri rumah tangga</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control <?= ($validation->hasError('jml_wrg_industrirt')) ? 'is-invalid' : ''; ?>" id="jml_wrg_industrirt" name="jml_wrg_industrirt" value="<?= (old('jml_wrg_industrirt')) ? old('jml_wrg_industrirt') : $catatankegwarga['jml_wrg_industrirt']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_wrg_keslingk" class="col-sm-3 col-form-label">Kesehatan lingkungan</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control <?= ($validation->hasError('jml_wrg_keslingk')) ? 'is-invalid' : ''; ?>" id="jml_wrg_keslingk" name="jml_wrg_keslingk" value="<?= (old('jml_wrg_keslingk')) ? old('jml_wrg_keslingk') : $catatankegwarga['jml_wrg_keslingk']; ?>">
                </div>
            </div>
        </div>
        <hr>

        <div class="form-group row pt-3">
            <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
            <div class="col-sm-7">
                <textarea type="text" class="form-control" id="keterangan" name="keterangan" value=""><?= (old('keterangan')) ? old('keterangan') : $catatankegwarga['keterangan']; ?></textarea>
            </div>
        </div>

        <div class="pt-5">
            <button id="aksi" name="aksi" type="submit" class="btn btn-primary" value="simpan">Simpan</button>
            <button id="aksi" name="aksi" type="submit" class="btn btn-danger" value="batal">Batal</button>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>