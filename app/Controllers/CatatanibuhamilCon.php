<?php

namespace App\Controllers;

use App\Models\CatatanibuhamilModel;

class CatatanibuhamilCon extends BaseController
{
    protected $catatanibuhamilModel;

    public function __construct()
    {
        $this->catatanibuhamilModel = new CatatanibuhamilModel();
    }

    public function index()
    {
        $wilayah = $this->catatanibuhamilModel->getWilayah();
        foreach ($wilayah as $w) {
            $kecamatan = $w['kecamatan'];
            $kabupaten = $w['kabupaten'];
            $provinsi = $w['provinsi'];
        }
        $catatanibu = $this->catatanibuhamilModel->getCatatanibuhamil();
        if ($catatanibu == null) {
            $th = "";
            $tot = ['total' => [
                'totaldusun' => '',
                'totalrw' => '',
                'totalrt' => '',
                'totaldasawisma' => '',
                'totalhamil' => '',
                'totallahir' => '',
                'totalnifas' => '',
                'totalmngl' => '',
                'totallahirL' => '',
                'totallahirP' => '',
                'totalakte' => '',
                'totalaktetdk' => '',
                'totalmnglL' => '',
                'totalmnglP' => '',
                'totalblitmnglL' => '',
                'totalblitmnglP' => ''
            ]];
            $total = $tot;
            $data = [
                'tittle' => 'Rekapitulasi Data',
                'PagesAdmin' => 'pendataan',
                'catatanibuhamil' => $this->catatanibuhamilModel->getTahun($th),
                'bulan' => "",
                'tahun' => $th,
                'kecamatan' => $kecamatan,
                'kabupaten' => $kabupaten,
                'provinsi' => $provinsi,
                'total' => $total
            ];
            return view('laporan/admin/catatanibuhamil/detail', $data);
        } elseif ($catatanibu != null) {
            foreach ($catatanibu as $t) :
                $th = $t['tahun'];
            endforeach;
            $data = [
                'tittle' => 'Rekapitulasi Data',
                'PagesAdmin' => 'pendataan',
                'catatanibuhamil' => $this->catatanibuhamilModel->getTahun($th),
                'kecamatan' => $kecamatan,
                'kabupaten' => $kabupaten,
                'provinsi' => $provinsi
            ];
            return view('laporan/admin/catatanibuhamil/index', $data);
        }
    }

    public function bulan()
    {
        $tahun = $this->request->getVar('tahun');
        $data = [
            'tittle' => 'Rekapitulasi Data',
            'PagesAdmin' => 'pendataan',
            'catatanibuhamil' => $this->catatanibuhamilModel->getBulan($tahun),
            'tahun' => $tahun
        ];
        return view('laporan/admin/catatanibuhamil/bulan', $data);
    }

    public function detail($bl, $th)
    {
        $catatan = $this->catatanibuhamilModel->getData($bl, $th);
        $wilayah = $this->catatanibuhamilModel->getWilayah();
        foreach ($wilayah as $w) {
            $kecamatan = $w['kecamatan'];
            $kabupaten = $w['kabupaten'];
            $provinsi = $w['provinsi'];
        }
        if (empty($catatan)) {
            $data = [
                'tittle' => 'Rekapitulasi Data',
                'PagesAdmin' => 'pendataan',
                'catatanibuhamil' => $catatan,
                'bulan' => "",
                'tahun' => "",
                'kecamatan' => $kecamatan,
                'kabupaten' => $kabupaten,
                'provinsi' => $provinsi
            ];
            return view('laporan/admin/catatanibuhamil/detail', $data);
        }
        if ($bl == '01') {
            $bulan = 'Januari';
        } elseif ($bl == '02') {
            $bulan = 'Februari';
        } elseif ($bl == '03') {
            $bulan = 'Maret';
        } elseif ($bl == '04') {
            $bulan = 'April';
        } elseif ($bl == '05') {
            $bulan = 'Mei';
        } elseif ($bl == '06') {
            $bulan = 'Juni';
        } elseif ($bl == '07') {
            $bulan = 'Juli';
        } elseif ($bl == '08') {
            $bulan = 'Agustus';
        } elseif ($bl == '09') {
            $bulan = 'Sepetember';
        } elseif ($bl == '10') {
            $bulan = 'Oktober';
        } elseif ($bl == '11') {
            $bulan = 'November';
        } elseif ($bl == '12') {
            $bulan = 'Desember';
        }
        $data = [
            'tittle' => 'Rekapitulasi Data',
            'PagesAdmin' => 'pendataan',
            'catatanibuhamil' => $catatan,
            'bulan' => $bulan,
            'tahun' => $th,
            'kecamatan' => $kecamatan,
            'kabupaten' => $kabupaten,
            'provinsi' => $provinsi,
            'total' => $this->catatanibuhamilModel->getTotal($bl, $th)
        ];
        return view('laporan/admin/catatanibuhamil/detail', $data);
    }

