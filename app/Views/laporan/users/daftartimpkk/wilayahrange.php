<?= $this->extend('layout/users/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Daftar Anggota Tim Penggerak PKK</h5>
    <table>
        <tbody>
            <tr>
                <td><b>Desa/Kelurahan</b></td>
            </tr>
            <?php foreach ($wilayah as $w) : ?>
                <tr>
                    <td style="width: 150px;"><?= $w['kelurahan']; ?></td>
                    <td>
                        <a href="/users/rangedaftartimpkk/<?= $w['kd_wilayah']; ?>" class="btn-sm btn-success">Detail daftar anggota TP PKK</a>
                    </td>
                </tr>
                <tr>
                    <td><br></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endsection(); ?>