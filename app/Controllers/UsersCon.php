<?php

namespace App\Controllers;

use App\Models\FlashModel;
use App\Models\VisiMisiModel;
use App\Models\KegiatanModel;
use App\Models\KejarpaketModel;
use App\Models\BukuinvenModel;
use App\Models\BukukegiatanModel;
use App\Models\CatatanibuhamilModel;
use App\Models\CatatanKegwargaModel;
use App\Models\DaftaranggotatppkkkaderModel;
use App\Models\DaftartimpkkModel;
use App\Models\PosyanduModel;
use App\Models\LayananposyanduModel;
use App\Models\DatapengunjungposyanduModel;
use App\Models\KegiatanposyanduAModel;
use App\Models\KegiatanposyanduBModel;
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

class UsersCon extends BaseController
{
    protected $visimisiModel;
    protected $flashModel;
    protected $kegiatanModel;
    protected $kejarpaketModel;
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
        $this->kegiatanAModel = new KegiatanposyanduAModel();
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

    public function home()
    {
        $visimisi = $this->visimisiModel->getVisiMisi();
        $flash = $this->flashModel->getFlash();
        $flashNama = $flash['nama'];
        if ($visimisi) {
            foreach ($visimisi as $vm) :
                $visi = $vm['visi'];
                $misi = $vm['misi'];
            endforeach;
            $data = [
                'visi' => $visi,
                'misi' => $misi,
                'flash' => $flashNama,
            ];
        } elseif (empty($visimisi)) {
            $data = [
                'visi' => '',
                'misi' => '',
                'flash' => $flashNama,
            ];
        }
        session()->set($data);
        $keywords = $this->request->getVar('keywords');
        if ($keywords) {
            return redirect()->to("/pencarian/cari/$keywords");
        }
        $data = [
            'tittle' => 'Home | PKK Berbah',
            'kegiatanpkk' => $this->kegiatanModel->getKegiatanLimit(),
            'users' => 'home'
        ];
        return view('pages/users/home', $data);
    }

