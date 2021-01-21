<?php

namespace App\Controllers;

use App\Models\ManfaattanahModel;

class ManfaattanahCon extends BaseController
{
    protected $manfaattanahModel;

    public function __construct()
    {
        $this->manfaattanahModel = new ManfaattanahModel();
    }

    public function index()
    {
        $halaman = $this->request->getVar('page_pemanfaatantanah') ? $this->request->getVar('page_pemanfaatantanah') : 1;
        $data = [
            'tittle' => 'Pemanfaatan Tanah',
            'PagesAdmin' => 'pendataan',
            'manfaattanah' => $this->manfaattanahModel->paginate(),
            'pager' => $this->manfaattanahModel->pager,
            'halaman' => $halaman
        ];
        return view('laporan/admin/manfaattanah/index', $data);
    }

    public function create()
    {
        session();
        $data = [
            'tittle' => 'Pemanfaatan Tanah',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/manfaattanah/create', $data);
    }

    public function save()
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'tgl_pendataan' => [
                    'rules' => 'required[pemanfaatantanah.tgl_pendataan]',
                    'errors' => [
                        'required' => 'Tanggal pendataan harus diisi'
                    ]
                ],
                'kategori' => [
                    'rules' => 'required[pemanfaatantanah.kategori]',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'komoditi' => [
                    'rules' => 'required[pemanfaatantanah.komoditi]',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'jumlah' => [
                    'rules' => 'required[pemanfaatantanah.jumlah]',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to('/manfaattanah/create')->withInput();
            }
            $data = [
                'tgl_pendataan' => $this->request->getVar('tgl_pendataan'),
                'kategori' => $this->request->getVar('kategori'),
                'komoditi' => $this->request->getVar('komoditi'),
                'jumlah' => $this->request->getVar('jumlah')
            ];
            $this->manfaattanahModel->save($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
            return redirect()->to('/manfaattanah/index');
        } elseif ($btn == "batal") {
            return redirect()->to('/manfaattanah/index');
        }
    }

    public function delete($num)
    {
        $this->manfaattanahModel->where('no', $num)->delete();
        session()->setFlashdata('hapus', 'Data berhasil dihapus.');
        return redirect()->to('/manfaattanah/index');
    }

    public function edit($num)
    {
        $data = [
            'tittle' => 'Pemanfaatan Tanah',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'manfaattanah' => $this->manfaattanahModel->getManfaattanah($num)
        ];
        return view('laporan/admin/manfaattanah/edit', $data);
    }

    public function update($num)
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            if (!$this->validate([
                'tgl_pendataan' => [
                    'rules' => 'required[pemanfaatantanah.tgl_pendataan]',
                    'errors' => [
                        'required' => 'Tanggal pendataan harus diisi'
                    ]
                ],
                'kategori' => [
                    'rules' => 'required[pemanfaatantanah.kategori]',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'komoditi' => [
                    'rules' => 'required[pemanfaatantanah.komoditi]',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'jumlah' => [
                    'rules' => 'required[pemanfaatantanah.jumlah]',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to("/manfaattanah/edit/$num")->withInput();
            }
            $data = [
                'tgl_pendataan' => $this->request->getVar('tgl_pendataan'),
                'kategori' => $this->request->getVar('kategori'),
                'komoditi' => $this->request->getVar('komoditi'),
                'jumlah' => $this->request->getVar('jumlah')
            ];
            $this->manfaattanahModel->where('no', $num)->set($data)->update();
            session()->setFlashdata('pesan', 'Data berhasil diubah.');
            return redirect()->to('/manfaattanah/index');
        } elseif ($btn == "batal") {
            return redirect()->to('/manfaattanah/index');
        }
    }

    public function range()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'manfaattanah' => $this->manfaattanahModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/manfaattanah/range', $data);
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
                'manfaattanah' => $this->manfaattanahModel->getRange($awal, $akhir),
                'awal' => $awal,
                'akhir' => $akhir
            ];
            return view('laporan/admin/manfaattanah/lihatrange', $data);
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
                'manfaattanah' => $this->manfaattanahModel->getRange($awal, $akhir)
            ];
            return view('laporan/admin/manfaattanah/print', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/manfaattanah/range');
        }
    }
}
