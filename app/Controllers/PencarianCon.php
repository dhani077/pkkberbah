<?php

namespace App\Controllers;

use App\Models\FlashModel;
use App\Models\VisiMisiModel;
use App\Models\KegiatanModel;
use App\Models\KejarpaketModel;
use App\Models\KegiatanposyanduBModel;
use App\Models\BukuinvenModel;
use App\Models\BukukegiatanModel;
use App\Models\CatatanibuhamilModel;
use App\Models\CatatanKegwargaModel;
use App\Models\DaftaranggotatppkkkaderModel;
use App\Models\DaftartimpkkModel;
use App\Models\PosyanduModel;
use App\Models\LayananposyanduModel;
use App\Models\DatapengunjungposyanduModel;
use App\Models\kegiatanposyanduAModel;
use App\Models\DataumumtppkkkecModel;
use App\Models\IndustrirtModel;
use App\Models\KoperasiModel;
use App\Models\ManfaattanahModel;
use App\Models\DatapelatihankaderModel;
use App\Models\PokjaIModel;
use App\Models\PokjaIIModel;
use App\Models\PokjaIIIModel;
use App\Models\PokjaIVModel;
use App\Models\SimulasiModel;
use App\Models\SuratkeluarModel;
use App\Models\SuratmasukModel;
use App\Models\TamanbacaanModel;
use App\Models\JenisbukuModel;
use App\Models\UangkeluarModel;
use App\Models\UangmasukModel;

class PencarianCon extends BaseController
{
    protected $visimisiModel;
    protected $flashModel;
    protected $kegiatanModel;
    protected $kejarpaketModel;
    protected $kegiatanposyanduModel;
    protected $bukuinvenModel;
    protected $bukukegiatanModel;
    protected $catatanibuhamilModel;
    protected $catatanKegwargaModel;
    protected $daftaranggotatppkkkaderModel;
    protected $daftartimpkkModel;
    protected $posyanduModel;
    protected $layananposyanduModel;
    protected $datapengunjungModel;
    protected $kegiatanAModel;
    protected $kegiatanBModel;
    protected $dataumumtppkkkecModel;
    protected $industrirtModel;
    protected $koperasiModel;
    protected $manfaattanahModel;
    protected $datapelatihankaderModel;
    protected $pokjaIModel;
    protected $pokjaIIModel;
    protected $pokjaIIIModel;
    protected $pokjaIVModel;
    protected $simulasiModel;
    protected $suratkeluarModel;
    protected $suratmasukModel;
    protected $tamanbacaanModel;
    protected $jenisbukuModel;
    protected $uangkeluarModel;
    protected $uangmasukModel;

    public function __construct()
    {
        $this->visimisiModel = new VisiMisiModel();
        $this->flashModel = new FlashModel();
        $this->kegiatanModel = new KegiatanModel();
        $this->kejarpaketModel = new KejarpaketModel();
        $this->kegiatanposyanduModel = new KegiatanposyanduBModel();
        $this->bukuinvenModel = new BukuinvenModel();
        $this->bukukegiatanModel = new BukukegiatanModel();
        $this->catatanibuhamilModel = new CatatanibuhamilModel();
        $this->catatanKegwargaModel = new CatatanKegwargaModel();
        $this->daftaranggotatppkkkaderModel = new DaftaranggotatppkkkaderModel();
        $this->daftartimpkkModel = new DaftartimpkkModel();
        $this->posyanduModel = new PosyanduModel();
        $this->layananposyanduModel = new LayananposyanduModel();
        $this->datapengunjungModel = new DatapengunjungposyanduModel();
        $this->kegiatanAModel = new kegiatanposyanduAModel();
        $this->kegiatanBModel = new KegiatanposyanduBModel();
        $this->dataumumtppkkkecModel = new DataumumtppkkkecModel();
        $this->industrirtModel = new IndustrirtModel();
        $this->koperasiModel = new KoperasiModel();
        $this->manfaattanahModel = new ManfaattanahModel();
        $this->datapelatihankaderModel = new DatapelatihankaderModel();
        $this->pokjaIModel = new PokjaIModel();
        $this->pokjaIIModel = new PokjaIIModel();
        $this->pokjaIIIModel = new PokjaIIIModel();
        $this->pokjaIVModel = new PokjaIVModel();
        $this->simulasiModel = new SimulasiModel();
        $this->suratkeluarModel = new SuratkeluarModel();
        $this->suratmasukModel = new SuratmasukModel();
        $this->tamanbacaanModel = new TamanbacaanModel();
        $this->jenisbukuModel = new JenisbukuModel();
        $this->uangkeluarModel = new UangkeluarModel();
        $this->uangmasukModel = new UangmasukModel();
    }

    public function cari($keywords)
    {
        $data = [
            'tittle' => 'Pencarian',
            'PagesAdmin' => '',
            'users' => '',
            'keywords' => $keywords,
            'bukuinven' => $this->bukuinvenModel->cariBukuinven($keywords),
            'bukukegiatan' => $this->bukukegiatanModel->cariBukukegiatan($keywords),
            'daftaranggota' => $this->daftaranggotatppkkkaderModel->cariDaftaranggota($keywords),
            'daftartimpkk' => $this->daftartimpkkModel->cariDaftartimpkk($keywords),
            'industrirt' => $this->industrirtModel->cariIndustrirt($keywords),
            'kegiatanlain' => $this->kegiatanModel->cariKegiatanlain($keywords),
            'kejarpaket' => $this->kejarpaketModel->cariKejarpaket($keywords),
            'koperasi' => $this->koperasiModel->cariKoperasi($keywords),
            'manfaattanah' => $this->manfaattanahModel->cariManfaattanah($keywords),
            'posyandu' => $this->posyanduModel->cariPosyandu($keywords),
            'simulasi' => $this->simulasiModel->cariSimulasi($keywords),
            'tamanbacaan' => $this->tamanbacaanModel->cariTamanbacaan($keywords)
        ];
        return view('cari/pencarian', $data);
    }

