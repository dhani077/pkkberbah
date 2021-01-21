<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-3">Daftar tahun kegiatan POKJA I</h5>
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
            <a href="/pokjai/create" class="btn btn-primary">Tambah Data Pokja I</a><br>
        </div>
    </div>
    <form action="/pokjai/detail" method="post" enctype="multipart/form-data">
        <div class="col">
            <div class="form-group row">
                <select id="tahun" name="tahun">
                    <?php foreach ($tahun as $t) : ?>
                        <option value="<?= $t['tahun']; ?>"><?= $t['tahun']; ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="btn btn-success">Lihat</button>
                <!-- <div class="invalid-feedback">
                </?= $validation->getError('nama_wilayah'); ?>
            </div> -->
            </div>
        </div>
    </form>
</div>

<?= $this->endsection(); ?>