<?php

namespace App\Controllers;

use App\Models\DataumumtppkkkecModel;

class DataumumtppkkkecCon extends BaseController
{
    protected $dataumumtppkkkecModel;

    public function __construct()
    {
        $this->dataumumtppkkkecModel = new DataumumtppkkkecModel();
    }

    public function index()
    {
        $wilayah = $this->dataumumtppkkkecModel->getWilayah();
        foreach ($wilayah as $w) {
            $kecamatan = $w['kecamatan'];
            $kabupaten = $w['kabupaten'];
            $provinsi = $w['provinsi'];
        }
        $data = [
            'tittle' => 'Data Umum TP PKK Kecamatan',
            'PagesAdmin' => 'pendataan',
            'tahun' => $this->dataumumtppkkkecModel->getTahun()
        ];
        if ($data['tahun'] == null) {
            $th = "";
            $total = ['total' => [
                'totaldusun' => '',
                'totalrw' => '',
                'totalrt' => '',
                'totaldasawisma' => '',
                'totalkrt' => '',
                'totalkk' => '',
                'totalL' => '',
                'totalP' => '',
                'totalangL' => '',
                'totalangP' => '',
                'totalumumL' => '',
                'totalumumP' => '',
                'totalkhususL' => '',
                'totalkhususP' => '',
                'totalhonorerL' => '',
                'totalhonorerP' => '',
                'totalbantuanL' => '',
                'totalbantuanP' => ''
            ]];
            $kosong = [
                'tittle' => 'Data Umum TP PKK Kecamatan',
                'PagesAdmin' => 'pendataan',
                'dataumumtppkkkec' => $this->dataumumtppkkkecModel->getDataumumtppkkkec($th),
                'total' => $total,
                'kecamatan' => $kecamatan,
                'kabupaten' => $kabupaten,
                'provinsi' => $provinsi,
                'tahun' => $th
            ];
            return view('laporan/admin/dataumumtppkkkec/detail', $kosong);
        } elseif ($data['tahun'] != null) {
            return view('laporan/admin/dataumumtppkkkec/index', $data);
        }
    }

    public function detail($tahun = false)
    {
        if ($tahun == false) {
            $tahun = $this->request->getVar('tahun');
        }
        $wilayah = $this->dataumumtppkkkecModel->getWilayah();
        foreach ($wilayah as $w) {
            $kecamatan = $w['kecamatan'];
            $kabupaten = $w['kabupaten'];
            $provinsi = $w['provinsi'];
        }
        $data = [
            'tittle' => 'Data Umum TP PKK Kecamatan',
            'PagesAdmin' => 'pendataan',
            'dataumumtppkkkec' => $this->dataumumtppkkkecModel->getData($tahun),
            'total' => $this->dataumumtppkkkecModel->getTotal($tahun),
            'kecamatan' => $kecamatan,
            'kabupaten' => $kabupaten,
            'provinsi' => $provinsi,
            'tahun' => $tahun
        ];
        return view('laporan/admin/dataumumtppkkkec/detail', $data);
    }

    public function create()
    {
        session();
        $data = [
            'tittle' => 'Data Umum TP PKK Kecamatan',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'wilayah' => $this->dataumumtppkkkecModel->getWilayah()
        ];
        return view('laporan/admin/dataumumtppkkkec/create', $data);
    }

