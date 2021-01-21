<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Wilayah Simulasi Dan Penyuluhan</h5>
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
            <?php foreach ($simulasi as $k) : ?>
                <tr>
                    <td style="width: 150px;"><?= $k['kelurahan']; ?></td>
                    <td>
                        <a href="/simulasi/detail/<?= $k['kd_wilayah']; ?>" class="btn-sm btn-success">Detail simulasi dan penyuluhan</a>
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