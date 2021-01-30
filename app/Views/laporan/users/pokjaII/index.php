<?= $this->extend('layout/users/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">Daftar tahun kegiatan POKJA II</h5>
    <form action="/users/detailpokjaii" method="post" enctype="multipart/form-data">
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
    <a href="/users/pokjaii" class="btn btn-danger">Kembali</a>
</div>

<?= $this->endsection(); ?>