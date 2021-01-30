<?php

namespace App\Controllers;

use App\Models\UangkeluarModel;

class UangkeluarCon extends BaseController
{
    protected $uangkeluarModel;

    public function __construct()
    {
        $this->uangkeluarModel = new UangkeluarModel();
    }

    public function index()
    {
        $halaman = $this->request->getVar('page_bukuuangkeluar') ? $this->request->getVar('page_bukuuangkeluar') : 1;
        $data = [
            'tittle' => 'Uang Keluar',
            'PagesAdmin' => 'pendataan',
            'uangkeluar' => $this->uangkeluarModel->paginate(5, 'bukuuangkeluar'),
            'total' => $this->uangkeluarModel->getTotal(),
            'pager' => $this->uangkeluarModel->pager,
            'halaman' => $halaman
        ];
        return view('laporan/admin/uangkeluar/index', $data);
    }

    public function create()
    {
        session();
        $data = [
            'tittle' => 'Uang Keluar',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/uangkeluar/create', $data);
    }

    public function save()
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'tanggal' => [
                    'rules' => 'required[bukuuangkeluar.tanggal]',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'sumber_dana' => [
                    'rules' => 'required[bukuuangkeluar.sumber_dana]',
                    'errors' => [
                        'required' => 'Sumber dana harus diisi'
                    ]
                ],
                'uraian' => [
                    'rules' => 'required[bukuuangkeluar.uraian]',
                    'errors' => [
                        'required' => 'Uraian harus diisi'
                    ]
                ],
                'no_bukti' => [
                    'rules' => 'required[bukuuangkeluar.no_bukti]',
                    'errors' => [
                        'required' => 'Nomor bukti harus diisi'
                    ]
                ],
                'jml_keluar' => [
                    'rules' => 'required[bukuuangkeluar.jml_keluar]',
                    'errors' => [
                        'required' => 'Jumlah keluar harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to('/uangkeluar/create')->withInput();
            }
            $data = [
                'tanggal' => $this->request->getVar('tanggal'),
                'sumber_dana' => $this->request->getVar('sumber_dana'),
                'uraian' => $this->request->getVar('uraian'),
                'no_bukti' => $this->request->getVar('no_bukti'),
                'jml_keluar' => $this->request->getVar('jml_keluar')
            ];
            $this->uangkeluarModel->save($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
            return redirect()->to('/uangkeluar/index');
        } elseif ($btn == "batal") {
            return redirect()->to('/uangkeluar/index');
        }
    }

    public function delete($num)
    {
        $this->uangkeluarModel->where('no', $num)->delete();
        session()->setFlashdata('hapus', 'Data berhasil dihapus.');
        return redirect()->to('/uangkeluar/index');
    }

    public function edit($num)
    {
        $data = [
            'tittle' => 'Uang Keluar',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'uangkeluar' => $this->uangkeluarModel->getUangkeluar($num)
        ];
        return view('laporan/admin/uangkeluar/edit', $data);
    }

    public function update($num)
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            if (!$this->validate([
                'tanggal' => [
                    'rules' => 'required[bukuuangkeluar.tanggal]',
                    'errors' => [
                        'required' => 'Tanggal harus diisi'
                    ]
                ],
                'sumber_dana' => [
                    'rules' => 'required[bukuuangkeluar.sumber_dana]',
                    'errors' => [
                        'required' => 'Sumber dana harus diisi'
                    ]
                ],
                'uraian' => [
                    'rules' => 'required[bukuuangkeluar.uraian]',
                    'errors' => [
                        'required' => 'Uraian harus diisi'
                    ]
                ],
                'no_bukti' => [
                    'rules' => 'required[bukuuangkeluar.no_bukti]',
                    'errors' => [
                        'required' => 'Nomor bukti harus diisi'
                    ]
                ],
                'jml_keluar' => [
                    'rules' => 'required[bukuuangkeluar.jml_keluar]',
                    'errors' => [
                        'required' => 'Jumlah keluar harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to("/uangkeluar/edit/$num")->withInput();
            }
            $data = [
                'tanggal' => $this->request->getVar('tanggal'),
                'sumber_dana' => $this->request->getVar('sumber_dana'),
                'uraian' => $this->request->getVar('uraian'),
                'no_bukti' => $this->request->getVar('no_bukti'),
                'jml_keluar' => $this->request->getVar('jml_keluar')
            ];
            $this->uangkeluarModel->where('no', $num)->set($data)->update();
            session()->setFlashdata('pesan', 'Data berhasil diubah.');
            return redirect()->to('/uangkeluar/index');
        } elseif ($btn == "batal") {
            return redirect()->to('/uangkeluar/index');
        }
    }

    public function range()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'uangkeluar' => $this->uangkeluarModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/uangkeluar/range', $data);
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
                'uangkeluar' => $this->uangkeluarModel->getRange($awal, $akhir),
                'total' => $this->uangkeluarModel->getTotal($awal, $akhir),
                'awal' => $awal,
                'akhir' => $akhir
            ];
            return view('laporan/admin/uangkeluar/lihatrange', $data);
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
                'uangkeluar' => $this->uangkeluarModel->getRange($awal, $akhir),
                'total' => $this->uangkeluarModel->getTotal($awal, $akhir)
            ];
            return view('laporan/admin/uangkeluar/print', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/uangkeluar/range');
        }
    }
}
