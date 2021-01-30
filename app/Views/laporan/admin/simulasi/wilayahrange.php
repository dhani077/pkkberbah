<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Wilayah Kelompok Simulasi Dan Penyuluhan</h5>
    <table>
        <tbody>
            <tr>
                <th>Desa/Kelurahan</th>
            </tr>
            <tr>
                <?php foreach ($simulasi as $s) : ?>
                    <td style="width: 150px;"><?= $s['kelurahan']; ?></td>
                    <td>
                        <a href="/simulasi/range/<?= $s['kd_wilayah']; ?>" class="btn-sm btn-success">Lihat detail simulasi dan penyuluhan</a>
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