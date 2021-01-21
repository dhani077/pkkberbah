<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-3">
        <center>Catatan Data Dan Kegiatan Warga<br>TP PKK Kecamatan</center>
    </h5>
    <div class="table-responsive mb-3">
        <table>
            <tr>
                <th>Kecamatan</th>
                <th></th>
                <th> : </th>
                <th><?= $kecamatan; ?></th>
            </tr>
            <tr>
                <th>Kab/Kota</th>
                <th></th>
                <th> : </th>
                <th><?= $kabupaten; ?></th>
            </tr>
            <tr>
                <th>Provinsi</th>
                <th></th>
                <th> : </th>
                <th><?= $provinsi; ?></th>
            </tr>
        </table>
    </div>
    <a href="/catatankegwarga/create" class="btn btn-primary">Tambah Catatan Data Dan Kegiatan Warga</a>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashData('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="pt-2">
        <table>
            <tr>
                <th>Tahun</th>
            </tr>
        </table>
    </div>

    <form action="/catatankegwarga/detail" method="post" enctype="multipart/form-data">
        <div class="col">
            <div class="form-group row">
                <select id="tahun" name="tahun">
                    <?php foreach ($catatankegwarga as $c) : ?>
                        <option value="<?= $c['tahun']; ?>"><?= $c['tahun']; ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="btn btn-success">Lihat</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endsection(); ?>