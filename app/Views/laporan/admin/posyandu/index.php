<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-3">
        <center>POSYANDU</center>
    </h5>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashData('pesan'); ?>
        </div>
    <?php endif; ?>
    <table>
        <tbody>
            <tr>
                <th>Desa/Kelurahan</th>
            </tr>
            <?php foreach ($posyandu as $k) : ?>
                <tr>
                    <td style="width: 150px;"><?= $k['kelurahan']; ?></td>
                    <td>
                        <a href="/posyandu/detail/<?= $k['kd_wilayah']; ?>" class="btn-sm btn-success">Detail data posyandu</a>
                    </td>
                </tr>
                <tr>
                    <td><br></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p style="text-align: justify;"><br>
        Posyandu adalah pusat kegiatan masyarakat dalam upaya pelayanan kesehatan dan keluarga berencana. (Effendi, Nasrul. 1998: 267) Adapun tujuan Posyandu&nbsp; antara lain : menurunkan Angka Kematian Bayi (AKB), Angka Kematian Ibu (ibu hamil), melahirkan dan nifas, membudayakan NKBS, meningkatkan peran serta masyarakat untuk mengembangkan kegiatan kesehatan dan KB serta kegiatan lainnya yang menunjang untuk tercapainya masyarakat sehat sejahtera. Berfungsi sebagai wahana gerakan reproduksi keluarga sejahtera, gerakan ketahanan keluarga dan gerakan ekonomi keluarga sejahtera.</p>
    <p style="text-align: justify;"><br>
        Kegiatan Pokok Posyandu meliputi : KIA, KB, imunisasi, gizi, penanggulangan diare. Pelaksanaan Layanan Posyandu memiliki ketentuan khusus. Pada hari buka posyandu dilakukan pelayanan masyarakat dengan sistem 5 meja yaitu: Meja I : Pendaftaran&nbsp;&nbsp; Meja II : Penimbangan, Meja III : Pengisian KMS, Meja IV : Penyuluhan perorangan berdasarkan KMS, Meja V : Pelayanan kesehatan berupa : imunisasi, pemberian vitamin A dosis tinggi, pembagian pil KB atau kondom, pengobatan ringan, konsultasi KB. Petugas pada meja I dan IV dilaksanakan oleh kader PKK sedangkan meja V merupakan meja pelayanan medis.</p>
</div>

<?= $this->endsection(); ?>