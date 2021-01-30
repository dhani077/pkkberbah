<?php

namespace App\Controllers;

use App\Models\IndustrirtModel;

class IndustrirtCon extends BaseController
{
    protected $industrirtModel;

    public function __construct()
    {
        $this->industrirtModel = new IndustrirtModel();
    }

    public function index()
    {
        $halaman = $this->request->getVar('page_industrirt') ? $this->request->getVar('page_industrirt') : 1;
        $data = [
            'tittle' => 'Industri Rumah Tangga',
            'PagesAdmin' => 'pendataan',
            'industrirt' => $this->industrirtModel->paginate(6, 'industrirt'),
            'pager' => $this->industrirtModel->pager,
            'halaman' => $halaman
        ];
        return view('laporan/admin/industrirt/index', $data);
    }

    public function create()
    {
        session();
        $data = [
            'tittle' => 'Industri Rumah Tangga',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/industrirt/create', $data);
    }

    public function save()
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'tgl_pendataan' => [
                    'rules' => 'required[industrirt.tgl_pendataan]',
                    'errors' => [
                        'required' => 'Tanggal pendataan harus diisi'
                    ]
                ],
                'kategori' => [
                    'rules' => 'required[industrirt.kategori]',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'komoditi' => [
                    'rules' => 'required[industrirt.komoditi]',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'volume' => [
                    'rules' => 'required[industrirt.volume]',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to('/industrirt/create')->withInput();
            }
            $data = [
                'tgl_pendataan' => $this->request->getVar('tgl_pendataan'),
                'kategori' => $this->request->getVar('kategori'),
                'komoditi' => $this->request->getVar('komoditi'),
                'volume' => $this->request->getVar('volume')
            ];
            $this->industrirtModel->save($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
            return redirect()->to('/industrirt/index');
        } elseif ($btn == "batal") {
            return redirect()->to('/industrirt/index');
        }
    }

    public function delete($num)
    {
        $this->industrirtModel->where('no', $num)->delete();
        session()->setFlashdata('hapus', 'Data berhasil dihapus.');
        return redirect()->to('/industrirt/index');
    }

    public function edit($num)
    {
        $data = [
            'tittle' => 'Industri Rumah Tangga',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'industrirt' => $this->industrirtModel->getIndustrirt($num)
        ];
        return view('laporan/admin/industrirt/edit', $data);
    }

    public function update($num)
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            if (!$this->validate([
                'tgl_pendataan' => [
                    'rules' => 'required[industrirt.tgl_pendataan]',
                    'errors' => [
                        'required' => 'Tanggal pendataan harus diisi'
                    ]
                ],
                'kategori' => [
                    'rules' => 'required[industrirt.kategori]',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'komoditi' => [
                    'rules' => 'required[industrirt.komoditi]',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'volume' => [
                    'rules' => 'required[industrirt.volume]',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to("/industrirt/edit/$num")->withInput();
            }
            $data = [
                'tgl_pendataan' => $this->request->getVar('tgl_pendataan'),
                'kategori' => $this->request->getVar('kategori'),
                'komoditi' => $this->request->getVar('komoditi'),
                'volume' => $this->request->getVar('volume')
            ];
            $this->industrirtModel->where('no', $num)->set($data)->update();
            session()->setFlashdata('pesan', 'Data berhasil diubah.');
            return redirect()->to('/industrirt/index');
        } elseif ($btn == "batal") {
            return redirect()->to('/industrirt/index');
        }
    }

    public function range()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'industrirt' => $this->industrirtModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];

        return view('laporan/admin/industrirt/range', $data);
    }

    public function lihatRange()
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $btn = $this->request->getVar('aksi');
        if ($btn == "lihat") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'PagesAdmin' => 'laporan',
                'industrirt' => $this->industrirtModel->getRange($awal, $akhir),
                'awal' => $awal,
                'akhir' => $akhir
            ];
            return view('laporan/admin/industrirt/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/admin/laporan');
        }
    }

    public function print()
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $btn = $this->request->getVar('aksi');
        if ($btn == "print") {
            $data = [
                'industrirt' => $this->industrirtModel->getRange($awal, $akhir)
            ];
            return view('laporan/admin/industrirt/print', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/industrirt/range');
        }
    }
}
