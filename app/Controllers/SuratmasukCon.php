<?php

namespace App\Controllers;

use App\Models\SuratmasukModel;

class SuratmasukCon extends BaseController
{
    protected $suratmasukModel;

    public function __construct()
    {
        $this->suratmasukModel = new SuratmasukModel();
    }

    public function index()
    {
        $halaman = $this->request->getVar('page_suratmasuk') ? $this->request->getVar('page_suratmasuk') : 1;

        $data = [
            'tittle' => 'Surat Masuk',
            'PagesAdmin' => 'pendataan',
            'suratmasuk' => $this->suratmasukModel->paginate(5, 'suratmasuk'),
            'pager' => $this->suratmasukModel->pager,
            'halaman' => $halaman
        ];
        return view('laporan/admin/suratmasuk/index', $data);
    }

    public function create()
    {
        session();
        $data = [
            'tittle' => 'Surat Masuk',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/suratmasuk/create', $data);
    }

    public function save()
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'tgl_terima' => [
                    'rules' => 'required[suratmasuk.tgl_terima]',
                    'errors' => [
                        'required' => 'Tanggal terima harus diisi'
                    ]
                ],
                'tgl_surat' => [
                    'rules' => 'required[suratmasuk.tgl_surat]',
                    'errors' => [
                        'required' => 'Tanggal surat harus diisi'
                    ]
                ],
                'no_surat' => [
                    'rules' => 'required[suratmasuk.no_surat]',
                    'errors' => [
                        'required' => 'Nomor surat harus diisi'
                    ]
                ],
                'asal_surat' => [
                    'rules' => 'required[suratmasuk.asal_surat]',
                    'errors' => [
                        'required' => 'Asal surat harus diisi'
                    ]
                ],
                'perihal' => [
                    'rules' => 'required[suratmasuk.perihal]',
                    'errors' => [
                        'required' => 'Perihal harus diisi'
                    ]
                ],
                'lampiran' => [
                    'rules' => 'required[suratmasuk.lampiran]',
                    'errors' => [
                        'required' => 'Lampiran harus diisi'
                    ]
                ],
                'teruskan_kpd' => [
                    'rules' => 'required[suratmasuk.teruskan_kpd]',
                    'errors' => [
                        'required' => 'Teruskan kepada harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to('/suratmasuk/create')->withInput();
            }
            $data = [
                'tgl_terima' => $this->request->getVar('tgl_terima'),
                'tgl_surat' => $this->request->getVar('tgl_surat'),
                'no_surat' => $this->request->getVar('no_surat'),
                'asal_surat' => $this->request->getVar('asal_surat'),
                'perihal' => $this->request->getVar('perihal'),
                'lampiran' => $this->request->getVar('lampiran'),
                'teruskan_kpd' => $this->request->getVar('teruskan_kpd')
            ];
            $this->suratmasukModel->save($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
            return redirect()->to('/suratmasuk/index');
        } elseif ($btn == "batal") {
            return redirect()->to('/suratmasuk/index');
        }
    }

    public function delete($num)
    {
        $surat = $this->suratmasukModel->getSuratmasuk($num);
        $this->suratmasukModel->where('no', $num)->delete();
        session()->setFlashdata('hapus', "Data surat berhasil dihapus dengan nomor surat $surat[no_surat].");
        return redirect()->to('/suratmasuk/index');
    }

    public function edit($num)
    {
        $data = [
            'tittle' => 'Surat Masuk',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'suratmasuk' => $this->suratmasukModel->getSuratmasuk($num)
        ];
        return view('laporan/admin/suratmasuk/edit', $data);
    }

    public function update($num)
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            if (!$this->validate([
                'tgl_terima' => [
                    'rules' => 'required[suratmasuk.tgl_terima]',
                    'errors' => [
                        'required' => 'Tanggal terima harus diisi'
                    ]
                ],
                'tgl_surat' => [
                    'rules' => 'required[suratmasuk.tgl_surat]',
                    'errors' => [
                        'required' => 'Tanggal surat harus diisi'
                    ]
                ],
                'no_surat' => [
                    'rules' => 'required[suratmasuk.no_surat]',
                    'errors' => [
                        'required' => 'Nomor surat harus diisi'
                    ]
                ],
                'asal_surat' => [
                    'rules' => 'required[suratmasuk.asal_surat]',
                    'errors' => [
                        'required' => 'Asal surat harus diisi'
                    ]
                ],
                'perihal' => [
                    'rules' => 'required[suratmasuk.perihal]',
                    'errors' => [
                        'required' => 'Perihal harus diisi'
                    ]
                ],
                'lampiran' => [
                    'rules' => 'required[suratmasuk.lampiran]',
                    'errors' => [
                        'required' => 'Lampiran harus diisi'
                    ]
                ],
                'teruskan_kpd' => [
                    'rules' => 'required[suratmasuk.teruskan_kpd]',
                    'errors' => [
                        'required' => 'Teruskan kepada harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to("/suratmasuk/edit/$num")->withInput();
            }
            $data = [
                'tgl_terima' => $this->request->getVar('tgl_terima'),
                'tgl_surat' => $this->request->getVar('tgl_surat'),
                'no_surat' => $this->request->getVar('no_surat'),
                'asal_surat' => $this->request->getVar('asal_surat'),
                'perihal' => $this->request->getVar('perihal'),
                'lampiran' => $this->request->getVar('lampiran'),
                'teruskan_kpd' => $this->request->getVar('teruskan_kpd')
            ];
            $this->suratmasukModel->where('no', $num)->set($data)->update();
            session()->setFlashdata('pesan', 'Data berhasil diubah.');
            return redirect()->to('/suratmasuk/index');
        } elseif ($btn == "batal") {
            return redirect()->to('/suratmasuk/index');
        }
    }

    public function range()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'suratmasuk' => $this->suratmasukModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/suratmasuk/range', $data);
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
                'suratmasuk' => $this->suratmasukModel->getRange($awal, $akhir),
                'awal' => $awal,
                'akhir' => $akhir
            ];
            return view('laporan/admin/suratmasuk/lihatrange', $data);
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
                'suratmasuk' => $this->suratmasukModel->getRange($awal, $akhir)
            ];
            return view('laporan/admin/suratmasuk/print', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/suratmasuk/range');
        }
    }
}
