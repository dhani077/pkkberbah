<?php if (session('nama')) : ?>
    <?= $this->extend('layout/admin/template'); ?>
<?php endif; ?>
<?php if (empty(session('nama'))) : ?>
    <?= $this->extend('layout/users/template'); ?>
<?php endif; ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5>Yang anda cari dengan kata kunci "<?= $keywords; ?>"</h5>
    <?php if ($bukuinven) : ?>
        <div class="card mb-3 mt-3">
            <div class="card-body">
                <p><b>Inventaris</b></p>
                <?php foreach ($bukuinven as $inven) : ?>
                    <p>
                        <?php if ($inven['foto']) : ?>
                            Foto Barang :<br>
                            <img src="/img/<?= $inven['foto']; ?>" width="400px"><br>
                        <?php endif; ?>
                        <?php if (empty($inven['foto'])) : ?>
                            Foto Barang : tidak ada<br>
                        <?php endif; ?>
                        Nama Barang : <?= $inven['nama_brg']; ?> <a href="/pencarian/bukuinven/<?= $inven['nama_brg']; ?>" style="color: dimgray;">more</a>
                    </p>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($bukukegiatan) : ?>
        <div class="card mb-3">
            <div class="card-body">
                <p><b>Buku Kegiatan</b></p>
                <?php foreach ($bukukegiatan as $bk) : ?>
                    <p>
                        <?php if ($bk['foto']) : ?>
                            Foto kegiatan : <br>
                            <img src="/img/<?= $bk['foto']; ?>" width="400px"><br>
                        <?php endif; ?>
                        <?php if (empty($bk['foto'])) : ?>
                            Foto kegiatan : tidak ada<br>
                        <?php endif; ?>
                        Nama : <?= $bk['nama']; ?>
                        -> Jabatan : <?= $bk['jabatan']; ?>
                        <a href="/pencarian/bukukegiatan/<?= $bk['nama']; ?>" style="color: dimgray;">more</a>
                    </p>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($daftaranggota) : ?>
        <div class="card mb-3">
            <div class="card-body">
                <p><b>Daftar Angggota TP PKK dan Kader</b></p>
                <?php foreach ($daftaranggota as $da) : ?>
                    <p>
                        Nama : <?= $da['nama']; ?>
                        <a href="/pencarian/daftaranggota/<?= $da['nama']; ?>" style="color: dimgray;">more</a>
                    </p>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($daftartimpkk) : ?>
        <div class="card mb-3">
            <div class="card-body">
                <p><b>Daftar Anggota Tim Penggerak PKK</b></p>
                <?php foreach ($daftartimpkk as $dt) : ?>
                    <p>
                        Nama : <?= $dt['nama']; ?>
                        -> Jabatan : <?= $dt['jabatan']; ?>
                        <a href="/pencarian/daftartimpkk/<?= $dt['nama']; ?>" style="color: dimgray;">more</a>
                    </p>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($industrirt) : ?>
        <div class="card mb-3">
            <div class="card-body">
                <p><b>Industri Rumah Tangga</b></p>
                <?php foreach ($industrirt as $dt) : ?>
                    <p>
                        Kategori : <?= $dt['kategori']; ?>
                        -> Komoditi : <?= $dt['komoditi']; ?>
                        <a href="/pencarian/industrirt/<?= $dt['kategori']; ?>" style="color: dimgray;">more</a>
                    </p>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($kegiatanlain) : ?>
        <div class="card mb-3">
            <div class="card-body">
                <p><b>Kegiatan lain-lain</b></p>
                <?php foreach ($kegiatanlain as $kl) : ?>
                    <p>
                        <?php if ($kl['foto']) : ?>
                            Foto kegiatan : <br>
                            <img src="/img/<?= $kl['foto']; ?>" width="400px"><br>
                        <?php endif; ?>
                        <?php if (empty($kl['foto'])) : ?>
                            Foto kegiatan : tidak ada<br>
                        <?php endif; ?>
                        Nama kegiatan : <?= $kl['nama_kegiatan']; ?>
                        <a href="/pencarian/kegiatanlain/<?= $kl['nama_kegiatan']; ?>" style="color: dimgray;">more</a>
                    </p>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($kejarpaket) : ?>
        <div class="card mb-3">
            <div class="card-body">
                <p><b>Kejar Paket</b></p>
                <?php foreach ($kejarpaket as $kp) : ?>
                    <p>
                        Nama paket : <?= $kp['nama_paket']; ?>
                        -> Jenis paket : <?= $kp['jns_paket']; ?>
                        <a href="/pencarian/kejarpaket/<?= $kp['nama_paket']; ?>" style="color: dimgray;">more</a>
                    </p>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($koperasi) : ?>
        <div class="card mb-3">
            <div class="card-body">
                <p><b>Koperasi</b></p>
                <?php foreach ($koperasi as $kop) : ?>
                    <p>
                        Nama koperasi : <?= $kop['nama_koperasi']; ?>
                        <a href="/pencarian/koperasi/<?= $kop['nama_koperasi']; ?>" style="color: dimgray;">more</a>
                    </p>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($manfaattanah) : ?>
        <div class="card mb-3">
            <div class="card-body">
                <p><b>Pemanfaatan Tanah Pekarangan/Hatinya PKK</b></p>
                <?php foreach ($manfaattanah as $mt) : ?>
                    <p>
                        Kategori : <?= $mt['kategori']; ?>
                        -> Komoditi : <?= $mt['komoditi']; ?>
                        <a href="/pencarian/manfaattanah/<?= $mt['kategori']; ?>" style="color: dimgray;">more</a>
                    </p>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($posyandu) : ?>
        <div class="card mb-3">
            <div class="card-body">
                <p><b>Posyandu</b></p>
                <?php foreach ($posyandu as $p) : ?>
                    <p>
                        Nama posyandu : <?= $p['nama_posyandu']; ?>
                        <a href="/pencarian/posyandu/<?= $p['nama_posyandu']; ?>" style="color: dimgray;">more</a>
                    </p>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($simulasi) : ?>
        <div class="card mb-3">
            <div class="card-body">
                <p><b>Kelompok Simulasi Dan Penyuluhan</b></p>
                <?php foreach ($simulasi as $s) : ?>
                    <p>
                        Nama kegiatan : <?= $s['nama_kegiatan']; ?>
                        -> Jenis simulasi atau penyuluhan : <?= $s['jns_simulasi']; ?>
                        <a href="/pencarian/simulasi/<?= $s['nama_kegiatan']; ?>" style="color: dimgray;">more</a>
                    </p>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($tamanbacaan) : ?>
        <div class="card mb-3">
            <div class="card-body">
                <p><b>Taman Bacaan/Perpustakaan</b></p>
                <?php foreach ($tamanbacaan as $tb) : ?>
                    <p>
                        Nama Taman Bacaan/Perpustakaan : <?= $tb['nama_taman']; ?>
                        <a href="/pencarian/tamanbacaan/<?= $tb['nama_taman']; ?>" style="color: dimgray;">more</a>
                    </p>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (empty($bukuinven) && empty($bukukegiatan) && empty($daftaranggota) && empty($daftartimpkk) && empty($industrirt) && empty($kegiatanlain) && empty($kejarpaket) && empty($koperasi) && empty($manfaattanah) && empty($posyandu) && empty($simulasi) && empty($tamanabacaan) && empty($simulasi) && empty($posyandu)) : ?>
        <p class="mt-3">tidak ditemukan</p>
    <?php endif; ?>
</div>
<?= $this->endSection(); ?>