    public function create()
    {
        session();
        $data = [
            'tittle' => 'Rekapitulasi Data',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'wilayah' => $this->catatanibuhamilModel->getWilayah()
        ];
        return view('laporan/admin/catatanibuhamil/create', $data);
    }

    public function save()
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'nama_kelurahan' => [
                    'rules' => 'required[catatanibuhamilkecamatan.nama_kelurahan]',
                    'errors' => [
                        'required' => 'Nama kelurahan harus diisi'
                    ]
                ],
                'tanggal' => [
                    'rules' => 'required[catatanibuhamilkecamatan.tanggal]',
                    'errors' => [
                        'required' => 'Tanggal harus diisi'
                    ]
                ],
                'jml_dusun' => [
                    'rules' => 'required[catatanibuhamilkecamatan.jml_dusun]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_rw' => [
                    'rules' => 'required[catatanibuhamilkecamatan.jml_rw]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_rt' => [
                    'rules' => 'required[catatanibuhamilkecamatan.jml_rt]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_dasawisma' => [
                    'rules' => 'required[catatanibuhamilkecamatan.jml_dasawisma]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_ibu_hamil' => [
                    'rules' => 'required[catatanibuhamilkecamatan.jml_ibu_hamil]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_ibu_melahir' => [
                    'rules' => 'required[catatanibuhamilkecamatan.jml_ibu_melahir]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_ibu_nifas' => [
                    'rules' => 'required[catatanibuhamilkecamatan.jml_ibu_nifas]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_ibu_mngl' => [
                    'rules' => 'required[catatanibuhamilkecamatan.jml_ibu_mngl]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_bayi_lahirL' => [
                    'rules' => 'required[catatanibuhamilkecamatan.jml_bayi_lahirL]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_bayi_LahirP' => [
                    'rules' => 'required[catatanibuhamilkecamatan.jml_bayi_LahirP]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_bayi_akte_ada' => [
                    'rules' => 'required[catatanibuhamilkecamatan.jml_bayi_akte_ada]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_bayi_akte_tidak' => [
                    'rules' => 'required[catatanibuhamilkecamatan.jml_bayi_akte_tidak]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_bayi_mnglL' => [
                    'rules' => 'required[catatanibuhamilkecamatan.jml_bayi_mnglL]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_bayi_mnglP' => [
                    'rules' => 'required[catatanibuhamilkecamatan.jml_bayi_mnglP]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_balita_mnglL' => [
                    'rules' => 'required[catatanibuhamilkecamatan.jml_balita_mnglL]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_balita_mnglP' => [
                    'rules' => 'required[catatanibuhamilkecamatan.jml_balita_mnglP]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to('/catatanibuhamil/create')->withInput();
            }
            $tanggal = $this->request->getVar('tanggal');
            $bulan = substr($tanggal, 5, 2);
            $tahun = substr($tanggal, 0, 4);
            $data = [
                'tanggal' => $tanggal,
                'bulan' => $bulan,
                'tahun' => $tahun,
                'nama_kelurahan' => $this->request->getVar('nama_kelurahan'),
                'jml_dusun' => $this->request->getVar('jml_dusun'),
                'jml_rw' => $this->request->getVar('jml_rw'),
                'jml_rt' => $this->request->getVar('jml_rt'),
                'jml_dasawisma' => $this->request->getVar('jml_dasawisma'),
                'jml_ibu_hamil' => $this->request->getVar('jml_ibu_hamil'),
                'jml_ibu_melahir' => $this->request->getVar('jml_ibu_melahir'),
                'jml_ibu_nifas' => $this->request->getVar('jml_ibu_nifas'),
                'jml_ibu_mngl' => $this->request->getVar('jml_ibu_mngl'),
                'jml_bayi_lahirL' => $this->request->getVar('jml_bayi_lahirL'),
                'jml_bayi_LahirP' => $this->request->getVar('jml_bayi_LahirP'),
                'jml_bayi_akte_ada' => $this->request->getVar('jml_bayi_akte_ada'),
                'jml_bayi_akte_tidak' => $this->request->getVar('jml_bayi_akte_tidak'),
                'jml_bayi_mnglL' => $this->request->getVar('jml_bayi_mnglL'),
                'jml_bayi_mnglP' => $this->request->getVar('jml_bayi_mnglP'),
                'jml_balita_mnglL' => $this->request->getVar('jml_balita_mnglL'),
                'jml_balita_mnglP' => $this->request->getVar('jml_balita_mnglP'),
                'keterangan' => $this->request->getVar('keterangan')
            ];
            $this->catatanibuhamilModel->save($data);
            session()->setFlashdata('pesan', "Data berhasil ditambahkan pada tahun $tahun.");
            return redirect()->to('/catatanibuhamil/index');
        } elseif ($btn == "batal") {
            return redirect()->to('/catatanibuhamil/index');
        }
    }

    public function delete($num)
    {
        $catatan = $this->catatanibuhamilModel->getCatatanibuhamil($num);
        $th = $catatan['tahun'];
        $this->catatanibuhamilModel->where('no', $num)->delete();
        session()->setFlashdata('hapus', "Data berhasil dihapus pada tahun $th.");
        return redirect()->to('/catatanibuhamil/index');
    }

    public function edit($num)
    {
        $data = [
            'tittle' => 'Rekapitulasi Data',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'catatanibuhamil' => $this->catatanibuhamilModel->getCatatanibuhamil($num),
            'wilayah' => $this->catatanibuhamilModel->getWilayah()
        ];
        return view('laporan/admin/catatanibuhamil/edit', $data);
    }

    public function update($num)
    {
        $tanggal = $this->request->getVar('tanggal');
        $bulan = substr($tanggal, 5, 2);
        $tahun = substr($tanggal, 0, 4);
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            if (!$this->validate([
                'nama_kelurahan' => [
                    'rules' => 'required[catatanibuhamilkecamatan.nama_kelurahan]',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to("/catatanibuhamil/edit/$num")->withInput();
            }
            $data = [
                'tanggal' => $tanggal,
                'bulan' => $bulan,
                'tahun' => $tahun,
                'nama_kelurahan' => $this->request->getVar('nama_kelurahan'),
                'jml_dusun' => $this->request->getVar('jml_dusun'),
                'jml_rw' => $this->request->getVar('jml_rw'),
                'jml_rt' => $this->request->getVar('jml_rt'),
                'jml_dasawisma' => $this->request->getVar('jml_dasawisma'),
                'jml_ibu_hamil' => $this->request->getVar('jml_ibu_hamil'),
                'jml_ibu_melahir' => $this->request->getVar('jml_ibu_melahir'),
                'jml_ibu_nifas' => $this->request->getVar('jml_ibu_nifas'),
                'jml_ibu_mngl' => $this->request->getVar('jml_ibu_mngl'),
                'jml_bayi_lahirL' => $this->request->getVar('jml_bayi_lahirL'),
                'jml_bayi_LahirP' => $this->request->getVar('jml_bayi_LahirP'),
                'jml_bayi_akte_ada' => $this->request->getVar('jml_bayi_akte_ada'),
                'jml_bayi_akte_tidak' => $this->request->getVar('jml_bayi_akte_tidak'),
                'jml_bayi_mnglL' => $this->request->getVar('jml_bayi_mnglL'),
                'jml_bayi_mnglP' => $this->request->getVar('jml_bayi_mnglP'),
                'jml_balita_mnglL' => $this->request->getVar('jml_balita_mnglL'),
                'jml_balita_mnglP' => $this->request->getVar('jml_balita_mnglP'),
                'keterangan' => $this->request->getVar('keterangan')
            ];
            $this->catatanibuhamilModel->where('no', $num)->set($data)->update();
            session()->setFlashdata('pesan', "Data berhasil diubah pada tahun $tahun.");
            return redirect()->to('/catatanibuhamil/index');
        } elseif ($btn == "batal") {
            return redirect()->to("/CatatanibuhamilCon/detail/$bulan/$tahun");
        }
    }

    public function range()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'catatanibuhamil' => $this->catatanibuhamilModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/catatanibuhamil/range', $data);
    }

    public function lihatRange()
    {
        $wilayah = $this->catatanibuhamilModel->getWilayah();
        foreach ($wilayah as $w) {
            $kecamatan = $w['kecamatan'];
            $kabupaten = $w['kabupaten'];
            $provinsi = $w['provinsi'];
        }
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $btn = $this->request->getVar('aksi');
        if ($btn == "lihat") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'PagesAdmin' => 'laporan',
                'catatanibuhamil' => $this->catatanibuhamilModel->getRange($awal, $akhir),
                'total' => $this->catatanibuhamilModel->getTotalCetak($awal, $akhir),
                'awal' => $awal,
                'akhir' => $akhir,
                'kecamatan' => $kecamatan,
                'kabupaten' => $kabupaten,
                'provinsi' => $provinsi
            ];
            return view('laporan/admin/catatanibuhamil/lihatrange', $data);
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
            $tahun1 = substr($awal, 0, 4);
            $tahun2 = substr($akhir, 0, 4);
            $catatan = $this->catatanibuhamilModel->getRange($awal, $akhir);
            $wilayah = $this->catatanibuhamilModel->getWilayah();
            foreach ($wilayah as $w) {
                $kecamatan = $w['kecamatan'];
                $kabupaten = $w['kabupaten'];
                $provinsi = $w['provinsi'];
            }
            $data = [
                'catatanibuhamil' => $catatan,
                'tahun1' => $tahun1,
                'tahun2' => $tahun2,
                'kecamatan' => $kecamatan,
                'kabupaten' => $kabupaten,
                'provinsi' => $provinsi,
                'total' => $this->catatanibuhamilModel->getTotalCetak($awal, $akhir)
            ];
            return view('laporan/admin/catatanibuhamil/print', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/catatanibuhamil/range');
        }
    }
}
