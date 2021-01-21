<?= $this->extend('layout/users/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-3">POSYANDU</h5>
    <table>
        <tbody>
            <tr>
                <th>Desa/Kelurahan</th>
            </tr>
            <?php foreach ($posyandu as $k) : ?>
                <tr>
                    <td style="width: 150px;"><?= $k['kelurahan']; ?></td>
                    <td>
                        <a href="/users/detaillaporanposyandu/<?= $k['kd_wilayah']; ?>" class="btn-sm btn-success">Detail data posyandu</a>
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