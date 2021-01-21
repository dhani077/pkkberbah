<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Wilayah Koperasi</h5>
    <table>
        <tr>
            <th>Desa/Kelurahan</th>
        </tr>
        <tbody>
            <?php foreach ($wilayah as $k) : ?>
                <tr>
                    <td style="width: 150px;"><?= $k['kelurahan']; ?></td>
                    <td>
                        <a href="/koperasi/lihatkoperasi/<?= $k['kd_wilayah']; ?>" class="btn-sm btn-success">Lihat detail koperasi</a>
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