<?php

namespace App\Controllers;

use App\Models\SuratkeluarModel;

class SuratkeluarCon extends BaseController
{
    protected $suratkeluarModel;

    public function __construct()
    {
        $this->suratkeluarModel = new SuratkeluarModel();
    }

    public function index()
    {
        $halaman = $this->request->getVar('page_suratkeluar') ? $this->request->getVar('page_suratkeluar') : 1;
        $data = [
            'tittle' => 'Surat Keluar',
            'PagesAdmin' => 'pendataan',
            'suratkeluar' => $this->suratkeluarModel->paginate(5, 'suratkeluar'),
            'pager' => $this->suratkeluarModel->pager,
            'halaman' => $halaman
        ];
        return view('laporan/admin/suratkeluar/index', $data);
    }

    public function create()
    {
        session();
        $data = [
            'tittle' => 'Surat Keluar',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/suratkeluar/create', $data);
    }

    public function save()
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'no_surat' => [
                    'rules' => 'required[suratkeluar.no_surat]',
                    'errors' => [
                        'required' => 'nomor surat harus diisi'
                    ]
                ],
                'tgl_surat' => [
                    'rules' => 'required[suratkeluar.tgl_surat]',
                    'errors' => [
                        'required' => 'Tanggal surat harus diisi'
                    ]
                ],
                'kepada' => [
                    'rules' => 'required[suratkeluar.kepada]',
                    'errors' => [
                        'required' => 'Kepada harus diisi'
                    ]
                ],
                'perihal' => [
                    'rules' => 'required[suratkeluar.perihal]',
                    'errors' => [
                        'required' => 'Perihal harus diisi'
                    ]
                ],
                'lampiran' => [
                    'rules' => 'required[suratkeluar.lampiran]',
                    'errors' => [
                        'required' => 'Lampiran harus diisi'
                    ]
                ],
                'tembusan' => [
                    'rules' => 'required[suratkeluar.tembusan]',
                    'errors' => [
                        'required' => 'Tembusan harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to('/suratkeluar/create')->withInput();
            }
            $data = [
                'no_surat' => $this->request->getVar('no_surat'),
                'tgl_surat' => $this->request->getVar('tgl_surat'),
                'kepada' => $this->request->getVar('kepada'),
                'perihal' => $this->request->getVar('perihal'),
                'lampiran' => $this->request->getVar('lampiran'),
                'tembusan' => $this->request->getVar('tembusan')
            ];
            $this->suratkeluarModel->save($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
            return redirect()->to('/suratkeluar/index');
        } elseif ($btn == "batal") {
            return redirect()->to('/suratkeluar/index');
        }
    }

    public function delete($num)
    {
        $surat = $this->suratkeluarModel->getSuratkeluar($num);
        $this->suratkeluarModel->where('no', $num)->delete();
        session()->setFlashdata('hapus', "Data surat berhasil dihapus dengan nomor dan kode surat $surat[no_surat].");
        return redirect()->to('/suratkeluar/index');
    }

    public function edit($num)
    {
        $data = [
            'tittle' => 'Surat Keluar',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'suratkeluar' => $this->suratkeluarModel->getSuratkeluar($num)
        ];
        return view('laporan/admin/suratkeluar/edit', $data);
    }

    public function update($num)
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            if (!$this->validate([
                'no_surat' => [
                    'rules' => 'required[suratkeluar.no_surat]',
                    'errors' => [
                        'required' => 'nomor surat harus diisi'
                    ]
                ],
                'tgl_surat' => [
                    'rules' => 'required[suratkeluar.tgl_surat]',
                    'errors' => [
                        'required' => 'Tanggal surat harus diisi'
                    ]
                ],
                'kepada' => [
                    'rules' => 'required[suratkeluar.kepada]',
                    'errors' => [
                        'required' => 'Kepada harus diisi'
                    ]
                ],
                'perihal' => [
                    'rules' => 'required[suratkeluar.perihal]',
                    'errors' => [
                        'required' => 'Perihal harus diisi'
                    ]
                ],
                'lampiran' => [
                    'rules' => 'required[suratkeluar.lampiran]',
                    'errors' => [
                        'required' => 'Lampiran harus diisi'
                    ]
                ],
                'tembusan' => [
                    'rules' => 'required[suratkeluar.tembusan]',
                    'errors' => [
                        'required' => 'Tembusan harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to("/suratkeluar/edit/$num")->withInput();
            }
            $data = [
                'no_surat' => $this->request->getVar('no_surat'),
                'tgl_surat' => $this->request->getVar('tgl_surat'),
                'kepada' => $this->request->getVar('kepada'),
                'perihal' => $this->request->getVar('perihal'),
                'lampiran' => $this->request->getVar('lampiran'),
                'tembusan' => $this->request->getVar('tembusan')
            ];
            $this->suratkeluarModel->where('no', $num)->set($data)->update();
            session()->setFlashdata('pesan', 'Data berhasil diubah.');
            return redirect()->to('/suratkeluar/index');
        } elseif ($btn == "batal") {
            return redirect()->to('/suratkeluar/index');
        }
    }

    public function range()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'suratkeluar' => $this->suratkeluarModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/suratkeluar/range', $data);
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
                'suratkeluar' => $this->suratkeluarModel->getRange($awal, $akhir),
                'awal' => $awal,
                'akhir' => $akhir
            ];
            return view('laporan/admin/suratkeluar/lihatrange', $data);
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
                'suratkeluar' => $this->suratkeluarModel->getRange($awal, $akhir)
            ];
            return view('laporan/admin/suratkeluar/print', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/suratkeluar/range');
        }
    }
}
