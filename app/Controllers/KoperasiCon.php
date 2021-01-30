<?php

namespace App\Controllers;

use App\Models\KoperasiModel;

class KoperasiCon extends BaseController
{
    protected $koperasiModel;

    public function __construct()
    {
        $this->koperasiModel = new KoperasiModel();
    }

    public function index()
    {
        $data = [
            'tittle' => 'Koperasi',
            'PagesAdmin' => 'pendataan',
            'wilayah' => $this->koperasiModel->getWilayah()
        ];

        return view('laporan/admin/koperasi/index', $data);
    }

    public function detail($kdwilayah)
    {
        $wilayah = $this->koperasiModel->getWilayah($kdwilayah);

        $data = [
            'tittle' => 'Koperasi',
            'koperasi' => $this->koperasiModel->getKoperasi($kdwilayah),
            'PagesAdmin' => 'pendataan',
            'kelurahan' => $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi'],
            'kdwilayah' => $kdwilayah
        ];
        return view('laporan/admin/koperasi/detail', $data);
    }

    public function create($kdwilayah)
    {
        session();
        $data = [
            'tittle' => 'Koperasi',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'kdwilayah' => $kdwilayah,
            'wilayah' => $this->koperasiModel->getWilayah($kdwilayah)
        ];
        return view('laporan/admin/koperasi/create', $data);
    }

    public function save($kdwilayah)
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'nama_koperasi' => [
                    'rules' => 'required[koperasi.nama_koperasi]',
                    'errors' => [
                        'required' => 'Nama koperasi harus diisi'
                    ]
                ],
                'jns_koperasi' => [
                    'rules' => 'required[koperasi.jns_koperasi]',
                    'errors' => [
                        'required' => 'Jenis koperasi harus diisi'
                    ]
                ],
                'status_hkm_yes' => [
                    'rules' => 'required[koperasi.status_hkm_yes]',
                    'errors' => [
                        'required' => 'Status hukum koperasi harus diisi'
                    ]
                ],
                'jml_anggota_L' => [
                    'rules' => 'required[koperasi.jml_anggota_L]',
                    'errors' => [
                        'required' => 'Jumlah anggota (L) harus diisi'
                    ]
                ],
                'jml_anggota_P' => [
                    'rules' => 'required[koperasi.jml_anggota_P]',
                    'errors' => [
                        'required' => 'Jumlah anggota (P) harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to("/koperasi/create/$kdwilayah")->withInput();
            }
            $status = $this->request->getVar('status_hkm_yes');
            if ($status == 'Ya') {
                $blmHukum = 'Tidak';
            } elseif ($status == 'Tidak') {
                $blmHukum = 'Ya';
            }
            $data = [
                'kd_wilayah' => $kdwilayah,
                'nama_koperasi' => $this->request->getVar('nama_koperasi'),
                'jns_koperasi' => $this->request->getVar('jns_koperasi'),
                'status_hkm_yes' => $status,
                'status_hkm_non' => $blmHukum,
                'jml_anggota_L' => $this->request->getVar('jml_anggota_L'),
                'jml_anggota_P' => $this->request->getVar('jml_anggota_P')
            ];
            $this->koperasiModel->save($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
            return redirect()->to("/koperasi/detail/$kdwilayah");
        } elseif ($btn == "batal") {
            return redirect()->to("/koperasi/detail/$kdwilayah");
        }
    }

    public function delete($no)
    {
        $kd = $this->koperasiModel->getData($no);
        $wil = $kd['kd_wilayah'];
        $this->koperasiModel->where('no', $no)->delete();
        session()->setFlashdata('hapus', 'Data berhasil dihapus.');
        return redirect()->to("/koperasi/detail/$wil");
    }

    public function edit($no)
    {
        $koperasi = $this->koperasiModel->getData($no);
        $kdwilayah = $koperasi['kd_wilayah'];
        $data = [
            'tittle' => 'Koperasi',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'koperasi' => $koperasi,
            'wilayah' => $this->koperasiModel->getWilayah($kdwilayah)
        ];
        return view('laporan/admin/koperasi/edit', $data);
    }

