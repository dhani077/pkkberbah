<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">
        <center>Data Umum PKK Kecamatan</center>
    </h5>
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
    <div class="form-group row">
        <div class="col">
            <a href="/dataumumtppkkkec/create" class="btn btn-primary">Tambah data Umum TP PKK Kecamatan</a>
        </div>
    </div>
    <div class="pt-2">
        <table>
            <tr>
                <th>Tahun</th>
            </tr>
        </table>
    </div>

    <form action="/dataumumtppkkkec/detail" method="post" enctype="multipart/form-data">
        <div class="col">
            <div class="form-group row">
                <select id="tahun" name="tahun">
                    <?php foreach ($tahun as $t) : ?>
                        <option value="<?= $t['tahun']; ?>"><?= $t['tahun']; ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="btn btn-success">Lihat</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>