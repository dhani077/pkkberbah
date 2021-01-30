<?php

namespace App\Controllers;


use App\Models\UangmasukModel;

class UangmasukCon extends BaseController
{
    protected $uangmasukModel;

    public function __construct()
    {
        $this->uangmasukModel = new UangmasukModel();
    }
    public function index()
    {
        $halaman = $this->request->getVar('page_bukuuangmasuk') ? $this->request->getVar('page_bukuuangmasuk') : 1;
        $data = [
            'tittle' => 'Uang Masuk',
            'PagesAdmin' => 'pendataan',
            'uangmasuk' => $this->uangmasukModel->paginate(5, 'bukuuangmasuk'),
            'total' => $this->uangmasukModel->getTotal(),
            'pager' => $this->uangmasukModel->pager,
            'halaman' => $halaman
        ];
        return view('laporan/admin/uangmasuk/index', $data);
    }

    public function create()
    {
        session();
        $data = [
            'tittle' => 'Uang Masuk',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/uangmasuk/create', $data);
    }

    public function save()
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'tanggal' => [
                    'rules' => 'required[uangmasuk.tanggal]',
                    'errors' => [
                        'required' => 'Tanggal harus diisi'
                    ]
                ],
                'sumber_dana' => [
                    'rules' => 'required[uangmasuk.sumber_dana]',
                    'errors' => [
                        'required' => 'Sumber dana harus diisi'
                    ]
                ],
                'uraian' => [
                    'rules' => 'required[uangmasuk.uraian]',
                    'errors' => [
                        'required' => 'Uraian harus diisi'
                    ]
                ],
                'no_bukti' => [
                    'rules' => 'required[uangmasuk.no_bukti]',
                    'errors' => [
                        'required' => 'Nomor bukti harus diisi'
                    ]
                ],
                'jml_terima' => [
                    'rules' => 'required[uangmasuk.jml_terima]',
                    'errors' => [
                        'required' => 'Jumlah terima harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to('/uangmasuk/create')->withInput();
            }
            $data = [
                'tanggal' => $this->request->getVar('tanggal'),
                'sumber_dana' => $this->request->getVar('sumber_dana'),
                'uraian' => $this->request->getVar('uraian'),
                'no_bukti' => $this->request->getVar('no_bukti'),
                'jml_terima' => $this->request->getVar('jml_terima')
            ];
            $this->uangmasukModel->save($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
            return redirect()->to('/uangmasuk/index');
        } elseif ($btn == "batal") {
            return redirect()->to('/uangmasuk/index');
        }
    }

    public function delete($num)
    {
        $this->uangmasukModel->where('no', $num)->delete();
        session()->setFlashdata('hapus', 'Data berhasil dihapus.');
        return redirect()->to('/uangmasuk/index');
    }

    public function edit($num)
    {
        $data = [
            'tittle' => 'Uang Masuk',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'uangmasuk' => $this->uangmasukModel->getUangmasuk($num)
        ];
        return view('laporan/admin/uangmasuk/edit', $data);
    }

    public function update($num)
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            if (!$this->validate([
                'tanggal' => [
                    'rules' => 'required[uangmasuk.tanggal]',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'sumber_dana' => [
                    'rules' => 'required[uangmasuk.sumber_dana]',
                    'errors' => [
                        'required' => 'Sumber dana harus diisi'
                    ]
                ],
                'uraian' => [
                    'rules' => 'required[uangmasuk.uraian]',
                    'errors' => [
                        'required' => 'Uraian harus diisi'
                    ]
                ],
                'no_bukti' => [
                    'rules' => 'required[uangmasuk.no_bukti]',
                    'errors' => [
                        'required' => 'Nomor bukti harus diisi'
                    ]
                ],
                'jml_terima' => [
                    'rules' => 'required[uangmasuk.jml_terima]',
                    'errors' => [
                        'required' => 'Jumlah terima harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to("/uangmasuk/edit/$num")->withInput();
            }
            $data = [
                'tanggal' => $this->request->getVar('tanggal'),
                'sumber_dana' => $this->request->getVar('sumber_dana'),
                'uraian' => $this->request->getVar('uraian'),
                'no_bukti' => $this->request->getVar('no_bukti'),
                'jml_terima' => $this->request->getVar('jml_terima')
            ];
            $this->uangmasukModel->where('no', $num)->set($data)->update();
            session()->setFlashdata('pesan', 'Data berhasil diubah.');
            return redirect()->to('/uangmasuk/index');
        } elseif ($btn == "batal") {
            return redirect()->to('/uangmasuk/index');
        }
    }

    public function range()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'uangmasuk' => $this->uangmasukModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/uangmasuk/range', $data);
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
                'uangmasuk' => $this->uangmasukModel->getRange($awal, $akhir),
                'total' => $this->uangmasukModel->getTotal($awal, $akhir),
                'awal' => $awal,
                'akhir' => $akhir
            ];
            return view('laporan/admin/uangmasuk/lihatrange', $data);
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
                'uangmasuk' => $this->uangmasukModel->getRange($awal, $akhir),
                'total' => $this->uangmasukModel->getTotal($awal, $akhir)
            ];
            return view('laporan/admin/uangmasuk/print', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/uangmasuk/range');
        }
    }
}
