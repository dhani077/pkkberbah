<?= $this->extend('layout/users/template'); ?>

<?= $this->section('content'); ?>
<div class="col">
    <h5 class="mb-5">MONITORING & LAPORAN</h5>
    <div class="btn-group dropright">
        <button type="button" class="btn-sm btn-success">
            POKJA
        </button>
        <button type="button" class="btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle Dropright</span>
        </button>
        <div class="dropdown-menu">
            <button class="dropdown-item" type="button"><a href="/users/rangepokjai">POKJA I</a></button>
            <button class="dropdown-item" type="button"><a href="/users/rangepokjaii">POKJA II</a></button>
            <button class="dropdown-item" type="button"><a href="/users/rangepokjaiii">POKJA III</a></button>
            <button class="dropdown-item" type="button"><a href="/users/rangepokjaiv">POKJA IV</a></button>
        </div>
    </div>
    <br><br>
    <div class="btn-group dropright">
        <button type="button" class="btn-sm btn-success">
            KEANGGOTAAN
        </button>
        <button type="button" class="btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle Dropright</span>
        </button>
        <div class="dropdown-menu">
            <button class="dropdown-item" type="button"><a href="/users/rangedataumumtppkk">Data Umum TP PKK</a></button>
            <button class="dropdown-item" type="button"><a href="/users/wilayahdaftaranggotatppkkkader">Daftar Anggota TP PKK Dan Kader</a></button>
            <button class="dropdown-item" type="button"><a href="/users/wilayahpelatihankader">Data Pelatihan Kader</a></button>
            <button class="dropdown-item" type="button"><a href="/users/wilayahdaftartimpkk">Daftar Anggota Tim PKK</a></button>
        </div>
    </div>
    <br><br>
    <div class="btn-group dropright">
        <button type="button" class="btn-sm btn-success">
            KEGIATAN
        </button>
        <button type="button" class="btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle Dropright</span>
        </button>
        <div class="dropdown-menu">
            <button class="dropdown-item" type="button"><a href="/users/rangecatatankegwarga">Catatan Data Dan Kegiatan Warga</a></button>
            <button class="dropdown-item" type="button"><a href="/users/rangebukukegiatan">Buku Kegiatan</a></button>
            <button class="dropdown-item" type="button"><a href="/users/rangekegiatanlain">Kegiatan Lainnya</a></button>
        </div>
    </div>
    <br><br>
    <div class="btn-group dropright">
        <button type="button" class="btn-sm btn-success">
            KESEKRETARIATAN
        </button>
        <button type="button" class="btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle Dropright</span>
        </button>
        <div class="dropdown-menu">
            <button class="dropdown-item" type="button"><a href="/users/rangesuratmasuk">Surat Masuk</a></button>
            <button class="dropdown-item" type="button"><a href="/users/rangesuratkeluar">Surat Keluar</a></button>
            <button class="dropdown-item" type="button"><a href="/users/rangebukuinven">Inventaris</a></button>
        </div>
    </div>
    <br><br>
    <div class="btn-group dropright">
        <button type="button" class="btn-sm btn-success">
            KEUANGAN
        </button>
        <button type="button" class="btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle Dropright</span>
        </button>
        <div class="dropdown-menu">
            <button class="dropdown-item" type="button"><a href="/users/rangeuangmasuk">Uang Masuk</a></button>
            <button class="dropdown-item" type="button"><a href="/users/rangeuangkeluar">Uang Keluar</a></button>
        </div>
    </div>
    <br><br>
    <div class="btn-group dropright">
        <button type="button" class="btn-sm btn-success">
            SUMBER DAYA
        </button>
        <button type="button" class="btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle Dropright</span>
        </button>
        <div class="dropdown-menu">
            <button class="dropdown-item" type="button"><a href="/users/wilayahkoperasi">Koperasi</a></button>
            <button class="dropdown-item" type="button"><a href="/users/rangeindustrirt">Industri Rumah Tangga</a></button>
            <button class="dropdown-item" type="button"><a href="/users/rangemanfaattanah">Pemanfaatan Tanah Pekarangan</a></button>
        </div>
    </div>
    <br><br>
    <div class="btn-group dropright">
        <button type="button" class="btn-sm btn-success">
            PENDIDIKAN
        </button>
        <button type="button" class="btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle Dropright</span>
        </button>
        <div class="dropdown-menu">
            <button class="dropdown-item" type="button"><a href="/users/wilayahkejarpaket">Kejar Paket</a></button>
            <button class="dropdown-item" type="button"><a href="/users/wilayahtamanbacaan">Taman Bacaan/Perpustakaan</a></button>
        </div>
    </div>
    <br><br>
    <div class="btn-group dropright">
        <button type="button" class="btn-sm btn-success">
            KESEHATAN
        </button>
        <button type="button" class="btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle Dropright</span>
        </button>
        <div class="dropdown-menu">
            <button class="dropdown-item" type="button"><a href="/users/indexlaporanposyandu">Posyandu</a></button>
            <button class="dropdown-item" type="button"><a href="/users/rangeibuhamil">Rekapitulasi Data Ibu Hamil, Melahirkan, Nifas, Meninggal, Kelahiran Bayi, Bayi Meninggal Dan Kematian Balita</a></button>
        </div>
    </div>
    <br><br>
    <div class="btn-group dropright">
        <button type="button" class="btn-sm btn-success">
            LAINNYA
        </button>
        <button type="button" class="btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle Dropright</span>
        </button>
        <div class="dropdown-menu">
            <button class="dropdown-item" type="button"><a href="/users/wilayahsimulasi">Kelompok Simulasi Dan Penyuluhan</a></button>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>