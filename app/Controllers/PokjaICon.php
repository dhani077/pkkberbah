<?php

namespace App\Controllers;

use App\Models\PokjaIModel;

class PokjaICon extends BaseController
{
    protected $pokjaIModel;

    public function __construct()
    {
        $this->pokjaIModel = new PokjaIModel();
    }

    public function index()
    {
        $pokjaI = $this->pokjaIModel->getPokjaI();
        if ($pokjaI == null) {
            $th = "";
            $tot = ['total' => [
                'totalpkbn' => '',
                'totalpkdrt' => '',
                'totalpola' => '',
                'totalklppkbn' => '',
                'totalanggotapkbn' => '',
                'totalklppkdrt' => '',
                'totalanggotapkdrt' => '',
                'totalklppola' => '',
                'totalanggotapola' => '',
                'totalklplansia' => '',
                'totalanggotalansia' => '',
                'totalklpbakti' => '',
                'totalklpagama' => '',
                'totalklpmati' => '',
                'totalklpjimpit' => '',
                'totalklparisan' => ''
            ]];
            $total = $tot;
            $data = [
                'tittle' => 'Pokja I',
                'PagesAdmin' => 'pokja',
                'tingkat' => "",
                'tahun' => "",
                'pokjaI' => $this->pokjaIModel->getData($th),
                'total' => $total
            ];
            return view('laporan/admin/pokjaI/detail', $data);
        } elseif ($pokjaI != null) {
            $data = [
                'tittle' => 'Pokja I',
                'PagesAdmin' => 'pokja',
                'tahun' => $this->pokjaIModel->getTahun(),
            ];
            return view('laporan/admin/pokjaI/index', $data);
        }
    }

    public function detail($tahun = false)
    {
        if ($tahun == false) {
            $tahun = $this->request->getVar('tahun');
        }
        $data = [
            'tittle' => 'Pokja I',
            'PagesAdmin' => 'pokja',
            'tahun' => $tahun,
            'pokjaI' => $this->pokjaIModel->getData($tahun),
            'wilayah' =>  $this->pokjaIModel->getWilayah(),
            'total' => $this->pokjaIModel->getTotal($tahun),
        ];
        return view('laporan/admin/pokjaI/detail', $data);
    }

