<?= $this->extend('layout/users/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <form action="/users/lihatindustrirt" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <p><b>Industri Rumah Tangga</b></p>
        <div class="form-group col">
            <label for="awal" class="col-sm">Pendataan dari tanggal</label>
            <div class="col-sm-3">
                <div class="custom-file">
                    <select class="form-control <?= ($validation->hasError('range')) ? 'is-invalid' : ''; ?>" id="awal" name="awal" autofocus>
                        <?php foreach ($industrirt as $ir) : ?>
                            <option value="<?= $ir['tgl_pendataan']; ?>"><?= $ir['tgl_pendataan']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('range'); ?>
                    </div>
                </div>
            </div>
            <br>
            <label for="akhir" class="col-sm">sampai tanggal</label>
            <div class="col-sm-3">
                <div class="custom-file">
                    <select class="form-control <?= ($validation->hasError('range')) ? 'is-invalid' : ''; ?>" id="akhir" name="akhir" autofocus>
                        <?php foreach ($industrirt as $ir) : ?>
                            <option value="<?= $ir['tgl_pendataan']; ?>"><?= $ir['tgl_pendataan']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('range'); ?>
                    </div>
                </div>
            </div>
            <!-- </div>
        <div class="form-group row"> -->
            <div class="col pt-5">
                <button id="aksi" name="aksi" type="submit" class="btn btn-success" value="lihat">Lihat</button>
                <button id="aksi" name="aksi" type="submit" class="btn btn-danger" value="batal">Batal</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>