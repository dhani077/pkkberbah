<?= $this->extend('layout/users/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <center>
        <h5>Data Kegiatan PKK</h5>
        <P><b>TP. PKK : Kecamatan Berbah<br>Tahun : <?= $tahun; ?></b></P>
    </center>
    <p><b>POKJA IV</b></p>
    <div class="table-responsive pt-2">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col" rowspan="4">NO.</th>
                    <th scope="col" rowspan="4">NAMA<br>WILAYAH<br>(Dusun/Ling<br>/Desa/Kel<br>/Kec/Kab<br>/Kota/Prov)</th>
                    <th scope="col" colspan="6">JUMLAH KADER</th>
                    <th scope="col" colspan="5">KESEHATAN</th>
                    <th scope="col" colspan="7">KELESTARIAN LINGKUNGAN HIDUP</th>
                    <th scope="col" colspan="5">PERENCANAAN SEHAT</th>
                    <th scope="col" rowspan="4">KETERANGAN</th>
                </tr>
                <tr>
                    <th scope="col" rowspan="3">POSYANDU</th>
                    <th scope="col" rowspan="3">GIZI</th>
                    <th scope="col" rowspan="3">KESLING</th>
                    <th scope="col" rowspan="3">PENYULUHAN<br>NARKOBA</th>
                    <th scope="col" rowspan="3">PHBS</th>
                    <th scope="col" rowspan="3">KB</th>
                    <th scope="col" colspan="5">POSYANDU</th>
                    <th scope="col" colspan="3" rowspan="2">JUMLAH RUMAH<br>YANG MEMILIKI</th>
                    <th scope="col" rowspan="3">JUMLAH MCK</th>
                    <th scope="col" rowspan="2" colspan="3">JUMLAH KRT YANG <br>MENGGUNAKAN AIR</th>
                    <th scope="col" rowspan="3">JUMLAH PUS</th>
                    <th scope="col" rowspan="3">JUMLAH WUS</th>
                    <th scope="col" rowspan="2" colspan="2">JUMLAH AKSEPTOR KB</th>
                    <th scope="col" rowspan="3">JUMLAH KK<br>YG MEMILIKI<br>TABUNGAN KELUARGA</th>
                </tr>
                <tr>
                    <th scope="col" rowspan="2">JUMLAH</th>
                    <th scope="col" rowspan="2">TERINTEGRASI</th>
                    <th scope="col" colspan="3">LANSIA</th>
                </tr>
                <tr>
                    <th scope="col">JUMLAH<br>KELOMPOK</th>
                    <th scope="col">JUMLAH<br>ANGGOTA</th>
                    <th scope="col">JUMLAH YANG<br>MEMILIKI <br>BEROBAT<br>GRATIS</th>
                    <th scope="col">JAMBAN</th>
                    <th scope="col">SPAL</th>
                    <th scope="col">TEMPAT PEMBUANGAN<br>SAMPAH</th>
                    <th scope="col">PDAM</th>
                    <th scope="col">SUMUR</th>
                    <th scope="col">LAIN-LAIN</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($pokjaIV as $k) : ?>
                    <tr>
                        <?php foreach ($wilayah as $w) :
                            $kdwilayah = $w['kd_wilayah'];
                            if ($k['kd_wilayah'] == $w['kd_wilayah']) { ?>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $w['kelurahan']; ?></td>
                                <td><?= $k['jml_kader_posyandu']; ?></td>
                                <td><?= $k['jml_kader_gizi']; ?></td>
                                <td><?= $k['jml_kader_kesling']; ?></td>
                                <td><?= $k['jml_kader_narkoba']; ?></td>
                                <td><?= $k['jml_kader_phbs']; ?></td>
                                <td><?= $k['jml_kader_kb']; ?></td>
                                <td><?= $k['jml_posyandu_ksht']; ?></td>
                                <td><?= $k['jml_posyandu_integrasi']; ?></td>
                                <td><?= $k['jml_klp_lansia_posyandu']; ?></td>
                                <td><?= $k['jml_anggota_lansia_posyandu']; ?></td>
                                <td><?= $k['jml_kartu_lansia_posyandu']; ?></td>
                                <td><?= $k['jml_rmh_jamban_kshtlh']; ?></td>
                                <td><?= $k['jml_rmh_spal_kshtlh']; ?></td>
                                <td><?= $k['jml_rmh_sampah_kshtlh']; ?></td>
                                <td><?= $k['jml_mck_kshtlh']; ?></td>
                                <td><?= $k['jml_air_pdam_kshtlh']; ?></td>
                                <td><?= $k['jml_air_sumur_kshtlh']; ?></td>
                                <td><?= $k['jml_air_lain_kshtlh']; ?></td>
                                <td><?= $k['jml_pus_rncnsehat']; ?></td>
                                <td><?= $k['jml_wus_rncnsehat']; ?></td>
                                <td><?= $k['jml_akseptorl_rncnsehat']; ?></td>
                                <td><?= $k['jml_akseptorp_rncnsehat']; ?></td>
                                <td><?= $k['jml_tabkel_rncnsehat']; ?></td>
                                <td><?= $k['keterangan']; ?></td>
                            <?php } ?>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <th colspan="2">Jumlah</th>
                    <?php foreach ($total as $t) : ?>
                        <td><?= $t['totalkaderpos']; ?></td>
                        <td><?= $t['totalkadergizi']; ?></td>
                        <td><?= $t['totalkaderkesling']; ?></td>
                        <td><?= $t['totalkadernarkoba']; ?></td>
                        <td><?= $t['totalkaderphbs']; ?></td>
                        <td><?= $t['totalkaderkb']; ?></td>
                        <td><?= $t['totalposyandu']; ?></td>
                        <td><?= $t['totalposterinteg']; ?></td>
                        <td><?= $t['totalklplansia']; ?></td>
                        <td><?= $t['totalanggotalansia']; ?></td>
                        <td><?= $t['totalkartulansia']; ?></td>
                        <td><?= $t['totalrmhjamban']; ?></td>
                        <td><?= $t['totalrmhspal']; ?></td>
                        <td><?= $t['totalrmhsampah']; ?></td>
                        <td><?= $t['totalmck']; ?></td>
                        <td><?= $t['totalpdam']; ?></td>
                        <td><?= $t['totalsumur']; ?></td>
                        <td><?= $t['totalairlain']; ?></td>
                        <td><?= $t['totalpus']; ?></td>
                        <td><?= $t['totalwus']; ?></td>
                        <td><?= $t['totalakseptorL']; ?></td>
                        <td><?= $t['totalakseptorP']; ?></td>
                        <td><?= $t['totaltabungan']; ?></td>
                    <?php endforeach; ?>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <br><br>
    <?php if ($pokjaIV) : ?>
        <a href="/users/tahunpokjaiv" class="btn btn-danger">Kembali ke daftar tahun</a>
    <?php endif; ?>
</div>

<?= $this->endsection(); ?>