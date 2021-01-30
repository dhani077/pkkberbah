<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form Tambah Data Kegiatan Posyandu</h5>
    <form action="/KegiatanposyanduCon/save/<?= $kdPosyandu; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="kd_posyandu" value="<?= $kdPosyandu; ?>">
        <div class="form-group row">
            <label for="tanggal" class="col-sm-5 col-form-label">Tanggal Pelayanan</label>
            <div class="col-sm-3">
                <input type="date" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" id="tanggal" name="tanggal" autofocus value="<?= old('tanggal'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tanggal'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_ibu_hamil" class="col-sm-5 col-form-label">Jumlah Ibu Hamil Yang Datang</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('harus1')) ? 'is-invalid' : ''; ?>" id="jml_ibu_hamil" name="jml_ibu_hamil" value="<?= old('jml_ibu_hamil'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_diperiksa" class="col-sm-5 col-form-label">Jumlah Yang Diperiksa</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('harus2')) ? 'is-invalid' : ''; ?>" id="jml_diperiksa" name="jml_diperiksa" value="<?= old('jml_diperiksa'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_fe_tab" class="col-sm-5 col-form-label">Jumlah Yang Mendapat Tablet Zat Besi</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('harus3')) ? 'is-invalid' : ''; ?>" id="jml_fe_tab" name="jml_fe_tab" value="<?= old('jml_fe_tab'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_ibu_nyusu" class="col-sm-5 col-form-label">Jumlah Ibu Menyusui Dan Mendapat Penyuluhan PP ASI</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('harus4')) ? 'is-invalid' : ''; ?>" id="jml_ibu_nyusu" name="jml_ibu_nyusu" value="<?= old('jml_ibu_nyusu'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_aseptor_kondom" class="col-sm-5 col-form-label">Jumlah Peserta KB/Akseptor Dan Mendapat Kondom</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('harus5')) ? 'is-invalid' : ''; ?>" id="jml_aseptor_kondom" name="jml_aseptor_kondom" value="<?= old('jml_aseptor_kondom'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_aseptor_pi" class="col-sm-5 col-form-label">Jumlah Peserta KB/Akseptor Dan Mendapat Pil KB</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('harus6')) ? 'is-invalid' : ''; ?>" id="jml_aseptor_pi" name="jml_aseptor_pi" value="<?= old('jml_aseptor_pi'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_aseptor_implant" class="col-sm-5 col-form-label">Jumlah Peserta KB/Akseptor Dan Mendapat Kontrasepsi Implan</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('harus7')) ? 'is-invalid' : ''; ?>" id="jml_aseptor_implant" name="jml_aseptor_implant" value="<?= old('jml_aseptor_implant'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_aseptor_mop" class="col-sm-5 col-form-label">Jumlah Peserta KB/Akseptor Dengan MOP</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('harus8')) ? 'is-invalid' : ''; ?>" id="jml_aseptor_mop" name="jml_aseptor_mop" value="<?= old('jml_aseptor_mop'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_aseptor_mow" class="col-sm-5 col-form-label">Jumlah Peserta KB/Akseptor Dengan MOW</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('harus9')) ? 'is-invalid' : ''; ?>" id="jml_aseptor_mow" name="jml_aseptor_mow" value="<?= old('jml_aseptor_mow'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_aseptor_iud" class="col-sm-5 col-form-label">Jumlah Peserta KB/Akseptor Memakai IUD</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('harus10')) ? 'is-invalid' : ''; ?>" id="jml_aseptor_iud" name="jml_aseptor_iud" value="<?= old('jml_aseptor_iud'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_aseptor_suntik" class="col-sm-5 col-form-label">Jumlah Peserta KB/Akseptor Mendapatkan Suntik</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('harus11')) ? 'is-invalid' : ''; ?>" id="jml_aseptor_suntik" name="jml_aseptor_suntik" value="<?= old('jml_aseptor_suntik'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_aseptor_lain" class="col-sm-5 col-form-label">Jumlah Peserta KB/Akseptor Memakai Kontrasepsi Lainnya</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('harus12')) ? 'is-invalid' : ''; ?>" id="jml_aseptor_lain" name="jml_aseptor_lain" value="<?= old('jml_aseptor_lain'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_balita_s_timbangL" class="col-sm-5 col-form-label">Jumlah Seluruh Balita Laki-laki (S)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('harus13')) ? 'is-invalid' : ''; ?>" id="jml_balita_s_timbangL" name="jml_balita_s_timbangL" value="<?= old('jml_balita_s_timbangL'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_balita_s_timbangP" class="col-sm-5 col-form-label">Jumlah Seluruh Balita Perempuan (S)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('harus14')) ? 'is-invalid' : ''; ?>" id="jml_balita_s_timbangP" name="jml_balita_s_timbangP" value="<?= old('jml_balita_s_timbangP'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_balita_kms_timbangL" class="col-sm-5 col-form-label">Jumlah Balita Laki-laki Memiliki KMS (K)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control <?= ($validation->hasError('harus15')) ? 'is-invalid' : ''; ?>" id="jml_balita_kms_timbangL" name="jml_balita_kms_timbangL" value="<?= old('jml_balita_kms_timbangL'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_balita_kms_timbangP" class="col-sm-5 col-form-label">Jumlah Balita Perempuan Memiliki KMS (K)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_balita_kms_timbangP" name="jml_balita_kms_timbangP" value="<?= old('jml_balita_kms_timbangP'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_balita_d_timbangL" class="col-sm-5 col-form-label">Jumlah Balita Laki-laki Yang Datang Ditimbang (D)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_balita_d_timbangL" name="jml_balita_d_timbangL" value="<?= old('jml_balita_d_timbangL'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_balita_d_timbangP" class="col-sm-5 col-form-label">Jumlah Balita Perempuan Yang Datang Ditimbang (D)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_balita_d_timbangP" name="jml_balita_d_timbangP" value="<?= old('jml_balita_d_timbangP'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_balita_naik_timbangL" class="col-sm-5 col-form-label">Jumlah Balita Laki-laki Yang Datang Ditimbang Dan Naik Beratnya (N)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_balita_naik_timbangL" name="jml_balita_naik_timbangL" value="<?= old('jml_balita_naik_timbangL'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_balita_naik_timbangP" class="col-sm-5 col-form-label">Jumlah Balita Perempuan Yang Datang Ditimbang Dan Naik Beratnya (N)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_balita_naik_timbangP" name="jml_balita_naik_timbangP" value="<?= old('jml_balita_naik_timbangP'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_balita_vita_timbangL" class="col-sm-5 col-form-label">Jumlah Balita Laki-laki Mendapat Vitamin A</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_balita_vita_timbangL" name="jml_balita_vita_timbangL" value="<?= old('jml_balita_vita_timbangL'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_balita_vita_timbangP" class="col-sm-5 col-form-label">Jumlah Balita Perempuan Mendapat Vitamin A</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_balita_vita_timbangP" name="jml_balita_vita_timbangP" value="<?= old('jml_balita_vita_timbangP'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_balita_pmt_timbangL" class="col-sm-5 col-form-label">Jumlah Balita Laki-laki Mendapat PMT</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_balita_pmt_timbangL" name="jml_balita_pmt_timbangL" value="<?= old('jml_balita_pmt_timbangL'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_balita_pmt_timbangP" class="col-sm-5 col-form-label">Jumlah Balita Perempuan Mendapat PMT</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_balita_pmt_timbangP" name="jml_balita_pmt_timbangP" value="<?= old('jml_balita_pmt_timbangP'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunisasi_ibu_I" class="col-sm-5 col-form-label">Jumlah Ibu Hamil Mendapat Imunisasi TT I</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunisasi_ibu_I" name="jml_imunisasi_ibu_I" value="<?= old('jml_imunisasi_ibu_I'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunisasi_ibu_II" class="col-sm-5 col-form-label">Jumlah Ibu Hamil Mendapat Imunisasi TT II</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunisasi_ibu_II" name="jml_imunisasi_ibu_II" value="<?= old('jml_imunisasi_ibu_II'); ?>">
            </div>
        </div>

        <input type="hidden" name="no" value="">
        <div class="form-group row">
            <label for="jml_imunbayi_bcgl" class="col-sm-5 col-form-label">Jumlah Bayi Laki-laki Mendapat Imunisasi BCG</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_bcgl" name="jml_imunbayi_bcgl" value="<?= old('jml_imunbayi_bcgl'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_bcgp" class="col-sm-5 col-form-label">Jumlah Bayi Perempuan Mendapat Imunisasi BCG</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_bcgp" name="jml_imunbayi_bcgp" value="<?= old('jml_imunbayi_bcgp'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_dpt_IL" class="col-sm-5 col-form-label">Jumlah Bayi Laki-laki Mendapat Imunisasi DPT I</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_dpt_IL" name="jml_imunbayi_dpt_IL" value="<?= old('jml_imunbayi_dpt_IL'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_dpt_IP" class="col-sm-5 col-form-label">Jumlah Bayi Perempuan Mendapat Imunisasi DPT I</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_dpt_IP" name="jml_imunbayi_dpt_IP" value="<?= old('jml_imunbayi_dpt_IP'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_dpt_IIL" class="col-sm-5 col-form-label">Jumlah Bayi Laki-laki Mendapat Imunisasi DPT II</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_dpt_IIL" name="jml_imunbayi_dpt_IIL" value="<?= old('jml_imunbayi_dpt_IIL'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_dpt_IIP" class="col-sm-5 col-form-label">Jumlah Bayi Perempuan Mendapat Imunisasi DPT II</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_dpt_IIP" name="jml_imunbayi_dpt_IIP" value="<?= old('jml_imunbayi_dpt_IIP'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_dpt_IIIL" class="col-sm-5 col-form-label">Jumlah Bayi Laki-laki Mendapat Imunisasi DPT III</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_dpt_IIIL" name="jml_imunbayi_dpt_IIIL" value="<?= old('jml_imunbayi_dpt_IIIL'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_dpt_IIIP" class="col-sm-5 col-form-label">Jumlah Bayi Perempuan Mendapat Imunisasi DPT III</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_dpt_IIIP" name="jml_imunbayi_dpt_IIIP" value="<?= old('jml_imunbayi_dpt_IIIP'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_polio_IL" class="col-sm-5 col-form-label">Jumlah Bayi Laki-laki Mendapat Imunisasi Polio I</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_polio_IL" name="jml_imunbayi_polio_IL" value="<?= old('jml_imunbayi_polio_IL'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_polio_IP" class="col-sm-5 col-form-label">Jumlah Bayi Perempuan Mendapat Imunisasi Polio I</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_polio_IP" name="jml_imunbayi_polio_IP" value="<?= old('jml_imunbayi_polio_IP'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_polio_IIL" class="col-sm-5 col-form-label">Jumlah Bayi Laki-laki Mendapat Imunisasi Polio II</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_polio_IIL" name="jml_imunbayi_polio_IIL" value="<?= old('jml_imunbayi_polio_IIL'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_polio_IIP" class="col-sm-5 col-form-label">Jumlah Bayi Perempuan Mendapat Imunisasi Polio II</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_polio_IIP" name="jml_imunbayi_polio_IIP" value="<?= old('jml_imunbayi_polio_IIP'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_polio_IIIL" class="col-sm-5 col-form-label">Jumlah Bayi Laki-laki Mendapat Imunisasi Polio III</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_polio_IIIL" name="jml_imunbayi_polio_IIIL" value="<?= old('jml_imunbayi_polio_IIIL'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_polio_IIIP" class="col-sm-5 col-form-label">Jumlah Bayi Perempuan Mendapat Imunisasi Polio III</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_polio_IIIP" name="jml_imunbayi_polio_IIIP" value="<?= old('jml_imunbayi_polio_IIIP'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_polio_IVL" class="col-sm-5 col-form-label">Jumlah Bayi Laki-laki Mendapat Imunisasi Polio IV</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_polio_IVL" name="jml_imunbayi_polio_IVL" value="<?= old('jml_imunbayi_polio_IVL'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_polio_IVP" class="col-sm-5 col-form-label">Jumlah Bayi Perempuan Mendapat Imunisasi Polio IV</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_polio_IVP" name="jml_imunbayi_polio_IVP" value="<?= old('jml_imunbayi_polio_IVP'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_campakL" class="col-sm-5 col-form-label">Jumlah Bayi Laki-laki Usia 9 Bulan Mendapat Imunisasi Campak</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_campakL" name="jml_imunbayi_campakL" value="<?= old('jml_imunbayi_campakL'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_campakP" class="col-sm-5 col-form-label">Jumlah Bayi Perempuan Usia 9 Bulan Mendapat Imunisasi Campak</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_campakP" name="jml_imunbayi_campakP" value="<?= old('jml_imunbayi_campakP'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_hepat_IL" class="col-sm-5 col-form-label">Jumlah Bayi Laki-laki Mendapat Imunisasi Hepatiti B I</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_hepat_IL" name="jml_imunbayi_hepat_IL" value="<?= old('jml_imunbayi_hepat_IL'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_hepat_IP" class="col-sm-5 col-form-label">Jumlah Bayi Perempuan Mendapat Imunisasi Hepatiti B I</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_hepat_IP" name="jml_imunbayi_hepat_IP" value="<?= old('jml_imunbayi_hepat_IP'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_hepat_IIL" class="col-sm-5 col-form-label">Jumlah Bayi Laki-laki Mendapat Imunisasi Hepatiti B II</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_hepat_IIL" name="jml_imunbayi_hepat_IIL" value="<?= old('jml_imunbayi_hepat_IIL'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_hepat_IIP" class="col-sm-5 col-form-label">Jumlah Bayi Perempuan Mendapat Imunisasi Hepatiti B II</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_hepat_IIP" name="jml_imunbayi_hepat_IIP" value="<?= old('jml_imunbayi_hepat_IIP'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_hepat_IIIL" class="col-sm-5 col-form-label">Jumlah Bayi Laki-laki Mendapat Imunisasi Hepatiti B III</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_hepat_IIIL" name="jml_imunbayi_hepat_IIIL" value="<?= old('jml_imunbayi_hepat_IIIL'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_hepat_IIIP" class="col-sm-5 col-form-label">Jumlah Bayi Perempuan Mendapat Imunisasi Hepatiti B III</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_hepat_IIIP" name="jml_imunbayi_hepat_IIIP" value="<?= old('jml_imunbayi_hepat_IIIP'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_bltdiare_jmL" class="col-sm-5 col-form-label">Jumlah Balita Laki-laki Menderita Diare</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_bltdiare_jmL" name="jml_bltdiare_jmL" value="<?= old('jml_bltdiare_jmL'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_bltdiare_jmP" class="col-sm-5 col-form-label">Jumlah Balita Perempuan Menderita Diare</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_bltdiare_jmP" name="jml_bltdiare_jmP" value="<?= old('jml_bltdiare_jmP'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_bltdiare_oralitL" class="col-sm-5 col-form-label">Jumlah Balita Laki-laki Menderita Diare Dan Mendapatkan Oralit</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_bltdiare_oralitL" name="jml_bltdiare_oralitL" value="<?= old('jml_bltdiare_oralitL'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_bltdiare_oralitP" class="col-sm-5 col-form-label">Jumlah Balita Perempuan Menderita Diare Dan Mendapatkan Oralit</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_bltdiare_oralitP" name="jml_bltdiare_oralitP" value="<?= old('jml_bltdiare_oralitP'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="Keterangan" class="col-sm-5 col-form-label">Keterangan</label>
            <div class="col-sm-7">
                <textarea type="text" class="form-control" id="Keterangan" name="Keterangan" value=""><?= old('Keterangan'); ?></textarea>
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