    public function laporan()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan'
        ];
        return view('pages/users/laporan', $data);
    }

    public function pokjai()
    {
        $data = [
            'tittle' => 'POKJA I',
            'users' => 'pokja'
        ];
        return view('pages/users/pokjai', $data);
    }

    public function pokjaii()
    {
        $data = [
            'tittle' => 'POKJA II',
            'users' => 'pokja'
        ];
        return view('pages/users/pokjaii', $data);
    }

    public function pokjaiii()
    {
        $data = [
            'tittle' => 'POKJA III',
            'users' => 'pokja'
        ];
        return view('pages/users/pokjaiii', $data);
    }

    public function pokjaiv()
    {
        $data = [
            'tittle' => 'POKJA IV',
            'users' => 'users'
        ];
        return view('pages/users/pokjaiv', $data);
    }

    public function tentang()
    {
        $data = [
            'tittle' => 'Tentang | PKK Berbah',
            'users' => 'tentang',
            'alamat' => [
                [
                    'kantor' => 'PKK Kecamtan Berbah',
                    'alamat' => 'Berbah, Sleman',
                    'kota' => 'D.I.Yogyakarta'
                ],
            ]
        ];
        return view('pages/tentang', $data);
    }

    public function rangeBukuinven()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'bukuinven' => $this->bukuinvenModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/users/bukuinventaris/range', $data);
    }

    public function lihatBukuinven()
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $btn = $this->request->getVar('aksi');
        if ($btn == "lihat") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'users' => 'laporan',
                'bukuinven' => $this->bukuinvenModel->getRange($awal, $akhir),
                'awal' => $awal,
                'akhir' => $akhir
            ];
            return view('laporan/users/bukuinventaris/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/users/laporan');
        }
    }

    public function rangeBukukegiatan()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'bukukegiatan' => $this->bukukegiatanModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/users/bukukegiatan/range', $data);
    }

    public function lihatBukukegiatan()
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $tahun1 = substr($awal, 0, 4);
        $tahun2 = substr($akhir, 0, 4);
        $btn = $this->request->getVar('aksi');
        if ($btn == "lihat") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'users' => 'laporan',
                'awal' => $awal,
                'akhir' => $akhir,
                'bukukegiatan' => $this->bukukegiatanModel->getRange($awal, $akhir),
                'validation' => \Config\Services::validation()
            ];
            return view('laporan/users/bukukegiatan/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/users/laporan');
        }
    }

    public function rangeIbuhamil()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'catatanibuhamil' => $this->catatanibuhamilModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/users/catatanibuhamil/range', $data);
    }

    public function lihatIbuhamil()
    {
        $wilayah = $this->catatanibuhamilModel->getWilayah();
        foreach ($wilayah as $w) {
            $kecamatan = $w['kecamatan'];
            $kabupaten = $w['kabupaten'];
            $provinsi = $w['provinsi'];
        }
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $btn = $this->request->getVar('aksi');
        if ($btn == "lihat") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'users' => 'laporan',
                'catatanibuhamil' => $this->catatanibuhamilModel->getRange($awal, $akhir),
                'total' => $this->catatanibuhamilModel->getTotalCetak($awal, $akhir),
                'hitung' => $this->catatanibuhamilModel->hitung($awal, $akhir),
                'awal' => $awal,
                'akhir' => $akhir,
                'kecamatan' => $kecamatan,
                'kabupaten' => $kabupaten,
                'provinsi' => $provinsi
            ];
            return view('laporan/users/catatanibuhamil/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/users/laporan');
        }
    }

    public function rangeCatatanKegwarga()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'catatankegwarga' => $this->catatanKegwargaModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/users/catatankegwarga/range', $data);
    }

    public function lihatCatatanKegwarga()
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $tahun1 = substr($awal, 0, 4);
        $tahun2 = substr($akhir, 0, 4);
        $btn = $this->request->getVar('aksi');
        if ($btn == "lihat") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'users' => 'laporan',
                'awal' => $awal,
                'akhir' => $akhir,
                'catatankegwarga' => $this->catatanKegwargaModel->getRange($awal, $akhir),
                'total' => $this->catatanKegwargaModel->getTotalCetak($awal, $akhir),
                'tahun1' => $tahun1,
                'tahun2' => $tahun2,
                'kecamatan' => 'Berbah',
                'kabupaten' => 'Sleman',
                'provinsi' => 'D.I.Yogyakarta'
            ];
            return view('laporan/users/catatankegwarga/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/users/laporan');
        }
    }

    public function wilayahDaftaranggotatppkkkader()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'daftaranggota' => $this->daftaranggotatppkkkaderModel->getWilayah()
        ];
        return view('laporan/users/daftaranggotatppkkkader/wilayahrange', $data);
    }

    public function rangeDaftaranggotatppkkkader($kdwilayah)
    {
        $wilayah = $this->daftaranggotatppkkkaderModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'kdwilayah' => $kdwilayah,
            'kelurahan' => $wilayah['kelurahan'],
            'daftaranggota' => $this->daftaranggotatppkkkaderModel->getTanggal($kdwilayah),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/users/daftaranggotatppkkkader/range', $data);
    }

    public function lihatDaftaranggotatppkkkader($kdwilayah)
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $tahun1 = substr($awal, 0, 4);
        $tahun2 = substr($akhir, 0, 4);
        $btn = $this->request->getVar('aksi');
        $wilayah = $this->daftaranggotatppkkkaderModel->getWilayah($kdwilayah);
        if ($btn == "lihat") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'users' => 'laporan',
                'awal' => $awal,
                'akhir' => $akhir,
                'kdwilayah' => $kdwilayah,
                'kelurahan' => $wilayah['kelurahan'],
                'kecamatan' => $wilayah['kecamatan'],
                'kabupaten' => $wilayah['kabupaten'],
                'provinsi' => $wilayah['provinsi'],
                'daftaranggota' => $this->daftaranggotatppkkkaderModel->getRange($kdwilayah, $awal, $akhir),
                'tahun1' => $tahun1,
                'tahun2' => $tahun2
            ];
            return view('laporan/users/daftaranggotatppkkkader/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/users/wilayahdaftaranggotatppkkkader');
        }
    }

    public function wilayahDaftartimpkk()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'wilayah' => $this->daftartimpkkModel->getWilayah()
        ];
        return view('laporan/users/daftartimpkk/wilayahrange', $data);
    }

    public function rangeDaftartimpkk($kdwilayah)
    {
        $wilayah = $this->daftartimpkkModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'kdwilayah' => $kdwilayah,
            'kelurahan' => $wilayah['kelurahan'],
            'daftartimpkk' => $this->daftartimpkkModel->getTanggal($kdwilayah),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/users/daftartimpkk/range', $data);
    }

    public function lihatDaftartimpkk($kdwilayah)
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $tahun1 = substr($awal, 0, 4);
        $tahun2 = substr($akhir, 0, 4);
        $btn = $this->request->getVar('aksi');
        $wilayah = $this->daftartimpkkModel->getWilayah($kdwilayah);
        if ($btn == "lihat") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'users' => 'laporan',
                'awal' => $awal,
                'akhir' => $akhir,
                'kdwilayah' => $kdwilayah,
                'kelurahan' => $wilayah['kelurahan'],
                'kecamatan' => $wilayah['kecamatan'],
                'kabupaten' => $wilayah['kabupaten'],
                'provinsi' => $wilayah['provinsi'],
                'daftartimpkk' => $this->daftartimpkkModel->getRange($kdwilayah, $awal, $akhir),
                'tahun1' => $tahun1,
                'tahun2' => $tahun2
            ];
            return view('laporan/users/daftartimpkk/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/users/wilayahdaftartimpkk');
        }
    }

    public function rangeDataumumtppkk()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'dataumumtppkkkec' => $this->dataumumtppkkkecModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/users/dataumumtppkkkec/range', $data);
    }

    public function lihatDataumumtppkk()
    {
        $wilayah = $this->dataumumtppkkkecModel->getWilayah();
        foreach ($wilayah as $w) {
            $kecamatan = $w['kecamatan'];
            $kabupaten = $w['kabupaten'];
            $provinsi = $w['provinsi'];
        }
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $tahun1 = substr($awal, 0, 4);
        $tahun2 = substr($akhir, 0, 4);
        $btn = $this->request->getVar('aksi');
        if ($btn == "lihat") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'users' => 'laporan',
                'awal' => $awal,
                'akhir' => $akhir,
                'kecamatan' => $kecamatan,
                'kabupaten' => $kabupaten,
                'provinsi' => $provinsi,
                'dataumumtppkkkec' => $this->dataumumtppkkkecModel->getRange($awal, $akhir),
                'total' => $this->dataumumtppkkkecModel->getTotalCetak($awal, $akhir),
                'tahun1' => $tahun1,
                'tahun2' => $tahun2
            ];
            return view('laporan/users/dataumumtppkkkec/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/users/laporan');
        }
    }

    public function rangeIndustrirt()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'industrirt' => $this->industrirtModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/users/industrirt/range', $data);
    }

    public function lihatIndustrirt()
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $btn = $this->request->getVar('aksi');
        if ($btn == "lihat") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'users' => 'laporan',
                'industrirt' => $this->industrirtModel->getRange($awal, $akhir),
                'awal' => $awal,
                'akhir' => $akhir
            ];
            return view('laporan/users/industrirt/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/users/laporan');
        }
    }

    public function rangeKegiatanlain()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'kegiatanlain' => $this->kegiatanModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/users/kegiatanlain/range', $data);
    }

    public function lihatKegiatanlain()
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $tahun1 = substr($awal, 0, 4);
        $tahun2 = substr($akhir, 0, 4);
        $btn = $this->request->getVar('aksi');
        if ($btn == "lihat") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'users' => 'laporan',
                'kegiatanlain' => $this->kegiatanModel->getRange($awal, $akhir),
                'tahun1' => $tahun1,
                'tahun2' => $tahun2,
                'awal' => $awal,
                'akhir' => $akhir
            ];
            return view('laporan/users/kegiatanlain/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/users/laporan');
        }
    }

    public function indexLaporanPosyandu()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'posyandu' => $this->posyanduModel->getWilayah()
        ];
        return view('laporan/users/posyandu/indexlaporan', $data);
    }

    public function detailLaporanPosyandu($kdwilayah)
    {
        $wilayah = $this->posyanduModel->getWilayah($kdwilayah);
        $posyandu = $this->posyanduModel->getPosyandu($kdwilayah);
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'kelurahan' =>  $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi'],
            'posyandu' => $posyandu,
            'kdwilayah' => $kdwilayah,
        ];
        return view('laporan/users/posyandu/detaillaporan', $data);
    }

    public function posyanduLaporan($kdposyandu)
    {
        $posyandu = $this->posyanduModel->getData($kdposyandu);
        $kdwilayah = $posyandu['kd_wilayah'];
        $wilayah = $this->posyanduModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'kelurahan' => $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi'],
            'posyandu' => $posyandu,
            'kdwilayah' => $kdwilayah,
        ];
        return view('laporan/users/posyandu/posyandulaporan', $data);
    }

    public function layananLaporanPosyandu($kdposyandu)
    {
        $posyandu = $this->posyanduModel->getData($kdposyandu);
        $kdwilayah = $posyandu['kd_wilayah'];
        $wilayah = $this->posyanduModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'posyandu' => $posyandu,
            'layanan' => $this->layananposyanduModel->getLayanan($kdposyandu),
            'kelurahan' =>  $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi'],
            'kdposyandu' => $kdposyandu,
            'kdwilayah' => $kdwilayah
        ];
        return view('laporan/users/posyandu/layananlaporan', $data);
    }

    public function rangePengunjungPosyandu($kdposyandu)
    {
        $posyandu = $this->posyanduModel->getData($kdposyandu);
        $namapos = $posyandu['nama_posyandu'];
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'kdposyandu' => $kdposyandu,
            'namapos' => $namapos,
            'datapengunjung' => $this->datapengunjungModel->getTanggal($kdposyandu),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/users/pengunjungposyandu/range', $data);
    }

    public function lihatPengunjungPosyandu($kdposyandu)
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $tahun1 = substr($awal, 0, 4);
        $tahun2 = substr($akhir, 0, 4);
        $btn = $this->request->getVar('aksi');
        if ($btn == "lihat") {
            $posyandu = $this->posyanduModel->getData($kdposyandu);
            $namapos = $posyandu['nama_posyandu'];
            $kdWilayah = $posyandu['kd_wilayah'];
            $wilayah = $this->posyanduModel->getWilayah($kdWilayah);;
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'users' => 'laporan',
                'awal' => $awal,
                'akhir' => $akhir,
                'kdposyandu' => $kdposyandu,
                'wilayah' => $wilayah,
                'namapos' => $namapos,
                'datapengunjung' => $this->datapengunjungModel->getRange($kdposyandu, $awal, $akhir),
                'total' => $this->datapengunjungModel->getTotalCetak($kdposyandu, $awal, $akhir),
                'tahun1' => $tahun1,
                'tahun2' => $tahun2
            ];
            return view('laporan/users/pengunjungposyandu/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to("/users/posyandulaporan/$kdposyandu");
        }
    }

    public function rangeKegiatanposyandu($kdposyandu)
    {
        $posyandu = $this->posyanduModel->getData($kdposyandu);
        $namapos = $posyandu['nama_posyandu'];
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'kdposyandu' => $kdposyandu,
            'namapos' => $namapos,
            'kegiatanA' => $this->kegiatanAModel->getTanggal($kdposyandu),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/users/kegiatanposyandu/range', $data);
    }

    public function lihatKegiatanposyandu($kdposyandu)
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $tahun1 = substr($awal, 0, 4);
        $tahun2 = substr($akhir, 0, 4);
        $btn = $this->request->getVar('aksi');
        if ($btn == "lihat") {
            $posyandu = $this->posyanduModel->getData($kdposyandu);
            $namapos = $posyandu['nama_posyandu'];
            $kdwilayah = $posyandu['kd_wilayah'];
            $wilayah = $this->posyanduModel->getWilayah($kdwilayah);
            $count = $this->kegiatanAModel->hitungLaporan($kdposyandu, $awal, $akhir);
            foreach ($count as $c) :
                $tahun = $c['jumlah'];
            endforeach;
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'users' => 'laporan',
                'namapos' => $namapos,
                'kdposyandu' => $kdposyandu,
                'wilayah' => $wilayah,
                'tahun1' => $tahun1,
                'tahun2' => $tahun2,
                'kdposyandu' => $kdposyandu,
                'hitung' => $tahun,
                'posyandu' => $posyandu,
                'awal' => $awal,
                'akhir' => $akhir,
                'kegiatanA' => $this->kegiatanAModel->getRange($kdposyandu, $awal, $akhir),
                'kegiatanB' => $this->kegiatanBModel->getRange($kdposyandu, $awal, $akhir),
                'totalA' => $this->kegiatanAModel->getTotalCetakA($kdposyandu, $awal, $akhir),
                'totalB' => $this->kegiatanBModel->getTotalCetakB($kdposyandu, $awal, $akhir)
            ];
            return view('laporan/users/kegiatanposyandu/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to("/users/posyandulaporan/$kdposyandu");
        }
    }

    public function wilayahKejarpaket()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'kejarpaket' => $this->kejarpaketModel->getWilayah()
        ];
        return view('laporan/users/kejarpaket/wilayahrange', $data);
    }

    public function rangeKejarpaket($kdwilayah)
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'kdwilayah' => $kdwilayah,
            'kejarpaket' => $this->kejarpaketModel->getTanggal($kdwilayah),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/users/kejarpaket/range', $data);
    }

    public function lihatKejarpaket($kdwilayah)
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $wilayah = $this->kejarpaketModel->getWilayah($kdwilayah);
        $btn = $this->request->getVar('aksi');
        if ($btn == "lihat") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'users' => 'laporan',
                'kejarpaket' => $this->kejarpaketModel->getRange($kdwilayah, $awal, $akhir),
                'awal' => $awal,
                'akhir' => $akhir,
                'kdwilayah' => $kdwilayah,
                'kelurahan' => $wilayah['kelurahan'],
                'kecamatan' => $wilayah['kecamatan'],
                'kabupaten' => $wilayah['kabupaten'],
                'provinsi' => $wilayah['provinsi']
            ];
            return view('laporan/users/kejarpaket/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/users/wilayahkejarpaket');
        }
    }

    public function wilayahKoperasi()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'wilayah' => $this->koperasiModel->getWilayah()
        ];
        return view('laporan/users/koperasi/wilayahkoperasi', $data);
    }

    public function lihatKoperasi($kdwilayah)
    {
        $wilayah = $this->koperasiModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'koperasi' => $this->koperasiModel->getKoperasi($kdwilayah),
            'users' => 'laporan',
            'kelurahan' => $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi'],
            'kdwilayah' => $kdwilayah
        ];
        return view('laporan/users/koperasi/lihatkoperasi', $data);
    }

    public function rangeManfaattanah()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'manfaattanah' => $this->manfaattanahModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/users/manfaattanah/range', $data);
    }

    public function lihatManfaattanah()
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $btn = $this->request->getVar('aksi');
        if ($btn == "lihat") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'users' => 'laporan',
                'manfaattanah' => $this->manfaattanahModel->getRange($awal, $akhir),
                'awal' => $awal,
                'akhir' => $akhir
            ];
            return view('laporan/users/manfaattanah/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/users/laporan');
        }
    }

    public function wilayahPelatihankader()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'wilayah' => $this->daftaranggotatppkkkaderModel->getWilayah()
        ];
        return view('laporan/users/pelatihankader/wilayahrange', $data);
    }

    public function rangePelatihankader($kdwilayah)
    {
        $wilayah = $this->daftaranggotatppkkkaderModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'pelatihan' => $this->daftaranggotatppkkkaderModel->getTanggal($kdwilayah),
            'kdwilayah' => $kdwilayah,
            'kelurahan' => $wilayah['kelurahan'],
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/users/pelatihankader/range', $data);
    }

    public function lihatPelatihankader($kdwilayah)
    {
        $wilayah = $this->daftaranggotatppkkkaderModel->getWilayah($kdwilayah);
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $tahun1 = substr($awal, 0, 4);
        $tahun2 = substr($akhir, 0, 4);
        $btn = $this->request->getVar('aksi');
        if ($btn == "lihat") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'users' => 'laporan',
                'pelatihan' => $this->daftaranggotatppkkkaderModel->getRange($kdwilayah, $awal, $akhir),
                'kdwilayah' => $kdwilayah,
                'kelurahan' => $wilayah['kelurahan'],
                'kecamatan' => $wilayah['kecamatan'],
                'kabupaten' => $wilayah['kabupaten'],
                'provinsi' => $wilayah['provinsi'],
                'tahun1' => $tahun1,
                'tahun2' => $tahun2,
                'awal' => $awal,
                'akhir' => $akhir
            ];
            return view('laporan/users/pelatihankader/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/users/wilayahpelatihankader');
        }
    }

    public function detailPelatihankader($noreg)
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $pelkader = $this->daftaranggotatppkkkaderModel->getData($noreg);
        $kdwilayah = $pelkader['kd_wilayah'];
        $wilayah = $this->daftaranggotatppkkkaderModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'pelatihan' => $this->daftaranggotatppkkkaderModel->getData($noreg),
            'datapelatihan' => $this->datapelatihankaderModel->getPelatihan($noreg),
            'kelurahan' => $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi'],
            'awal' => $awal,
            'akhir' => $akhir,
            'noreg' => $noreg,
            'kdwilayah' => $kdwilayah
        ];
        return view('laporan/users/pelatihankader/detailrange', $data);
    }

    public function tahunPokjaI()
    {
        $pokjaI = $this->pokjaIModel->getPokjaI();
        if ($pokjaI == null) {
            $th = "";

            $tot = ['total' => [
                'totalpkbn' => '',
                'totalpkdrt' => '',
                'totalpola' => '',
                'totalklppkbn' => '',
                'totalanggotapkbn' => '',
                'totalklppkdrt' => '',
                'totalanggotapkdrt' => '',
                'totalklppola' => '',
                'totalanggotapola' => '',
                'totalklplansia' => '',
                'totalanggotalansia' => '',
                'totalklpbakti' => '',
                'totalklpagama' => '',
                'totalklpmati' => '',
                'totalklpjimpit' => '',
                'totalklparisan' => ''
            ]];
            $total = $tot;
            $data = [
                'tittle' => 'Pokja I',
                'users' => 'pokja',
                'tingkat' => "",
                'tahun' => "",
                'pokjaI' => $this->pokjaIModel->getData($th),
                'total' => $total
            ];
            return view('laporan/users/pokjaI/detail', $data);
        } elseif ($pokjaI != null) {
            $data = [
                'tittle' => 'Pokja I',
                'users' => 'pokja',
                'tahun' => $this->pokjaIModel->getTahun(),
            ];
            return view('laporan/users/pokjaI/index', $data);
        }
    }

    public function detailPokjaI()
    {
        $tahun = $this->request->getVar('tahun');
        $data = [
            'tittle' => 'Pokja I',
            'users' => 'pokja',
            'tahun' => $tahun,
            'pokjaI' => $this->pokjaIModel->getData($tahun),
            'wilayah' =>  $this->pokjaIModel->getWilayah(),
            'total' => $this->pokjaIModel->getTotal($tahun),
        ];
        return view('laporan/users/pokjaI/detail', $data);
    }

    public function rangePokjaI()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'pokjaI' => $this->pokjaIModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/users/pokjaI/range', $data);
    }

    public function lihatPokjaI()
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $tahun1 = substr($awal, 0, 4);
        $tahun2 = substr($akhir, 0, 4);
        $btn = $this->request->getVar('aksi');
        if ($btn == "lihat") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'users' => 'laporan',
                'awal' => $awal,
                'akhir' => $akhir,
                'pokjaI' => $this->pokjaIModel->getRange($awal, $akhir),
                'wilayah' => $this->pokjaIModel->getWilayah(),
                'total' => $this->pokjaIModel->getTotalCetak($awal, $akhir),
                'tahun1' => $tahun1,
                'tahun2' => $tahun2
            ];
            return view('laporan/users/pokjaI/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/users/laporan');
        }
    }

    public function tahunPokjaII()
    {
        $pokjaII = $this->pokjaIIModel->getPokjaII();
        if ($pokjaII == null) {
            $nama = "";
            $th = "";
            $tot = ['total' => [
                'totalbuta' => '',
                'totalklpa' => '',
                'totalpaketA' => '',
                'totalklpB' => '',
                'totalpaketB' => '',
                'totalklpC' => '',
                'totalpaketC' => '',
                'totalklpKF' => '',
                'totalpaketKF' => '',
                'totalklppaud' => '',
                'totalperpus' => '',
                'totalklpbkb' => '',
                'totalpesertabkb' => '',
                'totalapebkb' => '',
                'totalsimulasibkb' => '',
                'totaltutoKF' => '',
                'totalpaudkader' => '',
                'totalbkbkader' => '',
                'totalkoperasikader' => '',
                'totalktrmpilankader' => '',
                'totallp3kader' => '',
                'totaltpk3kader' => '',
                'totaldamaskader' => '',
                'totalklppemula' => '',
                'totalpsrtpemula' => '',
                'totalklpmadya' => '',
                'totalpsrtmadya' => '',
                'totalklputama' => '',
                'totalpsrtutama' => '',
                'totalklpmandiri' => '',
                'totalpsrtmandiri' => '',
                'totalklphkm' => '',
                'totalanggotahkm' => ''
            ]];
            $total = $tot;
            $data = [
                'tittle' => 'Pokja II',
                'users' => 'pokja',
                'tingkat' => '',
                'tahun' => '',
                'pokjaII' => $this->pokjaIIModel->getData($nama, $th),
                'total' => $total
            ];
            return view('laporan/users/pokjaII/detail', $data);
        } elseif ($pokjaII != null) {
            $data = [
                'tittle' => 'Pokja II',
                'users' => 'pokja',
                'tahun' => $this->pokjaIIModel->getTahun(),
            ];
            return view('laporan/users/pokjaII/index', $data);
        }
    }


    public function detailPokjaII()
    {
        $tahun = $this->request->getVar('tahun');
        $data = [
            'tittle' => 'Pokja II',
            'users' => 'pokja',
            'tahun' => $tahun,
            'pokjaII' => $this->pokjaIIModel->getData($tahun),
            'wilayah' => $this->pokjaIIModel->getWilayah(),
            'total' => $this->pokjaIIModel->getTotal($tahun)
        ];
        return view('laporan/users/pokjaII/detail', $data);
    }

    public function rangePokjaII()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'pokjaII' => $this->pokjaIIModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];

        return view('laporan/users/pokjaII/range', $data);
    }

    public function lihatPokjaII()
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $tahun1 = substr($awal, 0, 4);
        $tahun2 = substr($akhir, 0, 4);
        $btn = $this->request->getVar('aksi');
        if ($btn == "print") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'users' => 'laporan',
                'pokjaII' => $this->pokjaIIModel->getRange($awal, $akhir),
                'wilayah' => $this->pokjaIIModel->getWilayah(),
                'total' => $this->pokjaIIModel->getTotalCetak($awal, $akhir),
                'tahun1' => $tahun1,
                'tahun2' => $tahun2,
                'awal' => $awal,
                'akhir' => $akhir
            ];
            return view('laporan/users/pokjaII/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/users/laporan');
        }
    }

    public function tahunPokjaIII()
    {
        $pokjaIII = $this->pokjaIIIModel->getPokjaIII();
        if ($pokjaIII == null) {
            $nama = "";
            $th = "";
            $tot = ['total' => [
                'totalkaderpangan' => '',
                'totalkadersandang' => '',
                'totalkadertatart' => '',
                'totalmknberas' => '',
                'totalmknnonberas' => '',
                'totalternak' => '',
                'totalikan' => '',
                'totalwarung' => '',
                'totallumbung' => '',
                'totaltoga' => '',
                'totaltnmkeras' => '',
                'totalindpangan' => '',
                'totalindsandang' => '',
                'totalindjasa' => '',
                'totalrmhlayak' => '',
                'totalrmhtdklayak' => ''
            ]];
            $total = $tot;
            $data = [
                'tittle' => 'Pokja III',
                'users' => 'pokja',
                'tingkat' => '',
                'tahun' => '',
                'pokjaIII' => $this->pokjaIIIModel->getData($nama, $th),
                'total' => $total
            ];
            return view('laporan/users/pokjaIII/detail', $data);
        } elseif ($pokjaIII != null) {
            $data = [
                'tittle' => 'Pokja III',
                'users' => 'pokja',
                'tahun' => $this->pokjaIIIModel->getTahun()
            ];
            return view('laporan/users/pokjaIII/index', $data);
        }
    }

    public function detailPokjaIII()
    {
        $tahun = $this->request->getVar('tahun');
        $data = [
            'tittle' => 'Pokja III',
            'users' => 'pokja',
            'tahun' => $tahun,
            'pokjaIII' => $this->pokjaIIIModel->getData($tahun),
            'wilayah' => $this->pokjaIIIModel->getWilayah(),
            'total' => $this->pokjaIIIModel->getTotal($tahun)
        ];
        return view('laporan/users/pokjaIII/detail', $data);
    }

    public function rangePokjaIII()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'pokjaIII' => $this->pokjaIIIModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/users/pokjaIII/range', $data);
    }

    public function lihatPokjaIII()
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $tahun1 = substr($awal, 0, 4);
        $tahun2 = substr($akhir, 0, 4);
        $btn = $this->request->getVar('aksi');
        if ($btn == "print") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'users' => 'laporan',
                'pokjaIII' => $this->pokjaIIIModel->getRange($awal, $akhir),
                'wilayah' => $this->pokjaIIIModel->getWilayah(),
                'total' => $this->pokjaIIIModel->getTotalCetak($awal, $akhir),
                'tahun1' => $tahun1,
                'tahun2' => $tahun2,
                'awal' => $awal,
                'akhir' => $akhir
            ];
            return view('laporan/users/pokjaIII/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/users/laporan');
        }
    }

    public function tahunPokjaIV()
    {
        $pokjaIV = $this->pokjaIVModel->getPokjaIV();
        if ($pokjaIV == null) {
            $nama = "";
            $th = "";
            $tot = ['total' => [
                'totalkaderpos' => '',
                'totalkadergizi' => '',
                'totalkaderkesling' => '',
                'totalkadernarkoba' => '',
                'totalkaderphbs' => '',
                'totalkaderkb' => '',
                'totalposyandu' => '',
                'totalposterinteg' => '',
                'totalklplansia' => '',
                'totalanggotalansia' => '',
                'totalkartulansia' => '',
                'totalrmhjamban' => '',
                'totalrmhspal' => '',
                'totalrmhsampah' => '',
                'totalmck' => '',
                'totalpdam' => '',
                'totalsumur' => '',
                'totalairlain' => '',
                'totalpus' => '',
                'totalwus' => '',
                'totalakseptorL' => '',
                'totalakseptorP' => '',
                'totaltabungan' => ''
            ]];
            $total = $tot;
            $data = [
                'tittle' => 'Pokja IV',
                'users' => 'pokja',
                'tahun' => '',
                'pokjaIV' => $this->pokjaIVModel->getData($nama, $th),
                'total' => $total
            ];
            return view('laporan/users/pokjaIV/detail', $data);
        } elseif ($pokjaIV != null) {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'users' => 'pokja',
                'tahun' => $this->pokjaIVModel->getTahun()
            ];
            return view('laporan/users/pokjaIV/index', $data);
        }
    }

    public function detailPokjaIV()
    {
        $tahun = $this->request->getVar('tahun');
        $data = [
            'tittle' => 'Pokja IV',
            'users' => 'pokja',
            'tahun' => $tahun,
            'pokjaIV' => $this->pokjaIVModel->getData($tahun),
            'wilayah' => $this->pokjaIVModel->getWilayah(),
            'total' => $this->pokjaIVModel->getTotal($tahun)
        ];
        return view('laporan/users/pokjaIV/detail', $data);
    }

    public function rangePokjaIV()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'pokjaIV' => $this->pokjaIVModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];

        return view('laporan/users/pokjaIV/range', $data);
    }

    public function lihatPokjaIV()
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $tahun1 = substr($awal, 0, 4);
        $tahun2 = substr($akhir, 0, 4);
        $btn = $this->request->getVar('aksi');
        if ($btn == "print") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'users' => 'laporan',
                'pokjaIV' => $this->pokjaIVModel->getRange($awal, $akhir),
                'wilayah' => $this->pokjaIVModel->getWilayah(),
                'total' => $this->pokjaIVModel->getTotalCetak($awal, $akhir),
                'tahun1' => $tahun1,
                'tahun2' => $tahun2,
                'awal' => $awal,
                'akhir' => $akhir
            ];
            return view('laporan/users/pokjaIV/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/users/laporan');
        }
    }

    public function wilayahSimulasi()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'simulasi' => $this->simulasiModel->getWilayah()
        ];
        return view('laporan/users/simulasi/wilayahrange', $data);
    }

    public function rangeSimulasi($kdwilayah)
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'kdwilayah' => $kdwilayah,
            'simulasi' => $this->simulasiModel->getTanggal($kdwilayah),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/users/simulasi/range', $data);
    }

    public function lihatSimulasi($kdwilayah)
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $wilayah = $this->simulasiModel->getWilayah($kdwilayah);
        $btn = $this->request->getVar('aksi');
        if ($btn == "lihat") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'users' => 'laporan',
                'simulasi' => $this->simulasiModel->getRange($kdwilayah, $awal, $akhir),
                'awal' => $awal,
                'akhir' => $akhir,
                'kdwilayah' => $kdwilayah,
                'kelurahan' => $wilayah['kelurahan'],
                'kecamatan' => $wilayah['kecamatan'],
                'kabupaten' => $wilayah['kabupaten'],
                'provinsi' => $wilayah['provinsi']
            ];
            return view('laporan/users/simulasi/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/users/wilayahsimulasi');
        }
    }

    public function rangeSuratkeluar()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'suratkeluar' => $this->suratkeluarModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/users/suratkeluar/range', $data);
    }

    public function lihatSuratkeluar()
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $btn = $this->request->getVar('aksi');
        if ($btn == "lihat") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'users' => 'laporan',
                'suratkeluar' => $this->suratkeluarModel->getRange($awal, $akhir),
                'awal' => $awal,
                'akhir' => $akhir
            ];
            return view('laporan/users/suratkeluar/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/users/laporan');
        }
    }

    public function rangeSuratmasuk()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'suratmasuk' => $this->suratmasukModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/users/suratmasuk/range', $data);
    }

    public function lihatSuratmasuk()
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $btn = $this->request->getVar('aksi');
        if ($btn == "lihat") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'users' => 'laporan',
                'suratmasuk' => $this->suratmasukModel->getRange($awal, $akhir),
                'awal' => $awal,
                'akhir' => $akhir
            ];
            return view('laporan/users/suratmasuk/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/users/laporan');
        }
    }

    public function wilayahTamanbacaan()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'wilayah' => $this->tamanbacaanModel->getWilayah()
        ];
        return view('laporan/users/tamanbacaan/wilayahrange', $data);
    }

    public function rangeJenisBuku($kdtaman)
    {
        $taman = $this->tamanbacaanModel->getData($kdtaman);
        $kdwilayah = $taman['kd_wilayah'];
        $wilayah = $this->tamanbacaanModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'taman' => $this->tamanbacaanModel->getData($kdtaman),
            'buku' => $this->jenisbukuModel->getBuku($kdtaman),
            'kelurahan' => $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi'],
            'kdtaman' => $kdtaman,
            'kdwilayah' => $kdwilayah
        ];
        return view('laporan/users/tamanbacaan/rangejenisbuku', $data);
    }

    public function detailTamanbacaan($kdwilayah)
    {
        $wilayah = $this->tamanbacaanModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'kelurahan' => $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi'],
            'taman' => $this->tamanbacaanModel->getTaman($kdwilayah),
            'kdwilayah' => $kdwilayah
        ];
        return view('laporan/users/tamanbacaan/detailrange', $data);
    }

    public function rangeUangkeluar()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'uangkeluar' => $this->uangkeluarModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/users/uangkeluar/range', $data);
    }

    public function lihatUangkeluar()
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $btn = $this->request->getVar('aksi');
        if ($btn == "lihat") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'users' => 'laporan',
                'uangkeluar' => $this->uangkeluarModel->getRange($awal, $akhir),
                'total' => $this->uangkeluarModel->getTotal($awal, $akhir),
                'awal' => $awal,
                'akhir' => $akhir
            ];
            return view('laporan/users/uangkeluar/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/users/laporan');
        }
    }

    public function rangeUangmasuk()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'users' => 'laporan',
            'uangmasuk' => $this->uangmasukModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/users/uangmasuk/range', $data);
    }

    public function lihatUangmasuk()
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $btn = $this->request->getVar('aksi');
        if ($btn == "lihat") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'users' => 'laporan',
                'uangmasuk' => $this->uangmasukModel->getRange($awal, $akhir),
                'total' => $this->uangmasukModel->getTotal($awal, $akhir),
                'awal' => $awal,
                'akhir' => $akhir
            ];
            return view('laporan/users/uangmasuk/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/users/laporan');
        }
    }
}