    public function save()
    {
        $tanggal = $this->request->getVar('tanggal');
        $tahun = substr($tanggal, 0, 4);
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'nama_wilayah' => [
                    'rules' => 'required[dataumumtppkkkecamatan.nama_wilayah]',
                    'errors' => [
                        'required' => 'Desa/Kelurahan harus diisi!'
                    ]
                ],
                'tanggal' => [
                    'rules' => 'required[dataumumtppkkkecamatan.tanggal]',
                    'errors' => [
                        'required' => 'Tanggal harus diisi!'
                    ]
                ],
                'jml_klp_dusun' => [
                    'rules' => 'required[dataumumtppkkkecamatan.jml_klp_dusun]',
                    'errors' => [
                        'required' => 'harus diisi!'
                    ]
                ],
                'jml_klp_pkkrw' => [
                    'rules' => 'required[dataumumtppkkkecamatan.jml_klp_pkkrw]',
                    'errors' => [
                        'required' => 'harus diisi!'
                    ]
                ],
                'jml_klp_pkkrt' => [
                    'rules' => 'required[dataumumtppkkkecamatan.jml_klp_pkkrt]',
                    'errors' => [
                        'required' => 'harus diisi!'
                    ]
                ]
            ])) {
                return redirect()->to('/dataumumtppkkkec/create')->withInput();
            }
            $data = [
                'tanggal' => $tanggal,
                'tahun' => $tahun,
                'nama_wilayah' => $this->request->getVar('nama_wilayah'),
                'jml_klp_dusun' => $this->request->getVar('jml_klp_dusun'),
                'jml_klp_pkkrw' => $this->request->getVar('jml_klp_pkkrw'),
                'jml_klp_pkkrt' => $this->request->getVar('jml_klp_pkkrt'),
                'jml_klp_dasawisma' => $this->request->getVar('jml_klp_dasawisma'),
                'jml_krt' => $this->request->getVar('jml_krt'),
                'jml_kk' => $this->request->getVar('jml_kk'),
                'jml_jiwa_L' => $this->request->getVar('jml_jiwa_L'),
                'jml_jiwa_P' => $this->request->getVar('jml_jiwa_P'),
                'jml_kader_angL' => $this->request->getVar('jml_kader_angL'),
                'jml_kader_angP' => $this->request->getVar('jml_kader_angP'),
                'jml_kader_umumL' => $this->request->getVar('jml_kader_umumL'),
                'jml_kader_umumP' => $this->request->getVar('jml_kader_umumP'),
                'jml_kader_khususL' => $this->request->getVar('jml_kader_khususL'),
                'jml_kader_khususP' => $this->request->getVar('jml_kader_khususP'),
                'jml_skrt_honorerL' => $this->request->getVar('jml_skrt_honorerL'),
                'jml_skrt_honorerP' => $this->request->getVar('jml_skrt_honorerP'),
                'jml_skrt_bantuanL' => $this->request->getVar('jml_skrt_bantuanL'),
                'jml_skrt_bantuanP' => $this->request->getVar('jml_skrt_bantuanP'),
                'keterangan' => $this->request->getVar('keterangan')
            ];
            $this->dataumumtppkkkecModel->save($data);
            session()->setFlashdata('pesan', "Data berhasil ditambahkan pada tahun $tahun.");
            return redirect()->to('/dataumumtppkkkec/index');
        } elseif ($btn == "batal") {
            return redirect()->to('/dataumumtppkkkec/index');
        }
    }

    public function delete($no)
    {
        $dataumum = $this->dataumumtppkkkecModel->getDataumumtppkkkec($no);
        $tahun = $dataumum['tahun'];
        $this->dataumumtppkkkecModel->where('no', $no)->delete();
        session()->setFlashdata('hapus', "Data berhasil dihapus pada tahun $tahun.");
        $cekdata = $this->dataumumtppkkkecModel->getData($tahun);
        if ($cekdata) {
            return redirect()->to("/dataumumtppkkkec/index");
        }
        return redirect()->to('/dataumumtppkkkec/index');
    }

    public function edit($no)
    {
        $data = [
            'tittle' => 'Data Umum TP PKK Kecamatan',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'wilayah' => $this->dataumumtppkkkecModel->getWilayah(),
            'dataumumtppkkkec' => $this->dataumumtppkkkecModel->getDataumumtppkkkec($no)
        ];
        return view('laporan/admin/dataumumtppkkkec/edit', $data);
    }

    public function update($no)
    {
        $tanggal = $this->request->getVar('tanggal');
        $tahun = substr($tanggal, 0, 4);
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            if (!$this->validate([
                'nama_wilayah' => [
                    'rules' => 'required[dataumumtppkkkecamatan.nama_wilayah]',
                    'errors' => [
                        'required' => 'Desa/Kelurahan harus diisi!'
                    ]
                ],
                'tanggal' => [
                    'rules' => 'required[dataumumtppkkkecamatan.tanggal]',
                    'errors' => [
                        'required' => 'Tanggal harus diisi!'
                    ]
                ],
                'jml_klp_dusun' => [
                    'rules' => 'required[dataumumtppkkkecamatan.jml_klp_dusun]',
                    'errors' => [
                        'required' => 'harus diisi!'
                    ]
                ],
                'jml_klp_pkkrw' => [
                    'rules' => 'required[dataumumtppkkkecamatan.jml_klp_pkkrw]',
                    'errors' => [
                        'required' => 'harus diisi!'
                    ]
                ],
                'jml_klp_pkkrt' => [
                    'rules' => 'required[dataumumtppkkkecamatan.jml_klp_pkkrt]',
                    'errors' => [
                        'required' => 'harus diisi!'
                    ]
                ]
            ])) {
                return redirect()->to("/dataumumtppkkkec/edit/$no")->withInput();
            }
            $data = [
                'tanggal' => $tanggal,
                'tahun' => $tahun,
                'nama_wilayah' => $this->request->getVar('nama_wilayah'),
                'jml_klp_dusun' => $this->request->getVar('jml_klp_dusun'),
                'jml_klp_pkkrw' => $this->request->getVar('jml_klp_pkkrw'),
                'jml_klp_pkkrt' => $this->request->getVar('jml_klp_pkkrt'),
                'jml_klp_dasawisma' => $this->request->getVar('jml_klp_dasawisma'),
                'jml_krt' => $this->request->getVar('jml_krt'),
                'jml_kk' => $this->request->getVar('jml_kk'),
                'jml_jiwa_L' => $this->request->getVar('jml_jiwa_L'),
                'jml_jiwa_P' => $this->request->getVar('jml_jiwa_P'),
                'jml_kader_angL' => $this->request->getVar('jml_kader_angL'),
                'jml_kader_angP' => $this->request->getVar('jml_kader_angP'),
                'jml_kader_umumL' => $this->request->getVar('jml_kader_umumL'),
                'jml_kader_umumP' => $this->request->getVar('jml_kader_umumP'),
                'jml_kader_khususL' => $this->request->getVar('jml_kader_khususL'),
                'jml_kader_khususP' => $this->request->getVar('jml_kader_khususP'),
                'jml_skrt_honorerL' => $this->request->getVar('jml_skrt_honorerL'),
                'jml_skrt_honorerP' => $this->request->getVar('jml_skrt_honorerP'),
                'jml_skrt_bantuanL' => $this->request->getVar('jml_skrt_bantuanL'),
                'jml_skrt_bantuanP' => $this->request->getVar('jml_skrt_bantuanP'),
                'keterangan' => $this->request->getVar('keterangan')
            ];
            $this->dataumumtppkkkecModel->where('no', $no)->set($data)->update();
            session()->setFlashdata('pesan', "Data berhasil diubah pada tahun $tahun.");
            return redirect()->to("/DataumumtppkkkecCon/detail/$tahun");
        } elseif ($btn == "batal") {
            return redirect()->to("/DataumumtppkkkecCon/detail/$tahun");
        }
    }

    public function range()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'dataumumtppkkkec' => $this->dataumumtppkkkecModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/dataumumtppkkkec/range', $data);
    }

    public function lihatRange()
    {
        $wilayah = $this->dataumumtppkkkecModel->getWilayah();
        foreach ($wilayah as $w) {
            $kecamatan = $w['kecamatan'];
            $kabupaten = $w['kabupaten'];
            $provinsi = $w['provinsi'];
        }
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $tahun1 = substr($awal, 0, 4);
        $tahun2 = substr($akhir, 0, 4);
        $btn = $this->request->getVar('aksi');
        if ($btn == "lihat") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'PagesAdmin' => 'laporan',
                'awal' => $awal,
                'akhir' => $akhir,
                'kecamatan' => $kecamatan,
                'kabupaten' => $kabupaten,
                'provinsi' => $provinsi,
                'dataumumtppkkkec' => $this->dataumumtppkkkecModel->getRange($awal, $akhir),
                'total' => $this->dataumumtppkkkecModel->getTotalCetak($awal, $akhir),
                'tahun1' => $tahun1,
                'tahun2' => $tahun2
            ];
            return view('laporan/admin/dataumumtppkkkec/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/admin/laporan');
        }
    }

    public function print()
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $tahun1 = substr($awal, 0, 4);
        $tahun2 = substr($akhir, 0, 4);
        $wilayah = $this->dataumumtppkkkecModel->getWilayah();
        foreach ($wilayah as $w) {
            $kecamatan = $w['kecamatan'];
            $kabupaten = $w['kabupaten'];
            $provinsi = $w['provinsi'];
        }
        $data = [
            'dataumumtppkkkec' => $this->dataumumtppkkkecModel->getRange($awal, $akhir),
            'total' => $this->dataumumtppkkkecModel->getTotalCetak($awal, $akhir),
            'kecamatan' => $kecamatan,
            'kabupaten' => $kabupaten,
            'provinsi' => $provinsi,
            'tahun1' => $tahun1,
            'tahun2' => $tahun2,
            'awal' => $awal,
            'akhir' => $akhir
        ];
        $btn = $this->request->getVar('aksi');
        if ($btn == "print") {
            return view('laporan/admin/dataumumtppkkkec/print', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/dataumumtppkkkec/range');
        }
    }
}
