<?php

namespace App\Controllers;

use App\Models\TamanbacaanModel;
use App\Models\JenisbukuModel;

class TamanbacaanCon extends BaseController
{
    protected $tamanbacaanModel;
    protected $jenisbukuModel;

    public function __construct()
    {
        $this->tamanbacaanModel = new TamanbacaanModel();
        $this->jenisbukuModel = new JenisbukuModel();
    }

    public function index()
    {
        $data = [
            'tittle' => 'Taman Bacaan',
            'PagesAdmin' => 'pendataan',
            'wilayah' => $this->tamanbacaanModel->getWilayah()
        ];
        return view('laporan/admin/tamanbacaan/index', $data);
    }

    public function jenisBuku($kdtaman)
    {
        $taman = $this->tamanbacaanModel->getData($kdtaman);
        $kdwilayah = $taman['kd_wilayah'];
        $wilayah = $this->tamanbacaanModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Taman Bacaan',
            'PagesAdmin' => 'pendataan',
            'taman' => $this->tamanbacaanModel->getData($kdtaman),
            'buku' => $this->jenisbukuModel->getBuku($kdtaman),
            'kelurahan' => $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi'],
            'kdtaman' => $kdtaman,
            'kdwilayah' => $kdwilayah
        ];
        return view('laporan/admin/tamanbacaan/jenisbuku', $data);
    }

    public function detail($kdwilayah)
    {
        $wilayah = $this->tamanbacaanModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Taman Bacaan',
            'PagesAdmin' => 'pendataan',
            'kelurahan' => $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi'],
            'taman' => $this->tamanbacaanModel->getTaman($kdwilayah),
            'kdwilayah' => $kdwilayah
        ];
        return view('laporan/admin/tamanbacaan/detail', $data);
    }

    public function create($kdwilayah)
    {
        session();
        $wilayah = $this->tamanbacaanModel->getWilayah($kdwilayah);
        $kelurahan = $wilayah['kelurahan'];
        $data = [
            'tittle' => 'Taman Bacaan',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'kelurahan' => $kelurahan,
            'kdwilayah' => $kdwilayah
        ];
        return view('laporan/admin/tamanbacaan/create', $data);
    }

    public function createBuku($kdtaman)
    {
        session();
        $data = [
            'tittle' => 'Taman Bacaan',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'kdtaman' => $kdtaman
        ];
        return view('laporan/admin/tamanbacaan/createbuku', $data);
    }

    public function save($kdwilayah)
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'nama_taman' => [
                    'rules' => 'required[tamanbacaan.nama_taman]',
                    'errors' => [
                        'required' => 'Nama taman harus diisi'
                    ]
                ],
                'pengelola' => [
                    'rules' => 'required[tamanbacaan.pengelola]',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'jml_buku' => [
                    'rules' => 'required[tamanbacaan.jml_buku]',
                    'errors' => [
                        'required' => 'Jumlah buku harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to("/tamanbacaan/create/$kdwilayah")->withInput();
            }
            $data = [
                'kd_wilayah' => $kdwilayah,
                'nama_taman' => $this->request->getVar('nama_taman'),
                'pengelola' => $this->request->getVar('pengelola'),
                'jml_buku' => $this->request->getVar('jml_buku')
            ];
            $this->tamanbacaanModel->save($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
            return redirect()->to("/tamanbacaan/detail/$kdwilayah");
        } elseif ($btn == "batal") {
            return redirect()->to("/tamanbacaan/detail/$kdwilayah");
        }
    }

    public function saveBuku($kdtaman)
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'jns_buku' => [
                    'rules' => 'required[jenisbuku.jns_buku]',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'kategori' => [
                    'rules' => 'required[jenisbuku.kategori]',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'jumlah' => [
                    'rules' => 'required[jenisbuku.jumlah]',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to("/tamanbacaan/createbuku/$kdtaman")->withInput();
            }
            $data = [
                'kd_taman' => $kdtaman,
                'jns_buku' => $this->request->getVar('jns_buku'),
                'kategori' => $this->request->getVar('kategori'),
                'jumlah' => $this->request->getVar('jumlah')
            ];
            $this->jenisbukuModel->save($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
            return redirect()->to("/tamanbacaan/jenisbuku/$kdtaman");
        } elseif ($btn == "batal") {
            return redirect()->to("/tamanbacaan/jenisbuku/$kdtaman");
        }
    }

    public function delete($kdtaman)
    {
        $buku = $this->jenisbukuModel->getBuku($kdtaman);
        $kd = $this->tamanbacaanModel->getData($kdtaman);
        $wil = $kd['kd_wilayah'];
        if ($buku != null) {
            session()->setFlashdata('gagal', "Data gagal dihapus pada taman bacaan/perpustakaan $kd[nama_taman] dikarenakan masih ada data jenis buku bacaan.");
            return redirect()->to("/tamanbacaan/detail/$wil");
        } elseif ($buku == null) {
            $this->tamanbacaanModel->where('kd_taman', $kdtaman)->delete();
            session()->setFlashdata('hapus', 'Data berhasil dihapus.');
            return redirect()->to("/tamanbacaan/detail/$wil");
        }
    }

    public function deleteBuku($nobuku)
    {
        $buku = $this->jenisbukuModel->getData($nobuku);
        $kdtaman = $buku['kd_taman'];
        $this->jenisbukuModel->where('no_buku', $nobuku)->delete();
        session()->setFlashdata('hapus', 'Data berhasil dihapus.');
        return redirect()->to("/tamanbacaan/jenisbuku/$kdtaman");
    }

    public function edit($kdtaman)
    {
        $taman = $this->tamanbacaanModel->getData($kdtaman);
        $kdwilayah = $taman['kd_wilayah'];
        $wilayah = $this->tamanbacaanModel->getWilayah($kdwilayah);
        $kelurahan = $wilayah['kelurahan'];
        $data = [
            'tittle' => 'Taman Bacaan',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'taman' => $this->tamanbacaanModel->getData($kdtaman),
            'kelurahan' => $kelurahan
        ];
        return view('laporan/admin/tamanbacaan/edit', $data);
    }

    public function editBuku($nobuku)
    {
        $data = [
            'tittle' => 'Taman Bacaan',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'buku' => $this->jenisbukuModel->getData($nobuku)
        ];
        return view('laporan/admin/tamanbacaan/editbuku', $data);
    }

    public function update($kdtaman)
    {
        $kd = $this->request->getVar('kd_wilayah');
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            if (!$this->validate([
                'nama_taman' => [
                    'rules' => 'required[tamanbacaan.nama_taman]',
                    'errors' => [
                        'required' => 'Nama taman harus diisi'
                    ]
                ],
                'pengelola' => [
                    'rules' => 'required[tamanbacaan.pengelola]',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'jml_buku' => [
                    'rules' => 'required[tamanbacaan.jml_buku]',
                    'errors' => [
                        'required' => 'Jumlah buku harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to("/tamanbacaan/edit/$kdtaman")->withInput();
            }
            $data = [
                'kd_wilayah' => $kd,
                'nama_taman' => $this->request->getVar('nama_taman'),
                'pengelola' => $this->request->getVar('pengelola'),
                'jml_buku' => $this->request->getVar('jml_buku')
            ];
            $this->tamanbacaanModel->where('kd_taman', $kdtaman)->set($data)->update();
            session()->setFlashdata('pesan', 'Data berhasil diubah.');
            return redirect()->to("/tamanbacaan/detail/$kd");
        } elseif ($btn == "batal") {
            return redirect()->to("/tamanbacaan/detail/$kd");
        }
    }

    public function updateBuku($nobuku)
    {
        $kdtaman = $this->request->getVar('kd_taman');
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            if (!$this->validate([
                'jns_buku' => [
                    'rules' => 'required[jenisbuku.jns_buku]',
                    'errors' => [
                        'required' => 'Jenis buku harus diisi'
                    ]
                ],
                'kategori' => [
                    'rules' => 'required[jenisbuku.kategori]',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'jumlah' => [
                    'rules' => 'required[jenisbuku.jumlah]',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to("/tamanbacaan/editbuku/$nobuku")->withInput();
            }
            $data = [
                'kd_taman' => $kdtaman,
                'jns_buku' => $this->request->getVar('jns_buku'),
                'kategori' => $this->request->getVar('kategori'),
                'jumlah' => $this->request->getVar('jumlah')
            ];
            $this->jenisbukuModel->where('no_buku', $nobuku)->set($data)->update();
            session()->setFlashdata('pesan', 'Data berhasil diubah.');
            return redirect()->to("/tamanbacaan/jenisbuku/$kdtaman");
        } elseif ($btn == "batal") {
            return redirect()->to("/tamanbacaan/jenisbuku/$kdtaman");
        }
    }

    public function wilayahRange()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'wilayah' => $this->tamanbacaanModel->getWilayah()
        ];
        return view('laporan/admin/tamanbacaan/wilayahrange', $data);
    }

    public function RangeJenisBuku($kdtaman)
    {
        $taman = $this->tamanbacaanModel->getData($kdtaman);
        $kdwilayah = $taman['kd_wilayah'];
        $wilayah = $this->tamanbacaanModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'taman' => $this->tamanbacaanModel->getData($kdtaman),
            'buku' => $this->jenisbukuModel->getBuku($kdtaman),
            'kelurahan' => $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi'],
            'kdtaman' => $kdtaman,
            'kdwilayah' => $kdwilayah
        ];
        return view('laporan/admin/tamanbacaan/rangejenisbuku', $data);
    }

    public function detailRange($kdwilayah)
    {
        $wilayah = $this->tamanbacaanModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'kelurahan' => $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi'],
            'taman' => $this->tamanbacaanModel->getTaman($kdwilayah),
            'kdwilayah' => $kdwilayah
        ];
        return view('laporan/admin/tamanbacaan/detailrange', $data);
    }

    public function print($kdtaman)
    {
        $taman = $this->tamanbacaanModel->getData($kdtaman);
        $kdwilayah = $taman['kd_wilayah'];
        $wilayah = $this->tamanbacaanModel->getWilayah($kdwilayah);
        $data = [
            'taman' => $this->tamanbacaanModel->getData($kdtaman),
            'buku' => $this->jenisbukuModel->getBuku($kdtaman),
            'kelurahan' => $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi'],
            'kdtaman' => $kdtaman,
            'kdwilayah' => $kdwilayah
        ];
        return view('laporan/admin/tamanbacaan/print', $data);
    }
}
