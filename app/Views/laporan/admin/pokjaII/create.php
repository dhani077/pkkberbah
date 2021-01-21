<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form Tambah Data Pokja II</h5>
    <form action="/PokjaIICon/save" method="post" enctype="multipart/form-data">
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
            <label for="jml_wrg_tiga_buta" class="col-sm-4 col-form-label">Jumlah warga mengalami 3 buta</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_wrg_tiga_buta" name="jml_wrg_tiga_buta" value="<?= old('jml_wrg_tiga_buta'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_klp_bljr_paketa" class="col-sm-4 col-form-label">Jumlah kelompok belajar<br>paket A</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_klp_bljr_paketa" name="jml_klp_bljr_paketa" value="<?= old('jml_klp_bljr_paketa'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_wrg_bljr_paketa" class="col-sm-4 col-form-label">Jumlah warga belajar paket A</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_wrg_bljr_paketa" name="jml_wrg_bljr_paketa" value="<?= old('jml_wrg_bljr_paketa'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_klp_bljr_paketb" class="col-sm-4 col-form-label">Jumlah kelompok belajar<br>paket B</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_klp_bljr_paketb" name="jml_klp_bljr_paketb" value="<?= old('jml_klp_bljr_paketb'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_wrg_bljr_paketb" class="col-sm-4 col-form-label">Jumlah warga belajar paket B</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_wrg_bljr_paketb" name="jml_wrg_bljr_paketb" value="<?= old('jml_wrg_bljr_paketb'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_klp_bljr_paketc" class="col-sm-4 col-form-label">Jumlah kelompok belajar<br>paket C</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_klp_bljr_paketc" name="jml_klp_bljr_paketc" value="<?= old('jml_klp_bljr_paketc'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_wrg_bljr_paketc" class="col-sm-4 col-form-label">Jumlah warga belajar paket C</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_wrg_bljr_paketc" name="jml_wrg_bljr_paketc" value="<?= old('jml_wrg_bljr_paketc'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_klp_bljr_kf" class="col-sm-4 col-form-label">Jumlah kelompok belajar keaksaraan fungsional(KF)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_klp_bljr_kf" name="jml_klp_bljr_kf" value="<?= old('jml_klp_bljr_kf'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_klp_bljr_kf_wrgbljr" class="col-sm-4 col-form-label">Jumlah warga belajar keaksaraan fungsional(KF)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_klp_bljr_kf_wrgbljr" name="jml_klp_bljr_kf_wrgbljr" value="<?= old('jml_klp_bljr_kf_wrgbljr'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_klp_bljr_paud" class="col-sm-4 col-form-label">Jumlah kelompok belajar PAUD sejenis</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_klp_bljr_paud" name="jml_klp_bljr_paud" value="<?= old('jml_klp_bljr_paud'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_perpus" class="col-sm-4 col-form-label">Jumlah taman bacaan/perpustakaan</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_perpus" name="jml_perpus" value="<?= old('jml_perpus'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_klp_bkb" class="col-sm-4 col-form-label">Jumlah kelompok bina keluarga balita</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_klp_bkb" name="jml_klp_bkb" value="<?= old('jml_klp_bkb'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_ibu_peserta_bkb" class="col-sm-4 col-form-label">Jumlah peserta bina keluarga balita</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_ibu_peserta_bkb" name="jml_ibu_peserta_bkb" value="<?= old('jml_ibu_peserta_bkb'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_ape_bkb" class="col-sm-4 col-form-label">Jumlah (set) alat permainan edukatif BKB</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_ape_bkb" name="jml_ape_bkb" value="<?= old('jml_ape_bkb'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_klp_simulasi_bkb" class="col-sm-4 col-form-label">Jumlah kelompok simulasi BKB</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_klp_simulasi_bkb" name="jml_klp_simulasi_bkb" value="<?= old('jml_klp_simulasi_bkb'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_tuto_kf" class="col-sm-4 col-form-label">Jumlah tutor KF</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_tuto_kf" name="jml_tuto_kf" value="<?= old('jml_tuto_kf'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_tuto_paud_kader" class="col-sm-4 col-form-label">Jumlah tutor PAUD sejenis</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_tuto_paud_kader" name="jml_tuto_paud_kader" value="<?= old('jml_tuto_paud_kader'); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="jml_bkb_kader" class="col-sm-4 col-form-label">Jumlah kader BKB</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_bkb_kader" name="jml_bkb_kader" value="<?= old('jml_bkb_kader'); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="jml_koperasi_kader" class="col-sm-4 col-form-label">Jumlah kelompok kader koperasi</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_koperasi_kader" name="jml_koperasi_kader" value="<?= old('jml_koperasi_kader'); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="jml_ktrmpilan_kader" class="col-sm-4 col-form-label">Jumlah kader keterampilan</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_ktrmpilan_kader" name="jml_ktrmpilan_kader" value="<?= old('jml_ktrmpilan_kader'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_lp3_kader_latih" class="col-sm-4 col-form-label">Jumlah kader yang sudah dilatih LP3PKK</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_lp3_kader_latih" name="jml_lp3_kader_latih" value="<?= old('jml_lp3_kader_latih'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_tpk3_kader_latih" class="col-sm-4 col-form-label">Jumlah kader yang sudah dilatih TP3PKK</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_tpk3_kader_latih" name="jml_tpk3_kader_latih" value="<?= old('jml_tpk3_kader_latih'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_damas_kader_latih" class="col-sm-4 col-form-label">Jumlah kader yang sudah dilatih DAMAS</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_damas_kader_latih" name="jml_damas_kader_latih" value="<?= old('jml_damas_kader_latih'); ?>">
            </div>
        </div>
        <hr>
        <label class=pt-3><b>Pra Koperasi/Usaha Bersama/UP2K</b></label>
        <div class="col">
            <div class="form-group row">
                <label for="jml_klp_pemula_prakop" class="col-sm-4 col-form-label">Jumlah kelompok tingkat pemula</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="jml_klp_pemula_prakop" name="jml_klp_pemula_prakop" value="<?= old('jml_klp_pemula_prakop'); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_psrt_pemula_prakop" class="col-sm-4 col-form-label">Jumlah peserta tingkat pemula </label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="jml_psrt_pemula_prakop" name="jml_psrt_pemula_prakop" value="<?= old('jml_psrt_pemula_prakop'); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_klp_madya_prakop" class="col-sm-4 col-form-label">Jumlah kelompok tingkat madya</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="jml_klp_madya_prakop" name="jml_klp_madya_prakop" value="<?= old('jml_klp_madya_prakop'); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_psrt_madya_prakop" class="col-sm-4 col-form-label">Jumlah peserta tingkat madya</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="jml_psrt_madya_prakop" name="jml_psrt_madya_prakop" value="<?= old('jml_psrt_madya_prakop'); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_klp_utama_prakop" class="col-sm-4 col-form-label">Jumlah kelompok tingkat utama</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="jml_klp_utama_prakop" name="jml_klp_utama_prakop" value="<?= old('jml_klp_utama_prakop'); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_psrt_utama_prakop" class="col-sm-4 col-form-label">Jumlah peserta tingkat utama</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="jml_psrt_utama_prakop" name="jml_psrt_utama_prakop" value="<?= old('jml_psrt_utama_prakop'); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_klp_mandiri_prakop" class="col-sm-4 col-form-label">Jumlah kelompok tingkat mandiri</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="jml_klp_mandiri_prakop" name="jml_klp_mandiri_prakop" value="<?= old('jml_klp_mandiri_prakop'); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jml_psrt_mandiri_prakop" class="col-sm-4 col-form-label">Jumlah peserta tingkat mandiri</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="jml_psrt_mandiri_prakop" name="jml_psrt_mandiri_prakop" value="<?= old('jml_psrt_mandiri_prakop'); ?>">
                </div>
            </div>
        </div>
        <hr>
        <div class="form-group row">
            <label for="jml_klp_kophkm" class="col-sm-4 col-form-label">Jumlah kelompok koperasi berbadan hukum</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_klp_kophkm" name="jml_klp_kophkm" value="<?= old('jml_klp_kophkm'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_anggota_kophkm" class="col-sm-4 col-form-label">Jumlah anggota koperasi berbadan hukum</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_anggota_kophkm" name="jml_anggota_kophkm" value="<?= old('jml_anggota_kophkm'); ?>">
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