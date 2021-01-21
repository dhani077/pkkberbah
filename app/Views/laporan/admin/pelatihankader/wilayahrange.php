<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Pelatihan Kader</h5>
    <table>
        <tbody>
            <tr>
                <th>Desa/Kelurahan</th>
            </tr>
            <?php foreach ($wilayah as $k) : ?>
                <tr>
                    <td style="width: 150px;"><?= $k['kelurahan']; ?></td>
                    <td>
                        <a href="/pelatihankader/range/<?= $k['kd_wilayah']; ?>" class="btn-sm btn-success">Detail pelatihan kader</a>
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