    public function create()
    {
        session();
        $data = [
            'tittle' => 'Pokja I',
            'PagesAdmin' => 'pokja',
            'wilayah' => $this->pokjaIModel->getWilayah(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/pokjaI/create', $data);
    }

    public function save()
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'kd_wilayah' => [
                    'rules' => 'required[pokjaI.kd_wilayah]',
                    'errors' => [
                        'required' => 'Nama desa/kelurahan harus diisi'
                    ]
                ],
                'tanggal' => [
                    'rules' => 'required[pokjaI.tanggal]',
                    'errors' => [
                        'required' => 'Tanggal harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to('/pokjai/create')->withInput();
            }
            $tanggal = $this->request->getVar('tanggal');
            $tahun = substr($tanggal, 0, 4);
            $data = [
                'tanggal' => $tanggal,
                'tahun' => $tahun,
                'kd_wilayah' => $this->request->getVar('kd_wilayah'),
                'jml_kader_pkbn' => $this->request->getVar('jml_kader_pkbn'),
                'jml_kader_pkdrt' => $this->request->getVar('jml_kader_pkdrt'),
                'jml_kader_polaasuh' => $this->request->getVar('jml_kader_polaasuh'),
                'jml_klp_simulasi_pkbn' => $this->request->getVar('jml_klp_simulasi_pkbn'),
                'jml_anggota_pkbn' => $this->request->getVar('jml_anggota_pkbn'),
                'jml_klp_simulasi_pkdrt' => $this->request->getVar('jml_klp_simulasi_pkdrt'),
                'jml_anggota_pkdrt' => $this->request->getVar('jml_anggota_pkdrt'),
                'jml_klp_polaasuh' => $this->request->getVar('jml_klp_polaasuh'),
                'jml_anggota_polaasuh' => $this->request->getVar('jml_anggota_polaasuh'),
                'jml_klp_lansia' => $this->request->getVar('jml_klp_lansia'),
                'jml_anggota_lansia' => $this->request->getVar('jml_anggota_lansia'),
                'jml_klp_kerjabakti' => $this->request->getVar('jml_klp_kerjabakti'),
                'jml_klp_rknmati' => $this->request->getVar('jml_klp_rknmati'),
                'jml_klp_keagamaan' => $this->request->getVar('jml_klp_keagamaan'),
                'jml_klp_jimpitan' => $this->request->getVar('jml_klp_jimpitan'),
                'jml_klp_arisan' => $this->request->getVar('jml_klp_arisan'),
                'keterangan' => $this->request->getVar('keterangan')
            ];
            $this->pokjaIModel->save($data);
            session()->setFlashdata('pesan', "Data berhasil ditambahkan pada tahun $tahun.");
            return redirect()->to('/pokjai/index');
        } elseif ($btn == "batal") {
            return redirect()->to('/pokjai/index');
        }
    }

    public function delete($num)
    {
        $data = $this->pokjaIModel->getPokjaI($num);
        $tahun = $data['tahun'];
        $this->pokjaIModel->where('no', $num)->delete();
        session()->setFlashdata('hapus', "Data berhasil dihapus pada tahun $tahun.");
        return redirect()->to('/pokjai/index');
    }

    public function edit($no)
    {
        $data = [
            'tittle' => 'Pokja I',
            'PagesAdmin' => 'pokja',
            'wilayah' => $this->pokjaIModel->getWilayah(),
            'validation' => \Config\Services::validation(),
            'pokjaI' => $this->pokjaIModel->getPokjaI($no)
        ];
        return view('laporan/admin/pokjaI/edit', $data);
    }

    public function update($no)
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            if (!$this->validate([
                'kd_wilayah' => [
                    'rules' => 'required[pokjaI.kd_wilayah]',
                    'errors' => [
                        'required' => 'Nama desa/kelurahan harus diisi'
                    ],
                    'tanggal' => [
                        'rules' => 'required[pokjaI.tanggal]',
                        'errors' => [
                            'required' => 'Tanggal harus diisi'
                        ]
                    ]
                ]
            ])) {
                return redirect()->to("/pokjai/edit/$no")->withInput();
            }
            $tanggal = $this->request->getVar('tanggal');
            $tahun = substr($tanggal, 0, 4);
            $data = [
                'tanggal' => $tanggal,
                'tahun' => $tahun,
                'kd_wilayah' => $this->request->getVar('kd_wilayah'),
                'jml_kader_pkbn' => $this->request->getVar('jml_kader_pkbn'),
                'jml_kader_pkdrt' => $this->request->getVar('jml_kader_pkdrt'),
                'jml_kader_polaasuh' => $this->request->getVar('jml_kader_polaasuh'),
                'jml_klp_simulasi_pkbn' => $this->request->getVar('jml_klp_simulasi_pkbn'),
                'jml_anggota_pkbn' => $this->request->getVar('jml_anggota_pkbn'),
                'jml_klp_simulasi_pkdrt' => $this->request->getVar('jml_klp_simulasi_pkdrt'),
                'jml_anggota_pkdrt' => $this->request->getVar('jml_anggota_pkdrt'),
                'jml_klp_polaasuh' => $this->request->getVar('jml_klp_polaasuh'),
                'jml_anggota_polaasuh' => $this->request->getVar('jml_anggota_polaasuh'),
                'jml_klp_lansia' => $this->request->getVar('jml_klp_lansia'),
                'jml_anggota_lansia' => $this->request->getVar('jml_anggota_lansia'),
                'jml_klp_kerjabakti' => $this->request->getVar('jml_klp_kerjabakti'),
                'jml_klp_rknmati' => $this->request->getVar('jml_klp_rknmati'),
                'jml_klp_keagamaan' => $this->request->getVar('jml_klp_keagamaan'),
                'jml_klp_jimpitan' => $this->request->getVar('jml_klp_jimpitan'),
                'jml_klp_arisan' => $this->request->getVar('jml_klp_arisan'),
                'keterangan' => $this->request->getVar('keterangan')
            ];
            $this->pokjaIModel->where('no', $no)->set($data)->update();
            session()->setFlashdata('pesan', "Data berhasil diubah pada tahun $tahun.");
            return redirect()->to('/pokjai/index');
        } elseif ($btn == "batal") {
            $pokjaI = $this->pokjaIModel->getPokjaI($no);
            $tahun = $pokjaI['tahun'];
            return redirect()->to("/PokjaICon/detail/$tahun");
        }
    }

    public function range()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'pokjaI' => $this->pokjaIModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/pokjaI/range', $data);
    }

    public function lihatRange()
    {
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
                'pokjaI' => $this->pokjaIModel->getRange($awal, $akhir),
                'wilayah' => $this->pokjaIModel->getWilayah(),
                'total' => $this->pokjaIModel->getTotalCetak($awal, $akhir),
                'tahun1' => $tahun1,
                'tahun2' => $tahun2
            ];
            return view('laporan/admin/pokjaI/lihatrange', $data);
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
        $btn = $this->request->getVar('aksi');
        if ($btn == "print") {
            $data = [
                'pokjaI' => $this->pokjaIModel->getRange($awal, $akhir),
                'wilayah' => $this->pokjaIModel->getWilayah(),
                'total' => $this->pokjaIModel->getTotalCetak($awal, $akhir),
                'tahun1' => $tahun1,
                'tahun2' => $tahun2
            ];
            return view('laporan/admin/pokjaI/print', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/pokjai/range');
        }
    }
}
