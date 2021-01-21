<?= $this->extend('layout/admin/template'); ?>

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
            <button class="dropdown-item" type="button"><a href="/pokjai/range">POKJA I</a></button>
            <button class="dropdown-item" type="button"><a href="/pokjaii/range">POKJA II</a></button>
            <button class="dropdown-item" type="button"><a href="/pokjaiii/range">POKJA III</a></button>
            <button class="dropdown-item" type="button"><a href="/pokjaiv/range">POKJA IV</a></button>
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
            <button class="dropdown-item" type="button"><a href="/dataumumtppkkkec/range">Data Umum TP PKK</a></button>
            <button class="dropdown-item" type="button"><a href="/daftaranggotatppkkkader/wilayahrange">Daftar Anggota TP PKK Dan Kader</a></button>
            <button class="dropdown-item" type="button"><a href="/pelatihankader/wilayahrange">Data Pelatihan Kader</a></button>
            <button class="dropdown-item" type="button"><a href="/daftartimpkk/wilayahrange">Daftar Anggota Tim PKK</a></button>
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
            <button class="dropdown-item" type="button"><a href="/catatankegwarga/range">Catatan Data Dan Kegiatan Warga</a></button>
            <button class="dropdown-item" type="button"><a href="/bukukegiatan/range">Buku Kegiatan</a></button>
            <button class="dropdown-item" type="button"><a href="/kegiatanlain/range">Kegiatan Lainnya</a></button>
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
            <button class="dropdown-item" type="button"><a href="/suratmasuk/range">Surat Masuk</a></button>
            <button class="dropdown-item" type="button"><a href="/suratkeluar/range">Surat Keluar</a></button>
            <button class="dropdown-item" type="button"><a href="/bukuinventaris/range">Inventaris</a></button>
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
            <button class="dropdown-item" type="button"><a href="/uangmasuk/range">Uang Masuk</a></button>
            <button class="dropdown-item" type="button"><a href="/uangkeluar/range">Uang Keluar</a></button>
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
            <button class="dropdown-item" type="button"><a href="/koperasi/wilayahkoperasi">Koperasi</a></button>
            <button class="dropdown-item" type="button"><a href="/industrirt/range">Industri Rumah Tangga</a></button>
            <button class="dropdown-item" type="button"><a href="/manfaattanah/range">Pemanfaatan Tanah Pekarangan</a></button>
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
            <button class="dropdown-item" type="button"><a href="/kejarpaket/wilayahrange">Kejar Paket</a></button>
            <button class="dropdown-item" type="button"><a href="/tamanbacaan/wilayahrange">Taman Bacaan/Perpustakaan</a></button>
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
            <button class="dropdown-item" type="button"><a href="/posyandu/indexlaporan">Posyandu</a></button>
            <button class="dropdown-item" type="button"><a href="/catatanibuhamil/range">Rekapitulasi Data Ibu Hamil, Melahirkan, Nifas, Meninggal, Kelahiran Bayi, Bayi Meninggal Dan Kematian Balita</a></button>
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
            <button class="dropdown-item" type="button"><a href="/simulasi/wilayahrange">Kelompok Simulasi Dan Penyuluhan</a></button>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>