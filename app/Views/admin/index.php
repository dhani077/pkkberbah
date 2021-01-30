<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-3">Daftar Admin PKK Kecamatan Berbah</h5>
    <a href="/admin/create" class="btn btn-primary mt-3">Tambah Admin</a>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashData('pesan'); ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('hapus')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashData('hapus'); ?>
        </div>
    <?php endif; ?>
    <div class="table-responsive pt-2">
        <table class="table table-bordered table-striped">
            <thead>
                <th scope="col">NO.</th>
                <th scope="col">NAMA</th>
                <th scope="col">EMAIL</th>
                <th scope="col">NO. HP</th>
                <th scope="col">USERNAME</th>
                <th scope="col">STATUS AKTIF</th>
                <th scope="col">LEVEL</th>
                <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($admin as $a) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $a['nama']; ?></td>
                        <td><?= $a['email']; ?></td>
                        <td><?= $a['no_hp']; ?></td>
                        <td><?= $a['username']; ?></td>
                        <?php if ($a['is_active'] == 1) {
                            $status = "YA";
                        } else {
                            $status = "TIDAK";
                        }
                        ?>
                        <td><?= $status; ?></td>
                        <td><?= $a['level']; ?></td>
                        <td>
                            <a href="/admin/edit/<?= $a['id_admin']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/admin/<?= $a['id_admin']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endsection(); ?>