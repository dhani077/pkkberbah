<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5>
        <center>Kegiatan Posyandu</center>
    </h5>
    <div class="table-responsive">
        <table>
            <tr>
                <th>Nama Posyandu</th>
                <th></th>
                <th> : </th>
                <th><?= $posyandu['nama_posyandu']; ?></th>
            </tr>
            <tr>
                <th>Desa/Keluarhan</th>
                <th></th>
                <th> : </th>
                <th><?= $wilayah['kelurahan']; ?></th>
            </tr>
            <tr>
                <th>Kecamatan</th>
                <th></th>
                <th> : </th>
                <th><?= $wilayah['kecamatan']; ?></th>
            </tr>
            <tr>
                <th>Tahun</th>
                <th></th>
                <th> : </th>
                <th><?= $tahun; ?></th>
            </tr>
        </table>
    </div>

    <div class="row">
        <div class="col">
            <a href="/kegiatanposyandu/create/<?= $kdPosyandu; ?>" class="btn btn-primary">Tambah Data Kegiatan Posyandu</a>
        </div>
    </div>

    <?php if (session()->getFlashdata('hapus')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashData('hapus'); ?>
        </div>
    <?php endif; ?>
    <div class="table-responsive pt-3">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col" rowspan="4">NO.</th>
                    <th scope="col" rowspan="4">BULAN</th>
                    <th scope="col" rowspan="4">JML.<br>IBU<br>HAMIL</th>
                    <th scope="col" rowspan="4">DIPERIKSA</th>
                    <th scope="col" rowspan="4">FE TAB<br>(TABLET<br>BESI)</th>
                    <th scope="col" rowspan="4">JML.<br>IBU<br>MENYUSUI</th>
                    <th scope="col" colspan="8">JUMLAH ASEPTOR KB</th>
                    <th scope="col" colspan="12">PENIMBANGAN BALITA</th>
                    <th scope="col" colspan="2">IMUNISASI TT</th>
                    <th scope="col" colspan="24">JUMLAH BAYI<br>YANG DIIMIUNISASI</th>
                    <th scope="col" colspan="4">BALITA YANG<br> MENDERITA DIARE</th>
                    <th scope="col" rowspan="4">KETERANGAN</th>
                    <th scope="col" rowspan="4">AKSI</th>
                </tr>
                <tr>
                    <th scope="col" rowspan="3">K<br>O<br>N<br>D<br>O<br>M</th>
                    <th scope="col" rowspan="3">PIL</th>
                    <th scope="col" rowspan="3">IMPLANT</th>
                    <th scope="col" rowspan="3">M<br>O<br>P</th>
                    <th scope="col" rowspan="3">M<br>O<br>W</th>
                    <th scope="col" rowspan="3">I<br>U<br>D</th>
                    <th scope="col" rowspan="3">SUNTIK</th>
                    <th scope="col" rowspan="3">LAIN-LAIN</th>
                    <th scope="col" rowspan="2" colspan="2">JML.<br>BALITA<br>(S)</th>
                    <th scope="col" rowspan="2" colspan="2">JML.<br>BALITA<br>YANG <br>MEMILIKI<br>KMS(K)</th>
                    <th scope="col" rowspan="2" colspan="2">JML.<br>YANG<br>DITIMBANG(D)</th>
                    <th scope="col" rowspan="2" colspan="2">JML.<br>YANG<br>NAIK(N)</th>
                    <th scope="col" rowspan="2" colspan="2">JML.<br>YANG<br>MENDAPAT<br> VIT. A</th>
                    <th scope="col" rowspan="2" colspan="2">JML.<br>YANG<br>MENDAPAT<br>PMT</th>
                    <th scope="col" colspan="2">IBU<br>HAMIL</th>
                    <th scope="col" rowspan="2" colspan="2">BCG</th>
                    <th scope="col" colspan="6">DPT</th>
                    <th scope="col" colspan="8">POLIO</th>
                    <th scope="col" rowspan="2" colspan="2">CAMPAK</th>
                    <th scope="col" colspan="6">HEPATITIS B</th>
                    <th scope="col" rowspan="2" colspan="2">JUMLAH</th>
                    <th scope="col" rowspan="2" colspan="2">YANG<br>MENDAPAT<br>ORALIT</th>
                </tr>
                <tr>
                    <th scope="col" rowspan="2">I</th>
                    <th scope="col" rowspan="2">II</th>
                    <th scope="col" colspan="2">I</th>
                    <th scope="col" colspan="2">II</th>
                    <th scope="col" colspan="2">III</th>
                    <th scope="col" colspan="2">I</th>
                    <th scope="col" colspan="2">II</th>
                    <th scope="col" colspan="2">III</th>
                    <th scope="col" colspan="2">IV</th>
                    <th scope="col" colspan="2">I</th>
                    <th scope="col" colspan="2">II</th>
                    <th scope="col" colspan="2">III</th>
                </tr>
                <tr>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php
                $j = 0;
                $k = 0;
                while ($j < $hitung) {
                    while ($k < $hitung) {
                ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $kegiatanA[$j]['bulan']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_ibu_hamil']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_diperiksa']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_fe_tab']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_ibu_nyusu']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_aseptor_kondom']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_aseptor_pi']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_aseptor_implant']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_aseptor_mop']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_aseptor_mow']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_aseptor_iud']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_aseptor_suntik']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_aseptor_lain']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_balita_s_timbangL']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_balita_s_timbangP']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_balita_kms_timbangL']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_balita_kms_timbangP']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_balita_d_timbangL']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_balita_d_timbangP']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_balita_naik_timbangL']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_balita_naik_timbangP']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_balita_vita_timbangL']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_balita_vita_timbangP']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_balita_pmt_timbangL']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_balita_pmt_timbangP']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_imunisasi_ibu_I']; ?></td>
                            <td><?= $kegiatanA[$j]['jml_imunisasi_ibu_II']; ?></td>

                            <td><?= $kegiatanB[$k]['jml_imunbayi_bcgl']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_bcgp']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_dpt_IL']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_dpt_IP']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_dpt_IIL']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_dpt_IIP']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_dpt_IIIL']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_dpt_IIIP']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_polio_IL']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_polio_IP']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_polio_IIL']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_polio_IIP']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_polio_IIIL']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_polio_IIIP']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_polio_IVL']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_polio_IVP']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_campakL']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_campakP']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_hepat_IL']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_hepat_IP']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_hepat_IIL']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_hepat_IIP']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_hepat_IIIL']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_imunbayi_hepat_IIIP']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_bltdiare_jmL']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_bltdiare_jmP']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_bltdiare_oralitL']; ?></td>
                            <td><?= $kegiatanB[$k]['jml_bltdiare_oralitP']; ?></td>
                            <td><?= $kegiatanB[$k]['Keterangan']; ?></td>
                            <td>
                                <a href="/kegiatanposyandu/edit/<?= $kegiatanA[$j]['no']; ?>" class="btn btn-warning">Edit</a>
                                <form action="/kegiatanposyandu/<?= $no; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                <?php
                        $k++;
                        $j++;
                    }
                } ?>
                <tr>
                    <th colspan="2">Jumlah</th>
                    <?php foreach ($totalA as $ta) : ?>
                        <td><?= $ta['totalibuhamil']; ?></td>
                        <td><?= $ta['totaldpriksa']; ?></td>
                        <td><?= $ta['totalfetab']; ?></td>
                        <td><?= $ta['totalibunyusu']; ?></td>
                        <td><?= $ta['totalkondom']; ?></td>
                        <td><?= $ta['totalpi']; ?></td>
                        <td><?= $ta['totalimplant']; ?></td>
                        <td><?= $ta['totalmop']; ?></td>
                        <td><?= $ta['totalmow']; ?></td>
                        <td><?= $ta['totaliud']; ?></td>
                        <td><?= $ta['totalsuntik']; ?></td>
                        <td><?= $ta['totallain']; ?></td>
                        <td><?= $ta['totalbltsL']; ?></td>
                        <td><?= $ta['totalbltsP']; ?></td>
                        <td><?= $ta['totalbltkmsL']; ?></td>
                        <td><?= $ta['totalbltkmsP']; ?></td>
                        <td><?= $ta['totalbltdL']; ?></td>
                        <td><?= $ta['totalbltdP']; ?></td>
                        <td><?= $ta['totalbltNaikL']; ?></td>
                        <td><?= $ta['totalbltNaikP']; ?></td>
                        <td><?= $ta['totalbltvitaL']; ?></td>
                        <td><?= $ta['totalbltvitaP']; ?></td>
                        <td><?= $ta['totalbltpmtL']; ?></td>
                        <td><?= $ta['totalbltpmtP']; ?></td>
                        <td><?= $ta['totalibuI']; ?></td>
                        <td><?= $ta['totalibuII']; ?></td>
                    <?php endforeach; ?>
                    <?php foreach ($totalB as $tb) : ?>
                        <td><?= $tb['totalbcgL']; ?></td>
                        <td><?= $tb['totalbcgP']; ?></td>
                        <td><?= $tb['totaldptIL']; ?></td>
                        <td><?= $tb['totaldptIP']; ?></td>
                        <td><?= $tb['totaldptIIL']; ?></td>
                        <td><?= $tb['totaldptIIP']; ?></td>
                        <td><?= $tb['totaldptIIIL']; ?></td>
                        <td><?= $tb['totaldptIIIP']; ?></td>
                        <td><?= $tb['totalpolioIL']; ?></td>
                        <td><?= $tb['totalpolioIP']; ?></td>
                        <td><?= $tb['totalpolioIIL']; ?></td>
                        <td><?= $tb['totalpolioIIP']; ?></td>
                        <td><?= $tb['totalpolioIIIL']; ?></td>
                        <td><?= $tb['totalpolioIIIP']; ?></td>
                        <td><?= $tb['totalpolioIVL']; ?></td>
                        <td><?= $tb['totalpolioIVP']; ?></td>
                        <td><?= $tb['totalcampakL']; ?></td>
                        <td><?= $tb['totalcampakP']; ?></td>
                        <td><?= $tb['totalhepatIL']; ?></td>
                        <td><?= $tb['totalhepatIP']; ?></td>
                        <td><?= $tb['totalhepatIIL']; ?></td>
                        <td><?= $tb['totalhepatIIP']; ?></td>
                        <td><?= $tb['totalhepatIIIL']; ?></td>
                        <td><?= $tb['totalhepatIIIP']; ?></td>
                        <td><?= $tb['totaldiareL']; ?></td>
                        <td><?= $tb['totaldiareP']; ?></td>
                        <td><?= $tb['totaloralitL']; ?></td>
                        <td><?= $tb['totaloralitP']; ?></td>
                    <?php endforeach ?>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <br><br>
    <?php if ($tahun) { ?>
        <a href="/kegiatanposyandu/tahun/<?= $posyandu['kd_posyandu']; ?>" class="btn btn-outline-danger">Kembali daftar tahun kegiatan posyandu <?= $posyandu['nama_posyandu']; ?></a>
    <?php } ?>
    <?php if (empty($tahun)) { ?>
        <a href="/posyandu/pengunjunglayanan/<?= $posyandu['kd_posyandu']; ?>" class="btn btn-outline-danger">Kembali detail posyandu <?= $posyandu['nama_posyandu']; ?></a>
    <?php } ?>
</div>
<?= $this->endsection(); ?>