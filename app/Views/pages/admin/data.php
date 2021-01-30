<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 align="center">DATA</h5>
    <div class="row row-cols-1 row-cols-md-3 pt-3">
        <div class="col mb-2">
            <div class="card bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header">KEANGGOTAAN</div>
                <div class="card-body">
                    <li class="list-group"><a href="/dataumumtppkkkec/index">Data Umum TP PKK</a></li>
                    <li class="list-group"><a href="/daftaranggotatppkkkader/index">Daftar Anggota TP PKK Dan Kader</a></li>
                    <li class="list-group"><a href="/pelatihankader/index">Data Pelatihan Kader</a></li>
                    <li class="list-group"><a href="/daftartimpkk/index">Daftar Anggota Tim PKK</a></li>
                </div>
            </div>
        </div>
        <div class="col mb-2">
            <div class="card bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header">KEGIATAN</div>
                <div class="card-body">
                    <li class="list-group"><a href="/catatankegwarga/index">Catatan Data Dan Kegiatan Warga</a></li>
                    <li class="list-group"><a href="/bukukegiatan/index">Buku Kegiatan</a></li>
                    <li class="list-group"><a href="/kegiatanlain/index">Kegiatan Lainnya</a></li>
                </div>
            </div>
        </div>
        <div class="col mb-2">
            <div class="card bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header">KESEKRETARIATAN</div>
                <div class="card-body">
                    <li class="list-group"><a href="/suratmasuk/index">Surat Masuk</a></li>
                    <li class="list-group"><a href="/suratkeluar/index">Surat Keluar</a></li>
                    <li class="list-group"><a href="/bukuinventaris/index">Inventaris</a></li>
                </div>
            </div>
        </div>
        <div class="col mb-2">
            <div class="card bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header">KEUANGAN</div>
                <div class="card-body">
                    <li class="list-group"><a href="/uangmasuk/index">Uang Masuk</a></li>
                    <li class="list-group"><a href="/uangkeluar/index">Uang Keluar</a></li>
                </div>
            </div>
        </div>
        <div class="col mb-2">
            <div class="card bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header">SUMBER DAYA</div>
                <div class="card-body">
                    <li class="list-group"><a href="/koperasi/index">Koperasi</a></li>
                    <li class="list-group"><a href="/industrirt/index">Industri Rumah Tangga</a></li>
                    <li class="list-group"><a href="/manfaattanah/index">Pemanfaatan Tanah Pekarangan</a></li>
                </div>
            </div>
        </div>
        <div class="col mb-2">
            <div class="card bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header">PENDIDIKAN</div>
                <div class="card-body">
                    <li class="list-group"><a href="/kejarpaket/index">Kejar Paket</a></li>
                    <li class="list-group"><a href="/tamanbacaan/index">Taman Bacaan/Perpustakaan</a></li>
                </div>
            </div>
        </div>
        <div class="col mb-2">
            <div class="card bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header">KESEHATAN</div>
                <div class="card-body">
                    <li class="list-group"><a href="/posyandu/index">Posyandu</a></li>
                    <li class="list-group"><a href="/catatanibuhamil/index">Rekapitulasi Data Ibu Hamil, Melahirkan, Nifas, Meninggal, Kelahiran Bayi, Bayi Meninggal Dan Kematian Balita</a></li>
                </div>
            </div>
        </div>
        <div class="col mb-2">
            <div class="card bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header">LAINNYA</div>
                <div class="card-body">
                    <li class="list-group"><a href="/simulasi/index">Kelompok Simulasi Dan Penyuluhan</a></li>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>