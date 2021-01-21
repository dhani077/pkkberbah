<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<h5 class="mt-2">Visi Misi PKK Kecamtan Berbah</h5>
<?php if ($getvisimisi == null) : ?>
    <a href="/visimisi/create" class="btn btn-primary mt-3">Tambah</a>
<?php endif; ?>
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
<div class="table-responsive mt-3">
    <table class="table table-bordered">
        <thead>
            <th scope="col">No.</th>
            <th scope="col">Visi</th>
            <th scope="col">Misi</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($getvisimisi as $v) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $v['visi']; ?></td>
                    <td><?= $v['misi']; ?></td>
                    <td>
                        <a href="visimisi/edit/<?= $v['id']; ?>" class="btn btn-warning">Edit</a>
                        <!-- <form action="/VisiMisiCon/</?= $v['id']; ?>" method="post" class="d-inline">
                            </?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                        </form> -->
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endsection(); ?>