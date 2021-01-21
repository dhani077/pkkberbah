<?php

namespace App\Controllers;

use App\Models\PosyanduModel;
use App\Models\LayananposyanduModel;
use App\Models\DatapengunjungposyanduModel;
use App\Models\kegiatanposyanduAModel;

class PosyanduCon extends BaseController
{
    protected $posyanduModel;
    protected $layananposyanduModel;
    protected $datapengunjungModel;
    protected $kegiatanAModel;

    public function __construct()
    {
        $this->posyanduModel = new PosyanduModel();
        $this->layananposyanduModel = new LayananposyanduModel();
        $this->datapengunjungModel = new DatapengunjungposyanduModel();
        $this->kegiatanAModel = new kegiatanposyanduAModel();
    }

    public function index()
    {
        $data = [
            'tittle' => 'Posyandu',
            'PagesAdmin' => 'pendataan',
            'posyandu' => $this->posyanduModel->getWilayah()
        ];
        return view('laporan/admin/posyandu/index', $data);
    }

    public function jenislayanan($kdPosyandu)
    {
        $posyandu = $this->posyanduModel->getData($kdPosyandu);
        $kdwilayah = $posyandu['kd_wilayah'];
        $wilayah = $this->posyanduModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Posyandu',
            'PagesAdmin' => 'pendataan',
            'posyandu' => $posyandu,
            'layanan' => $this->layananposyanduModel->getLayanan($kdPosyandu),
            'kelurahan' =>  $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi'],
            'kdPosyandu' => $kdPosyandu,
            'kdwilayah' => $kdwilayah
        ];
        return view('laporan/admin/posyandu/jenislayanan', $data);
    }

    public function detail($kdwilayah)
    {
        $wilayah = $this->posyanduModel->getWilayah($kdwilayah);
        $posyandu = $this->posyanduModel->getPosyandu($kdwilayah);
        $data = [
            'tittle' => 'Posyandu',
            'PagesAdmin' => 'pendataan',
            'kelurahan' =>  $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi'],
            'posyandu' => $posyandu,
            'kdwilayah' => $kdwilayah
        ];
        return view('laporan/admin/posyandu/detail', $data);
    }

    public function pengunjungLayanan($num)
    {
        $posyandu = $this->posyanduModel->getData($num);
        $kdwilayah = $posyandu['kd_wilayah'];
        $wilayah = $this->posyanduModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Posyandu',
            'PagesAdmin' => 'pendataan',
            'kelurahan' => $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi'],
            'posyandu' => $posyandu,
            'kdwilayah' => $kdwilayah,
        ];
        return view('laporan/admin/posyandu/pengunjunglayanankegiatan', $data);
    }

    public function create($num)
    {
        $wilayah = $this->posyanduModel->getWilayah($num);
        $kelurahan = $wilayah['kelurahan'];
        session();
        $data = [
            'tittle' => 'Posyandu',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'kelurahan' => $kelurahan,
            'kdwilayah' => $num
        ];
        return view('laporan/admin/posyandu/create', $data);
    }

    public function createLayanan($kdPosyandu)
    {
        $posyandu = $this->posyanduModel->getData($kdPosyandu);
        session();
        $data = [
            'tittle' => 'Posyandu',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'kdPosyandu' => $kdPosyandu,
            'posyandu' => $posyandu
        ];
        return view('laporan/admin/posyandu/createlayanan', $data);
    }

    public function save()
    {
        $kdwilayah = $this->request->getVar('kd_wilayah');
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'nama_posyandu' => [
                    'rules' => 'required[posyandu.nama_posyandu]',
                    'errors' => [
                        'required' => 'Nama posyandu harus diisi!'
                    ]
                ],
                'pengelola' => [
                    'rules' => 'required[posyandu.pengelola]',
                    'errors' => [
                        'required' => 'Pengelola harus diisi!'
                    ]
                ],
                'sekretaris' => [
                    'rules' => 'required[posyandu.sekretaris]',
                    'errors' => [
                        'required' => 'Sekretaris harus diisi!'
                    ]
                ],
                'jns_posyandu' => [
                    'rules' => 'required[posyandu.jns_posyandu]',
                    'errors' => [
                        'required' => 'Jenis posyandu harus diisi!'
                    ]
                ],
                'jml_kader' => [
                    'rules' => 'required[posyandu.jml_kader]',
                    'errors' => [
                        'required' => 'Jumlah kader harus diisi!'
                    ]
                ]
            ])) {
                return redirect()->to("/posyandu/create/$kdwilayah")->withInput();
            }
            $data = [
                'kd_wilayah' => $kdwilayah,
                'nama_posyandu' => $this->request->getVar('nama_posyandu'),
                'pengelola' => $this->request->getVar('pengelola'),
                'sekretaris' => $this->request->getVar('sekretaris'),
                'jns_posyandu' => $this->request->getVar('jns_posyandu'),
                'jml_kader' => $this->request->getVar('jml_kader')
            ];
            $this->posyanduModel->save($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
            return redirect()->to("/posyandu/detail/$kdwilayah");
        } elseif ($btn == "batal") {
            return redirect()->to("/posyandu/detail/$kdwilayah");
        }
    }

    public function saveLayanan($kdPosyandu)
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'jns_kegiatan' => [
                    'rules' => 'required[layananposyandu.jns_kegiatan]',
                    'errors' => [
                        'required' => 'jenis kegiatan/layanan harus diisi'
                    ]
                ],
                'frekwensi_layanan' => [
                    'rules' => 'required[layananposyandu.frekwensi_layanan]',
                    'errors' => [
                        'required' => 'Frekwensi layanan harus diisi'
                    ]
                ],
                'jml_pengunjung_L' => [
                    'rules' => 'required[layananposyandu.jml_pengunjung_L]',
                    'errors' => [
                        'required' => 'Jumlah pengunjung (L) harus diisi'
                    ]
                ],
                'jml_pengunjung_P' => [
                    'rules' => 'required[layananposyandu.jml_pengunjung_P]',
                    'errors' => [
                        'required' => 'Jumlah pengunjung (P) harus diisi'
                    ]
                ],
                'jml_petugas_L' => [
                    'rules' => 'required[layananposyandu.jml_petugas_L]',
                    'errors' => [
                        'required' => 'Jumlah petugas (L) harus diisi'
                    ]
                ],
                'jml_petugas_P' => [
                    'rules' => 'required[layananposyandu.jml_petugas_P]',
                    'errors' => [
                        'required' => 'Jumlah petugas (P) harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to("/posyandu/createlayanan/$kdPosyandu")->withInput();
            }
            $data = [
                'kd_posyandu' => $kdPosyandu,
                'jns_kegiatan' => $this->request->getVar('jns_kegiatan'),
                'frekwensi_layanan' => $this->request->getVar('frekwensi_layanan'),
                'jml_pengunjung_L' => $this->request->getVar('jml_pengunjung_L'),
                'jml_pengunjung_P' => $this->request->getVar('jml_pengunjung_P'),
                'jml_petugas_L' => $this->request->getVar('jml_petugas_L'),
                'jml_petugas_P' => $this->request->getVar('jml_petugas_P'),
                'keterangan' => $this->request->getVar('keterangan')
            ];
            $this->layananposyanduModel->save($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
            return redirect()->to("/posyandu/jenislayanan/$kdPosyandu");
        } elseif ($btn == "batal") {
            return redirect()->to("/posyandu/jenislayanan/$kdPosyandu");
        }
    }


    public function delete($kdPosyandu)
    {
        $th = "";
        $pengunjung = $this->datapengunjungModel->getDatapengunjungposyandu($kdPosyandu, $th);
        $layanan = $this->layananposyanduModel->getLayanan($kdPosyandu);
        $kegiatan = $this->kegiatanAModel->getKegiatanA($kdPosyandu);
        $wilayah = $this->posyanduModel->getData($kdPosyandu);
        $kdwilayah = $wilayah['kd_wilayah'];
        if ($pengunjung != null || $kegiatan != null || $layanan != null) {
            session()->setFlashdata('gagal', "Data gagal dihapus pada posyandu $wilayah[nama_posyandu] dikarenakan masih ada data-data detail posyandu.");
            return redirect()->to("/posyandu/detail/$kdwilayah");
        } elseif ($pengunjung == null && $kegiatan == null && $layanan == null) {
            $this->posyanduModel->where('kd_posyandu', $kdPosyandu)->delete();
            session()->setFlashdata('pesan', 'Data berhasil dihapus.');
            return redirect()->to("/posyandu/detail/$kdwilayah");
        }
    }

    public function deleteLayanan($no)
    {
        $layanan = $this->layananposyanduModel->getData($no);
        $kdposyandu = $layanan['kd_posyandu'];
        $this->layananposyanduModel->where('no', $no)->delete();
        session()->setFlashdata('hapus', 'Data berhasil dihapus.');
        return redirect()->to("/posyandu/jenislayanan/$kdposyandu");
    }

    public function edit($kdposyandu)
    {
        $data = [
            'tittle' => 'Posyandu',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'posyandu' => $this->posyanduModel->getData($kdposyandu)
        ];
        return view('laporan/admin/posyandu/edit', $data);
    }

    public function editLayanan($no)
    {
        $layanan = $this->layananposyanduModel->getData($no);
        $kdposyandu = $layanan['kd_posyandu'];
        $nama = $this->posyanduModel->getData($kdposyandu);
        $data = [
            'tittle' => 'Posyandu',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'layanan' => $layanan,
            'posyandu' => $nama
        ];
        return view('laporan/admin/posyandu/editlayanan', $data);
    }

    public function update($kdposyandu)
    {
        $kdwilayah = $this->request->getVar('kd_wilayah');
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            if (!$this->validate([
                'nama_posyandu' => [
                    'rules' => 'required[posyandu.nama_posyandu]',
                    'errors' => [
                        'required' => 'Nama posyandu harus diisi!'
                    ]
                ],
                'pengelola' => [
                    'rules' => 'required[posyandu.pengelola]',
                    'errors' => [
                        'required' => 'Pengelola harus diisi!'
                    ]
                ],
                'sekretaris' => [
                    'rules' => 'required[posyandu.sekretaris]',
                    'errors' => [
                        'required' => 'Sekretaris harus diisi!'
                    ]
                ],
                'jns_posyandu' => [
                    'rules' => 'required[posyandu.jns_posyandu]',
                    'errors' => [
                        'required' => 'Jenis posyandu harus diisi!'
                    ]
                ],
                'jml_kader' => [
                    'rules' => 'required[posyandu.jml_kader]',
                    'errors' => [
                        'required' => 'Jumlah kader harus diisi!'
                    ]
                ]
            ])) {
                return redirect()->to("/posyandu/edit/$kdposyandu")->withInput();
            }
            $data = [
                'kd_wilayah' => $kdwilayah,
                'nama_posyandu' => $this->request->getVar('nama_posyandu'),
                'pengelola' => $this->request->getVar('pengelola'),
                'sekretaris' => $this->request->getVar('sekretaris'),
                'jns_posyandu' => $this->request->getVar('jns_posyandu'),
                'jml_kader' => $this->request->getVar('jml_kader')
            ];
            $this->posyanduModel->where('kd_posyandu', $kdposyandu)->set($data)->update();
            session()->setFlashdata('pesan', 'Data berhasil diubah.');
            return redirect()->to("/posyandu/detail/$kdwilayah");
        } elseif ($btn == "batal") {
            return redirect()->to("/posyandu/detail/$kdwilayah");
        }
    }

    public function updateLayanan($no)
    {
        $kdposyandu = $this->request->getVar('kd_posyandu');
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            if (!$this->validate([
                'jns_kegiatan' => [
                    'rules' => 'required[layananposyandu.jns_kegiatan]',
                    'errors' => [
                        'required' => 'jenis kegiatan/layanan harus diisi'
                    ]
                ],
                'frekwensi_layanan' => [
                    'rules' => 'required[layananposyandu.frekwensi_layanan]',
                    'errors' => [
                        'required' => 'Frekwensi layanan harus diisi'
                    ]
                ],
                'jml_pengunjung_L' => [
                    'rules' => 'required[layananposyandu.jml_pengunjung_L]',
                    'errors' => [
                        'required' => 'Jumlah pengunjung (L) harus diisi'
                    ]
                ],
                'jml_pengunjung_P' => [
                    'rules' => 'required[layananposyandu.jml_pengunjung_P]',
                    'errors' => [
                        'required' => 'Jumlah pengunjung (P) harus diisi'
                    ]
                ],
                'jml_petugas_L' => [
                    'rules' => 'required[layananposyandu.jml_petugas_L]',
                    'errors' => [
                        'required' => 'Jumlah petugas (L) harus diisi'
                    ]
                ],
                'jml_petugas_P' => [
                    'rules' => 'required[layananposyandu.jml_petugas_P]',
                    'errors' => [
                        'required' => 'Jumlah petugas (P) harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to("/posyandu/editlayanan/$no")->withInput();
            }
            $data = [
                'kd_posyandu' => $kdposyandu,
                'jns_kegiatan' => $this->request->getVar('jns_kegiatan'),
                'frekwensi_layanan' => $this->request->getVar('frekwensi_layanan'),
                'jml_pengunjung_L' => $this->request->getVar('jml_pengunjung_L'),
                'jml_pengunjung_P' => $this->request->getVar('jml_pengunjung_P'),
                'jml_petugas_L' => $this->request->getVar('jml_petugas_L'),
                'jml_petugas_P' => $this->request->getVar('jml_petugas_P'),
                'keterangan' => $this->request->getVar('keterangan')
            ];
            $this->layananposyanduModel->where('no', $no)->set($data)->update();
            session()->setFlashdata('pesan', 'Data berhasil diubah.');
            return redirect()->to("/posyandu/jenislayanan/$kdposyandu");
        } elseif ($btn == "batal") {
            return redirect()->to("/posyandu/jenislayanan/$kdposyandu");
        }
    }

    public function indexLaporan()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'posyandu' => $this->posyanduModel->getWilayah()
        ];
        return view('laporan/admin/posyandu/indexlaporan', $data);
    }

    public function detailLaporan($kdwilayah)
    {
        $wilayah = $this->posyanduModel->getWilayah($kdwilayah);
        $posyandu = $this->posyanduModel->getPosyandu($kdwilayah);
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'kelurahan' =>  $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi'],
            'posyandu' => $posyandu,
            'kdwilayah' => $kdwilayah,
        ];
        return view('laporan/admin/posyandu/detaillaporan', $data);
    }

    public function posyanduLaporan($num)
    {
        $posyandu = $this->posyanduModel->getData($num);
        $kdwilayah = $posyandu['kd_wilayah'];
        $wilayah = $this->posyanduModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'kelurahan' => $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi'],
            'posyandu' => $posyandu,
            'kdwilayah' => $kdwilayah,
        ];
        return view('laporan/admin/posyandu/posyandulaporan', $data);
    }

    public function layananLaporan($kdPosyandu)
    {
        $posyandu = $this->posyanduModel->getData($kdPosyandu);
        $kdwilayah = $posyandu['kd_wilayah'];
        $wilayah = $this->posyanduModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'posyandu' => $posyandu,
            'layanan' => $this->layananposyanduModel->getLayanan($kdPosyandu),
            'kelurahan' =>  $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi'],
            'kdPosyandu' => $kdPosyandu,
            'kdwilayah' => $kdwilayah
        ];
        return view('laporan/admin/posyandu/layananlaporan', $data);
    }

    public function printLayanan($kdPosyandu)
    {
        $posyandu = $this->posyanduModel->getData($kdPosyandu);
        $kdwilayah = $posyandu['kd_wilayah'];
        $wilayah = $this->posyanduModel->getWilayah($kdwilayah);
        $data = [
            'posyandu' => $posyandu,
            'layanan' => $this->layananposyanduModel->getLayanan($kdPosyandu),
            'kelurahan' =>  $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi'],
            'kdPosyandu' => $kdPosyandu,
            'kdwilayah' => $kdwilayah
        ];
        return view('laporan/admin/posyandu/printlayanan', $data);
    }
}
