<?= $this->extend('layout/users/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Daftar tahun kegiatan POKJA IV</h5>
    <form action="/users/detailpokjaiv" method="post" enctype="multipart/form-data">
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
    <br><br><br>
    <a href="/users/pokjaiv" class="btn btn-danger">Kembali</a>
</div>

<?= $this->endsection(); ?>