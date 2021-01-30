<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Daftar Anggota TP PKK Dan Kader</h5>
    <table>
        <tr>
            <th>Desa/Kelurahan</th>
        </tr>
        <?php foreach ($daftaranggota as $k) : ?>
            <tr>
                <td style="width: 150px;"><?= $k['kelurahan']; ?></td>
                <td>
                    <a href="/daftaranggotatppkkkader/range/<?= $k['kd_wilayah']; ?>" class="btn-sm btn-success">Lihat daftar</a>
                </td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<?= $this->endsection(); ?>