    public function update($no)
    {
        $btn = $this->request->getVar('aksi');
        $koperasi = $this->koperasiModel->getData($no);
        $kdwilayah = $koperasi['kd_wilayah'];
        if ($btn == "tambah") {
            if (!$this->validate([
                'nama_koperasi' => [
                    'rules' => 'required[koperasi.nama_koperasi]',
                    'errors' => [
                        'required' => 'Nama koperasi harus diisi'
                    ]
                ],
                'jns_koperasi' => [
                    'rules' => 'required[koperasi.jns_koperasi]',
                    'errors' => [
                        'required' => 'Jenis koperasi harus diisi'
                    ]
                ],
                'status_hkm_yes' => [
                    'rules' => 'required[koperasi.status_hkm_yes]',
                    'errors' => [
                        'required' => 'Status hukum koperasi harus diisi'
                    ]
                ],
                'jml_anggota_L' => [
                    'rules' => 'required[koperasi.jml_anggota_L]',
                    'errors' => [
                        'required' => 'Jumlah anggota (L) harus diisi'
                    ]
                ],
                'jml_anggota_P' => [
                    'rules' => 'required[koperasi.jml_anggota_P]',
                    'errors' => [
                        'required' => 'Jumlah anggota (P) harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to("/koperasi/edit/$no")->withInput();
            }
            $status = $this->request->getVar('status_hkm_yes');
            if ($status == 'Ya') {
                $blmHukum = 'Tidak';
            } elseif ($status == 'Tidak') {
                $blmHukum = 'Ya';
            }
            $data = [
                'kd_wilayah' => $this->request->getVar('kd_wilayah'),
                'nama_koperasi' => $this->request->getVar('nama_koperasi'),
                'jns_koperasi' => $this->request->getVar('jns_koperasi'),
                'status_hkm_yes' => $status,
                'status_hkm_non' => $blmHukum,
                'jml_anggota_L' => $this->request->getVar('jml_anggota_L'),
                'jml_anggota_P' => $this->request->getVar('jml_anggota_P')
            ];
            $this->koperasiModel->where('no', $no)->set($data)->update();
            session()->setFlashdata('pesan', 'Data berhasil diubah.');
            return redirect()->to("/koperasi/detail/$kdwilayah");
        } elseif ($btn == "batal") {
            return redirect()->to("/koperasi/detail/$kdwilayah");
        }
    }

    public function wilayahKoperasi()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'wilayah' => $this->koperasiModel->getWilayah()
        ];
        return view('laporan/admin/koperasi/wilayahkoperasi', $data);
    }

    public function lihatKoperasi($kdwilayah)
    {
        $wilayah = $this->koperasiModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'koperasi' => $this->koperasiModel->getKoperasi($kdwilayah),
            'PagesAdmin' => 'laporan',
            'kelurahan' => $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi'],
            'kdwilayah' => $kdwilayah
        ];
        return view('laporan/admin/koperasi/lihatkoperasi', $data);
    }

    public function print($kdwilayah)
    {
        $wilayah = $this->koperasiModel->getWilayah($kdwilayah);;
        $btn = $this->request->getVar('aksi');
        if ($btn == "print") {
            $data = [
                'koperasi' => $this->koperasiModel->getKoperasi($kdwilayah),
                'kelurahan' => $wilayah['kelurahan'],
                'kecamatan' => $wilayah['kecamatan'],
                'kabupaten' => $wilayah['kabupaten'],
                'provinsi' => $wilayah['provinsi'],
                'kdwilayah' => $kdwilayah
            ];
            return view('laporan/admin/koperasi/print', $data);
        } elseif ($btn == "batal") {
            return redirect()->to("/koperasi/wilayahkoperasi");
        }
    }
}
