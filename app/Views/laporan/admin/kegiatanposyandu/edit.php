<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Form Ubah Data Pengunjung Posyandu</h5>
    <form action="/KegiatanposyanduCon/update/<?= $kegiatanA['no']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="no" value="<?= $kegiatanA['no']; ?>">
        <input type="hidden" name="kd_posyandu" value="<?= $kegiatanA['kd_posyandu']; ?>">
        <div class="form-group row">
            <label for="tanggal" class="col-sm-5 col-form-label">Tanggal Pelayanan</label>
            <div class="col-sm-3">
                <input type="date" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" id="tanggal" name="tanggal" autofocus value="<?= (old('tanggal')) ? old('tanggal') : $kegiatanA['tanggal']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tanggal'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_ibu_hamil" class="col-sm-5 col-form-label">Jumlah Ibu Hamil Yang Datang</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_ibu_hamil" name="jml_ibu_hamil" value="<?= (old('jml_ibu_hamil')) ? old('jml_ibu_hamil') : $kegiatanA['jml_ibu_hamil']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_diperiksa" class="col-sm-5 col-form-label">Jumlah Yang Diperiksa</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_diperiksa" name="jml_diperiksa" value="<?= (old('jml_diperiksa')) ? old('jml_diperiksa') : $kegiatanA['jml_diperiksa']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_fe_tab" class="col-sm-5 col-form-label">Jumlah Yang Mendapat Tablet Zat Besi</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_fe_tab" name="jml_fe_tab" value="<?= (old('jml_fe_tab')) ? old('jml_fe_tab') : $kegiatanA['jml_fe_tab']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_ibu_nyusu" class="col-sm-5 col-form-label">Jumlah Ibu Menyusui<br>Dan Mendapat Penyuluhan PP ASI</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_ibu_nyusu" name="jml_ibu_nyusu" value="<?= (old('jml_ibu_nyusu')) ? old('jml_ibu_nyusu') : $kegiatanA['jml_ibu_nyusu']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_aseptor_kondom" class="col-sm-5 col-form-label">Jumlah Peserta KB/Akseptor<br>Dan Mendapat Kondom</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_aseptor_kondom" name="jml_aseptor_kondom" value="<?= (old('jml_aseptor_kondom')) ? old('jml_aseptor_kondom') : $kegiatanA['jml_aseptor_kondom']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_aseptor_pi" class="col-sm-5 col-form-label">Jumlah Peserta KB/Akseptor<br>Dan Mendapat Pil KB</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_aseptor_pi" name="jml_aseptor_pi" value="<?= (old('jml_aseptor_pi')) ? old('jml_aseptor_pi') : $kegiatanA['jml_aseptor_pi']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_aseptor_implant" class="col-sm-5 col-form-label">Jumlah Peserta KB/Akseptor<br>Dan Mendapat Kontrasepsi Implan</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_aseptor_implant" name="jml_aseptor_implant" value="<?= (old('jml_aseptor_implant')) ? old('jml_aseptor_implant') : $kegiatanA['jml_aseptor_implant']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_aseptor_mop" class="col-sm-5 col-form-label">Jumlah Peserta KB/Akseptor<br>Dengan MOP</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_aseptor_mop" name="jml_aseptor_mop" value="<?= (old('jml_aseptor_mop')) ? old('jml_aseptor_mop') : $kegiatanA['jml_aseptor_mop']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_aseptor_mow" class="col-sm-5 col-form-label">Jumlah Peserta KB/Akseptor<br>Dengan MOW</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_aseptor_mow" name="jml_aseptor_mow" value="<?= (old('jml_aseptor_mow')) ? old('jml_aseptor_mow') : $kegiatanA['jml_aseptor_mow']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_aseptor_iud" class="col-sm-5 col-form-label">Jumlah Peserta KB/Akseptor<br>Memakai IUD</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_aseptor_iud" name="jml_aseptor_iud" value="<?= (old('jml_aseptor_iud')) ? old('jml_aseptor_iud') : $kegiatanA['jml_aseptor_iud']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_aseptor_suntik" class="col-sm-5 col-form-label">Jumlah Peserta KB/Akseptor<br>Mendapatkan Suntik</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_aseptor_suntik" name="jml_aseptor_suntik" value="<?= (old('jml_aseptor_suntik')) ? old('jml_aseptor_suntik') : $kegiatanA['jml_aseptor_suntik']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_aseptor_lain" class="col-sm-5 col-form-label">Jumlah Peserta KB/Akseptor<br>Memakai Kontrasepsi Lainnya</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_aseptor_lain" name="jml_aseptor_lain" value="<?= (old('jml_aseptor_lain')) ? old('jml_aseptor_lain') : $kegiatanA['jml_aseptor_lain']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_balita_s_timbangL" class="col-sm-5 col-form-label">Jumlah Seluruh Balita Laki-laki (S)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_balita_s_timbangL" name="jml_balita_s_timbangL" value="<?= (old('jml_balita_s_timbangL')) ? old('jml_balita_s_timbangL') : $kegiatanA['jml_balita_s_timbangL']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_balita_s_timbangP" class="col-sm-5 col-form-label">Jumlah Seluruh Balita Perempuan (S)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_balita_s_timbangP" name="jml_balita_s_timbangP" value="<?= (old('jml_balita_s_timbangP')) ? old('jml_balita_s_timbangP') : $kegiatanA['jml_balita_s_timbangP']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_balita_kms_timbangL" class="col-sm-5 col-form-label">Jumlah Balita Laki-laki<br>Memiliki KMS (K)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_balita_kms_timbangL" name="jml_balita_kms_timbangL" value="<?= (old('jml_balita_kms_timbangL')) ? old('jml_balita_kms_timbangL') : $kegiatanA['jml_balita_kms_timbangL']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_balita_kms_timbangP" class="col-sm-5 col-form-label">Jumlah Balita Perempuan<br>Memiliki KMS (K)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_balita_kms_timbangP" name="jml_balita_kms_timbangP" value="<?= (old('jml_balita_kms_timbangP')) ? old('jml_balita_kms_timbangP') : $kegiatanA['jml_balita_kms_timbangP']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_balita_d_timbangL" class="col-sm-5 col-form-label">Jumlah Balita Laki-laki<br>Yang Datang Ditimbang (D)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_balita_d_timbangL" name="jml_balita_d_timbangL" value="<?= (old('jml_balita_d_timbangL')) ? old('jml_balita_d_timbangL') : $kegiatanA['jml_balita_d_timbangL']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_balita_d_timbangP" class="col-sm-5 col-form-label">Jumlah Balita Perempuan<br>Yang Datang Ditimbang (D)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_balita_d_timbangP" name="jml_balita_d_timbangP" value="<?= (old('jml_balita_d_timbangP')) ? old('jml_balita_d_timbangP') : $kegiatanA['jml_balita_d_timbangP']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_balita_naik_timbangL" class="col-sm-5 col-form-label">Jumlah Balita Laki-laki<br>Yang Datang Ditimbang Dan Naik Beratnya (N)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_balita_naik_timbangL" name="jml_balita_naik_timbangL" value="<?= (old('jml_balita_naik_timbangL')) ? old('jml_balita_naik_timbangL') : $kegiatanA['jml_balita_naik_timbangL']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_balita_naik_timbangP" class="col-sm-5 col-form-label">Jumlah Balita Perempuan<br>Yang Datang Ditimbang Dan Naik Beratnya (N)</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_balita_naik_timbangP" name="jml_balita_naik_timbangP" value="<?= (old('jml_balita_naik_timbangP')) ? old('jml_balita_naik_timbangP') : $kegiatanA['jml_balita_naik_timbangP']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_balita_vita_timbangL" class="col-sm-5 col-form-label">Jumlah Balita Laki-laki<br>Mendapat Vitamin A</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_balita_vita_timbangL" name="jml_balita_vita_timbangL" value="<?= (old('jml_balita_vita_timbangL')) ? old('jml_balita_vita_timbangL') : $kegiatanA['jml_balita_vita_timbangL']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_balita_vita_timbangP" class="col-sm-5 col-form-label">Jumlah Balita Perempuan<br>Mendapat Vitamin A</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_balita_vita_timbangP" name="jml_balita_vita_timbangP" value="<?= (old('jml_balita_vita_timbangP')) ? old('jml_balita_vita_timbangP') : $kegiatanA['jml_balita_vita_timbangP']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_balita_pmt_timbangL" class="col-sm-5 col-form-label">Jumlah Balita Laki-laki<br>Mendapat PMT</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_balita_pmt_timbangL" name="jml_balita_pmt_timbangL" value="<?= (old('jml_balita_pmt_timbangL')) ? old('jml_balita_pmt_timbangL') : $kegiatanA['jml_balita_pmt_timbangL']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_balita_pmt_timbangP" class="col-sm-5 col-form-label">Jumlah Balita Perempuan<br>Mendapat PMT</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_balita_pmt_timbangP" name="jml_balita_pmt_timbangP" value="<?= (old('jml_balita_pmt_timbangP')) ? old('jml_balita_pmt_timbangP') : $kegiatanA['jml_balita_pmt_timbangP']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunisasi_ibu_I" class="col-sm-5 col-form-label">Jumlah Ibu Hamil<br>Mendapat Imunisasi TT I</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunisasi_ibu_I" name="jml_imunisasi_ibu_I" value="<?= (old('jml_imunisasi_ibu_I')) ? old('jml_imunisasi_ibu_I') : $kegiatanA['jml_imunisasi_ibu_I']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunisasi_ibu_II" class="col-sm-5 col-form-label">Jumlah Ibu Hamil<br>Mendapat Imunisasi TT II</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunisasi_ibu_II" name="jml_imunisasi_ibu_II" value="<?= (old('jml_imunisasi_ibu_II')) ? old('jml_imunisasi_ibu_II') : $kegiatanA['jml_imunisasi_ibu_II']; ?>">
            </div>
        </div>

        <input type="hidden" name="no" value="<?= $kegiatanB['no_keg']; ?>">
        <input type="hidden" name="no" value="<?= $kegiatanB['no']; ?>">
        <div class="form-group row">
            <label for="jml_imunbayi_bcgl" class="col-sm-5 col-form-label">Jumlah Bayi Laki-laki<br>Mendapat Imunisasi BCG</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_bcgl" name="jml_imunbayi_bcgl" value="<?= (old('jml_imunbayi_bcgl')) ? old('jml_imunbayi_bcgl') : $kegiatanB['jml_imunbayi_bcgl']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_bcgp" class="col-sm-5 col-form-label">Jumlah Bayi Perempuan<br>Mendapat Imunisasi BCG</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_bcgp" name="jml_imunbayi_bcgp" value="<?= (old('jml_imunbayi_bcgp')) ? old('jml_imunbayi_bcgp') : $kegiatanB['jml_imunbayi_bcgp']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_dpt_IL" class="col-sm-5 col-form-label">Jumlah Bayi Laki-laki<br>Mendapat Imunisasi DPT I</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_dpt_IL" name="jml_imunbayi_dpt_IL" value="<?= (old('jml_imunbayi_dpt_IL')) ? old('jml_imunbayi_dpt_IL') : $kegiatanB['jml_imunbayi_dpt_IL']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_dpt_IP" class="col-sm-5 col-form-label">Jumlah Bayi Perempuan<br>Mendapat Imunisasi DPT I</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_dpt_IP" name="jml_imunbayi_dpt_IP" value="<?= (old('jml_imunbayi_dpt_IP')) ? old('jml_imunbayi_dpt_IP') : $kegiatanB['jml_imunbayi_dpt_IP']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_dpt_IIL" class="col-sm-5 col-form-label">Jumlah Bayi Laki-laki<br>Mendapat Imunisasi DPT II</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_dpt_IIL" name="jml_imunbayi_dpt_IIL" value="<?= (old('jml_imunbayi_dpt_IIL')) ? old('jml_imunbayi_dpt_IIL') : $kegiatanB['jml_imunbayi_dpt_IIL']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_dpt_IIP" class="col-sm-5 col-form-label">Jumlah Bayi Perempuan<br>Mendapat Imunisasi DPT II</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_dpt_IIP" name="jml_imunbayi_dpt_IIP" value="<?= (old('jml_imunbayi_dpt_IIP')) ? old('jml_imunbayi_dpt_IIP') : $kegiatanB['jml_imunbayi_dpt_IIP']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_dpt_IIIL" class="col-sm-5 col-form-label">Jumlah Bayi Laki-laki<br>Mendapat Imunisasi DPT III</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_dpt_IIIL" name="jml_imunbayi_dpt_IIIL" value="<?= (old('jml_imunbayi_dpt_IIIL')) ? old('jml_imunbayi_dpt_IIIL') : $kegiatanB['jml_imunbayi_dpt_IIIL']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_dpt_IIIP" class="col-sm-5 col-form-label">Jumlah Bayi Perempuan<br>Mendapat Imunisasi DPT III</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_dpt_IIIP" name="jml_imunbayi_dpt_IIIP" value="<?= (old('jml_imunbayi_dpt_IIIP')) ? old('jml_imunbayi_dpt_IIIP') : $kegiatanB['jml_imunbayi_dpt_IIIP']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_polio_IL" class="col-sm-5 col-form-label">Jumlah Bayi Laki-laki<br>Mendapat Imunisasi Polio I</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_polio_IL" name="jml_imunbayi_polio_IL" value="<?= (old('jml_imunbayi_polio_IL')) ? old('jml_imunbayi_polio_IL') : $kegiatanB['jml_imunbayi_polio_IL']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_polio_IP" class="col-sm-5 col-form-label">Jumlah Bayi Perempuan<br>Mendapat Imunisasi Polio I</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_polio_IP" name="jml_imunbayi_polio_IP" value="<?= (old('jml_imunbayi_polio_IP')) ? old('jml_imunbayi_polio_IP') : $kegiatanB['jml_imunbayi_polio_IP']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_polio_IIL" class="col-sm-5 col-form-label">Jumlah Bayi Laki-laki<br>Mendapat Imunisasi Polio II</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_polio_IIL" name="jml_imunbayi_polio_IIL" value="<?= (old('jml_imunbayi_polio_IIL')) ? old('jml_imunbayi_polio_IIL') : $kegiatanB['jml_imunbayi_polio_IIL']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_polio_IIP" class="col-sm-5 col-form-label">Jumlah Bayi Perempuan<br>Mendapat Imunisasi Polio II</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_polio_IIP" name="jml_imunbayi_polio_IIP" value="<?= (old('jml_imunbayi_polio_IIP')) ? old('jml_imunbayi_polio_IIP') : $kegiatanB['jml_imunbayi_polio_IIP']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_polio_IIIL" class="col-sm-5 col-form-label">Jumlah Bayi Laki-laki<br>Mendapat Imunisasi Polio III</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_polio_IIIL" name="jml_imunbayi_polio_IIIL" value="<?= (old('jml_imunbayi_polio_IIIL')) ? old('jml_imunbayi_polio_IIIL') : $kegiatanB['jml_imunbayi_polio_IIIL']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_polio_IIIP" class="col-sm-5 col-form-label">Jumlah Bayi Perempuan<br>Mendapat Imunisasi Polio III</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_polio_IIIP" name="jml_imunbayi_polio_IIIP" value="<?= (old('jml_imunbayi_polio_IIIP')) ? old('jml_imunbayi_polio_IIIP') : $kegiatanB['jml_imunbayi_polio_IIIP']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_polio_IVL" class="col-sm-5 col-form-label">Jumlah Bayi Laki-laki<br>Mendapat Imunisasi Polio IV</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_polio_IVL" name="jml_imunbayi_polio_IVL" value="<?= (old('jml_imunbayi_polio_IVL')) ? old('jml_imunbayi_polio_IVL') : $kegiatanB['jml_imunbayi_polio_IVL']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_polio_IVP" class="col-sm-5 col-form-label">Jumlah Bayi Perempuan<br>Mendapat Imunisasi Polio IV</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_polio_IVP" name="jml_imunbayi_polio_IVP" value="<?= (old('jml_imunbayi_polio_IVP')) ? old('jml_imunbayi_polio_IVP') : $kegiatanB['jml_imunbayi_polio_IVP']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_campakL" class="col-sm-5 col-form-label">Jumlah Bayi Laki-laki<br>Usia 9 Bulan<br>Mendapat Imunisasi Campak</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_campakL" name="jml_imunbayi_campakL" value="<?= (old('jml_imunbayi_campakL')) ? old('jml_imunbayi_campakL') : $kegiatanB['jml_imunbayi_campakL']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_campakP" class="col-sm-5 col-form-label">Jumlah Bayi Perempuan<br>Usia 9 Bulan<br>Mendapat Imunisasi Campak</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_campakP" name="jml_imunbayi_campakP" value="<?= (old('jml_imunbayi_campakP')) ? old('jml_imunbayi_campakP') : $kegiatanB['jml_imunbayi_campakP']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_hepat_IL" class="col-sm-5 col-form-label">Jumlah Bayi Laki-laki<br>Mendapat Imunisasi Hepatiti B I</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_hepat_IL" name="jml_imunbayi_hepat_IL" value="<?= (old('jml_imunbayi_hepat_IL')) ? old('jml_imunbayi_hepat_IL') : $kegiatanB['jml_imunbayi_hepat_IL']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_hepat_IP" class="col-sm-5 col-form-label">Jumlah Bayi Perempuan<br>Mendapat Imunisasi Hepatiti B I</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_hepat_IP" name="jml_imunbayi_hepat_IP" value="<?= (old('jml_imunbayi_hepat_IP')) ? old('jml_imunbayi_hepat_IP') : $kegiatanB['jml_imunbayi_hepat_IP']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_hepat_IIL" class="col-sm-5 col-form-label">Jumlah Bayi Laki-laki<br>Mendapat Imunisasi Hepatiti B II</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_hepat_IIL" name="jml_imunbayi_hepat_IIL" value="<?= (old('jml_imunbayi_hepat_IIL')) ? old('jml_imunbayi_hepat_IIL') : $kegiatanB['jml_imunbayi_hepat_IIL']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_hepat_IIP" class="col-sm-5 col-form-label">Jumlah Bayi Perempuan<br>Mendapat Imunisasi Hepatiti B II</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_hepat_IIP" name="jml_imunbayi_hepat_IIP" value="<?= (old('jml_imunbayi_hepat_IIP')) ? old('jml_imunbayi_hepat_IIP') : $kegiatanB['jml_imunbayi_hepat_IIP']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_hepat_IIIL" class="col-sm-5 col-form-label">Jumlah Bayi Laki-laki<br>Mendapat Imunisasi Hepatiti B III</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_hepat_IIIL" name="jml_imunbayi_hepat_IIIL" value="<?= (old('jml_imunbayi_hepat_IIIL')) ? old('jml_imunbayi_hepat_IIIL') : $kegiatanB['jml_imunbayi_hepat_IIIL']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_imunbayi_hepat_IIIP" class="col-sm-5 col-form-label">Jumlah Bayi Perempuan<br>Mendapat Imunisasi Hepatiti B III</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_imunbayi_hepat_IIIP" name="jml_imunbayi_hepat_IIIP" value="<?= (old('jml_imunbayi_hepat_IIIP')) ? old('jml_imunbayi_hepat_IIIP') : $kegiatanB['jml_imunbayi_hepat_IIIP']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_bltdiare_jmL" class="col-sm-5 col-form-label">Jumlah Balita Laki-laki<br>Menderita Diare</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_bltdiare_jmL" name="jml_bltdiare_jmL" value="<?= (old('jml_bltdiare_jmL')) ? old('jml_bltdiare_jmL') : $kegiatanB['jml_bltdiare_jmL']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_bltdiare_jmP" class="col-sm-5 col-form-label">Jumlah Balita Perempuan<br>Menderita Diare</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_bltdiare_jmP" name="jml_bltdiare_jmP" value="<?= (old('jml_bltdiare_jmP')) ? old('jml_bltdiare_jmP') : $kegiatanB['jml_bltdiare_jmP']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_bltdiare_oralitL" class="col-sm-5 col-form-label">Jumlah Balita Laki-laki<br>Menderita Diare Dan<br>Mendapatkan Oralit</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_bltdiare_oralitL" name="jml_bltdiare_oralitL" value="<?= (old('jml_bltdiare_oralitL')) ? old('jml_bltdiare_oralitL') : $kegiatanB['jml_bltdiare_oralitL']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="jml_bltdiare_oralitP" class="col-sm-5 col-form-label">Jumlah Balita Perempuan<br>Menderita Diare Dan<br>Mendapatkan Oralit</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_bltdiare_oralitP" name="jml_bltdiare_oralitP" value="<?= (old('jml_bltdiare_oralitP')) ? old('jml_bltdiare_oralitP') : $kegiatanB['jml_bltdiare_oralitP']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="Keterangan" class="col-sm-5 col-form-label">Keterangan</label>
            <div class="col-sm-6">
                <textarea type="text" class="form-control" id="Keterangan" name="Keterangan" value=""><?= (old('Keterangan')) ? old('Keterangan') : $kegiatanB['Keterangan']; ?></textarea>
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