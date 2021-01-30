<?php

namespace App\Controllers;

use App\Models\KejarpaketModel;

class KejarpaketCon extends BaseController
{
    protected $kejarpaketModel;

    public function __construct()
    {
        $this->kejarpaketModel = new KejarpaketModel();
    }

    public function index()
    {
        $data = [
            'tittle' => 'Kejar Paket',
            'PagesAdmin' => 'pendataan',
            'kejarpaket' => $this->kejarpaketModel->getWilayah()
        ];
        return view('laporan/admin/kejarpaket/index', $data);
    }

    public function detail($kdwilayah)
    {
        $wilayah = $this->kejarpaketModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Kejar Paket',
            'PagesAdmin' => 'pendataan',
            'kejarpaket' => $this->kejarpaketModel->getKejarpaket($kdwilayah),
            'kelurahan' => $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi'],
            'kdwilayah' => $kdwilayah
        ];
        return view('laporan/admin/kejarpaket/detail', $data);
    }

    public function create($kdwilayah)
    {
        session();
        $data = [
            'tittle' => 'Kejar Paket',
            'PagesAdmin' => 'pendataan',
            'wilayah' => $this->kejarpaketModel->getWilayah($kdwilayah),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/kejarpaket/create', $data);
    }

    public function save($kdwilayah)
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'nama_paket' => [
                    'rules' => 'required[kejarpaket.nama_paket]',
                    'errors' => [
                        'required' => 'Nama paket harus diisi'
                    ]
                ],
                'jns_paket' => [
                    'rules' => 'required[jns.nama_paket]',
                    'errors' => [
                        'required' => 'Jenis paket harus diisi'
                    ]
                ],
                'tgl_mulai' => [
                    'rules' => 'required[kejarpaket.tgl_mulai]',
                    'errors' => [
                        'required' => 'Tanggal mulai harus diisi'
                    ]
                ],
                'jml_wrg_bljr_L' => [
                    'rules' => 'required[kejarpaket.jml_wrg_bljr_L]',
                    'errors' => [
                        'required' => 'harus diisi!'
                    ]
                ],
                'jml_wrg_bljr_P' => [
                    'rules' => 'required[kejarpaket.jml_wrg_bljr_P]',
                    'errors' => [
                        'required' => 'harus diisi!'
                    ]
                ],
                'jml_pengajar_L' => [
                    'rules' => 'required[kejarpaket.jml_pengajar_L]',
                    'errors' => [
                        'required' => 'harus diisi!'
                    ]
                ],
                'jml_pengajar_P' => [
                    'rules' => 'required[kejarpaket.jml_pengajar_P]',
                    'errors' => [
                        'required' => 'harus diisi!'
                    ]
                ]
            ])) {
                return redirect()->to("/kejarpaket/create/$kdwilayah")->withInput();
            }
            $data = [
                'kd_wilayah' => $kdwilayah,
                'nama_paket' => $this->request->getVar('nama_paket'),
                'jns_paket' => $this->request->getVar('jns_paket'),
                'tgl_mulai' => $this->request->getVar('tgl_mulai'),
                'jml_wrg_bljr_L' => $this->request->getVar('jml_wrg_bljr_L'),
                'jml_wrg_bljr_P' => $this->request->getVar('jml_wrg_bljr_P'),
                'jml_pengajar_L' => $this->request->getVar('jml_pengajar_L'),
                'jml_pengajar_P' => $this->request->getVar('jml_pengajar_P')
            ];
            $this->kejarpaketModel->save($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
            return redirect()->to("/kejarpaket/detail/$kdwilayah");
        } elseif ($btn == "batal") {
            return redirect()->to("/kejarpaket/detail/$kdwilayah");
        }
    }

    public function delete($no)
    {
        $data = $this->kejarpaketModel->getData($no);
        $kdwilayah = $data['kd_wilayah'];
        $this->kejarpaketModel->where('no', $no)->delete();
        session()->setFlashdata('hapus', 'Data berhasil dihapus.');
        return redirect()->to("/kejarpaket/detail/$kdwilayah");
    }

    public function edit($no)
    {
        $kejarpaket = $this->kejarpaketModel->getData($no);
        $kdwilayah = $kejarpaket['kd_wilayah'];

        $data = [
            'tittle' => 'Kejar Paket',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'kejarpaket' => $kejarpaket,
            'wilayah' => $this->kejarpaketModel->getWilayah($kdwilayah)
        ];
        return view('laporan/admin/kejarpaket/edit', $data);
    }

    public function update($no)
    {
        $kdwilayah = $this->request->getVar('kd_wilayah');
        $btn = $this->request->getVar('aksi');
        if ($btn == "simpan") {
            if (!$this->validate([
                'nama_paket' => [
                    'rules' => 'required[kejarpaket.nama_paket]',
                    'errors' => [
                        'required' => 'Nama paket harus diisi'
                    ]
                ],
                'jns_paket' => [
                    'rules' => 'required[jns.nama_paket]',
                    'errors' => [
                        'required' => 'Jenis paket harus diisi'
                    ]
                ],
                'tgl_mulai' => [
                    'rules' => 'required[kejarpaket.tgl_mulai]',
                    'errors' => [
                        'required' => 'Tanggal mulai harus diisi'
                    ]
                ],
                'jml_wrg_bljr_L' => [
                    'rules' => 'required[kejarpaket.jml_wrg_bljr_L]',
                    'errors' => [
                        'required' => 'harus diisi!'
                    ]
                ],
                'jml_wrg_bljr_P' => [
                    'rules' => 'required[kejarpaket.jml_wrg_bljr_P]',
                    'errors' => [
                        'required' => 'harus diisi!'
                    ]
                ],
                'jml_pengajar_L' => [
                    'rules' => 'required[kejarpaket.jml_pengajar_L]',
                    'errors' => [
                        'required' => 'harus diisi!'
                    ]
                ],
                'jml_pengajar_P' => [
                    'rules' => 'required[kejarpaket.jml_pengajar_P]',
                    'errors' => [
                        'required' => 'harus diisi!'
                    ]
                ]
            ])) {
                return redirect()->to("/kejarpaket/edit/$no")->withInput();
            }
            $data = [
                'kd_wilayah' => $kdwilayah,
                'nama_paket' => $this->request->getVar('nama_paket'),
                'jns_paket' => $this->request->getVar('jns_paket'),
                'tgl_mulai' => $this->request->getVar('tgl_mulai'),
                'jml_wrg_bljr_L' => $this->request->getVar('jml_wrg_bljr_L'),
                'jml_wrg_bljr_P' => $this->request->getVar('jml_wrg_bljr_P'),
                'jml_pengajar_L' => $this->request->getVar('jml_pengajar_L'),
                'jml_pengajar_P' => $this->request->getVar('jml_pengajar_P')
            ];
            $this->kejarpaketModel->where('no', $no)->set($data)->update();
            session()->setFlashdata('pesan', 'Data berhasil diubah.');
            return redirect()->to("/kejarpaket/detail/$kdwilayah");
        } elseif ($btn == "batal") {
            return redirect()->to("/kejarpaket/detail/$kdwilayah");
        }
    }

    public function wilayahRange()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'kejarpaket' => $this->kejarpaketModel->getWilayah()
        ];
        return view('laporan/admin/kejarpaket/wilayahrange', $data);
    }

    public function range($kdwilayah)
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'kdwilayah' => $kdwilayah,
            'kejarpaket' => $this->kejarpaketModel->getTanggal($kdwilayah),
            'validation' => \Config\Services::validation()
        ];

        return view('laporan/admin/kejarpaket/range', $data);
    }
    public function lihatRange($kdwilayah)
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $wilayah = $this->kejarpaketModel->getWilayah($kdwilayah);
        $btn = $this->request->getVar('aksi');
        if ($btn == "lihat") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'PagesAdmin' => 'laporan',
                'kejarpaket' => $this->kejarpaketModel->getRange($kdwilayah, $awal, $akhir),
                'awal' => $awal,
                'akhir' => $akhir,
                'kdwilayah' => $kdwilayah,
                'kelurahan' => $wilayah['kelurahan'],
                'kecamatan' => $wilayah['kecamatan'],
                'kabupaten' => $wilayah['kabupaten'],
                'provinsi' => $wilayah['provinsi']
            ];
            return view('laporan/admin/kejarpaket/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/kejarpaket/wilayahrange');
        }
    }

    public function print($kdwilayah)
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $wilayah = $this->kejarpaketModel->getWilayah($kdwilayah);
        $btn = $this->request->getVar('aksi');
        if ($btn == "print") {
            $data = [
                'kejarpaket' => $this->kejarpaketModel->getRange($kdwilayah, $awal, $akhir),
                'kelurahan' => $wilayah['kelurahan'],
                'kecamatan' => $wilayah['kecamatan'],
                'kabupaten' => $wilayah['kabupaten'],
                'provinsi' => $wilayah['provinsi']
            ];
            return view('laporan/admin/kejarpaket/print', $data);
        } elseif ($btn == "batal") {
            return redirect()->to("/kejarpaket/range/$kdwilayah");
        }
    }
}