    public function searchBukuinven($keywords)
    {
        $data = [
            'tittle' => 'Pencarian',
            'keywords' => $keywords,
            'PagesAdmin' => '',
            'users' => '',
            'bukuinven' => $this->bukuinvenModel->cariBukuinven($keywords)
        ];
        return view('cari/bukuinven', $data);
    }

    public function searchBukukegiatan($keywords)
    {
        $data = [
            'tittle' => 'Pencarian',
            'keywords' => $keywords,
            'PagesAdmin' => '',
            'users' => '',
            'bukukegiatan' => $this->bukukegiatanModel->cariBukukegiatan($keywords)
        ];
        return view('cari/bukukegiatan', $data);
    }

    public function searchDaftaranggota($keywords)
    {
        $daftaranggota = $this->daftaranggotatppkkkaderModel->cariDaftaranggota($keywords);
        foreach ($daftaranggota as $da) {
            $kdwilayah = $da['kd_wilayah'];
        }
        $wilayah = $this->daftaranggotatppkkkaderModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Pencarian',
            'keywords' => $keywords,
            'PagesAdmin' => '',
            'users' => '',
            'daftaranggota' => $daftaranggota,
            'kelurahan' => $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi']
        ];
        return view('cari/daftaranggota', $data);
    }

    public function searchDaftartimpkk($keywords)
    {
        $daftartimpkk = $this->daftartimpkkModel->cariDaftartimpkk($keywords);
        foreach ($daftartimpkk as $dtp) {
            $kdwilayah = $dtp['kd_wilayah'];
        }
        $wilayah = $this->daftartimpkkModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Pencarian',
            'keywords' => $keywords,
            'PagesAdmin' => '',
            'users' => '',
            'daftartimpkk' => $daftartimpkk,
            'kelurahan' => $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi']
        ];
        return view('cari/daftartimpkk', $data);
    }

    public function searchIndustrirt($keywords)
    {
        $data = [
            'tittle' => 'Pencarian',
            'keywords' => $keywords,
            'PagesAdmin' => '',
            'users' => '',
            'industrirt' => $this->industrirtModel->cariIndustrirt($keywords)
        ];
        return view('cari/industrirt', $data);
    }

    public function searchKegiatanlain($keywords)
    {
        $data = [
            'tittle' => 'Pencarian',
            'keywords' => $keywords,
            'PagesAdmin' => '',
            'users' => '',
            'kegiatanlain' => $this->kegiatanModel->cariKegiatanlain($keywords)
        ];
        return view('cari/kegiatanlain', $data);
    }

    public function searchKejarpaket($keywords)
    {
        $kejarpaket = $this->kejarpaketModel->cariKejarpaket($keywords);
        foreach ($kejarpaket as $kp) {
            $kdwilayah = $kp['kd_wilayah'];
        }
        $wilayah = $this->kejarpaketModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Pencarian',
            'keywords' => $keywords,
            'PagesAdmin' => '',
            'users' => '',
            'kejarpaket' => $kejarpaket,
            'kelurahan' => $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi']
        ];
        return view('cari/kejarpaket', $data);
    }

    public function searchKoperasi($keywords)
    {
        $koperasi = $this->koperasiModel->cariKoperasi($keywords);
        foreach ($koperasi as $kop) {
            $kdwilayah = $kop['kd_wilayah'];
        }
        $wilayah = $this->koperasiModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Pencarian',
            'keywords' => $keywords,
            'PagesAdmin' => '',
            'users' => '',
            'koperasi' => $koperasi,
            'kelurahan' => $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi']
        ];
        return view('cari/koperasi', $data);
    }

    public function searchManfaattanah($keywords)
    {
        $data = [
            'tittle' => 'Pencarian',
            'keywords' => $keywords,
            'PagesAdmin' => '',
            'users' => '',
            'manfaattanah' => $this->manfaattanahModel->cariManfaattanah($keywords)
        ];
        return view('cari/manfaattanah', $data);
    }

    public function searchPosyandu($keywords)
    {
        $posyandu = $this->posyanduModel->cariPosyandu($keywords);
        foreach ($posyandu as $p) {
            $kdwilayah = $p['kd_wilayah'];
        }
        $wilayah = $this->posyanduModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Pencarian',
            'keywords' => $keywords,
            'PagesAdmin' => '',
            'users' => '',
            'posyandu' => $posyandu,
            'kelurahan' => $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi']
        ];
        return view('cari/posyandu', $data);
    }

    public function searchSimulasi($keywords)
    {
        $simulasi = $this->simulasiModel->cariSimulasi($keywords);
        foreach ($simulasi as $s) {
            $kdwilayah = $s['kd_wilayah'];
        }
        $wilayah = $this->simulasiModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Pencarian',
            'keywords' => $keywords,
            'PagesAdmin' => '',
            'users' => '',
            'simulasi' => $simulasi,
            'kelurahan' => $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi']
        ];
        return view('cari/simulasi', $data);
    }

    public function searchTamanbacaan($keywords)
    {
        $tamanbacaan = $this->tamanbacaanModel->cariTamanbacaan($keywords);
        foreach ($tamanbacaan as $p) {
            $kdwilayah = $p['kd_wilayah'];
        }
        $wilayah = $this->tamanbacaanModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Pencarian',
            'keywords' => $keywords,
            'PagesAdmin' => '',
            'users' => '',
            'tamanbacaan' => $tamanbacaan,
            'kelurahan' => $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi']
        ];
        return view('cari/tamanbacaan', $data);
    }
}
