<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Wilayah Kejar Paket</h5>
    <table>
        <tbody>
            <tr>
                <th>Desa/Kelurahan</th>
            </tr>
            <tr>
                <?php foreach ($kejarpaket as $k) : ?>
                    <td style="width: 150px;"><?= $k['kelurahan']; ?></td>
                    <td>
                        <a href="/kejarpaket/detail/<?= $k['kd_wilayah']; ?>" class="btn-sm btn-success">Detail kejar paket</a>
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