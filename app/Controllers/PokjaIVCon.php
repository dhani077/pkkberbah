<?php

namespace App\Controllers;

use App\Models\PokjaIVModel;

class PokjaIVCon extends BaseController
{
    protected $pokjaIVModel;

    public function __construct()
    {
        $this->pokjaIVModel = new PokjaIVModel();
    }

    public function index()
    {
        $pokjaIV = $this->pokjaIVModel->getPokjaIV();
        if ($pokjaIV == null) {
            $nama = "";
            $th = "";
            $tot = ['total' => [
                'totalkaderpos' => '',
                'totalkadergizi' => '',
                'totalkaderkesling' => '',
                'totalkadernarkoba' => '',
                'totalkaderphbs' => '',
                'totalkaderkb' => '',
                'totalposyandu' => '',
                'totalposterinteg' => '',
                'totalklplansia' => '',
                'totalanggotalansia' => '',
                'totalkartulansia' => '',
                'totalrmhjamban' => '',
                'totalrmhspal' => '',
                'totalrmhsampah' => '',
                'totalmck' => '',
                'totalpdam' => '',
                'totalsumur' => '',
                'totalairlain' => '',
                'totalpus' => '',
                'totalwus' => '',
                'totalakseptorL' => '',
                'totalakseptorP' => '',
                'totaltabungan' => ''
            ]];
            $total = $tot;
            $data = [
                'tittle' => 'Pokja IV',
                'PagesAdmin' => 'pokja',
                'tingkat' => '',
                'tahun' => '',
                'pokjaIV' => $this->pokjaIVModel->getData($nama, $th),
                'total' => $total
            ];
            return view('laporan/admin/pokjaIV/detail', $data);
        } elseif ($pokjaIV != null) {
            $data = [
                'tittle' => 'POKJA IV',
                'PagesAdmin' => 'pokja',
                'tahun' => $this->pokjaIVModel->getTahun()
            ];
            return view('laporan/admin/pokjaIV/index', $data);
        }
    }

    public function detail($tahun = false)
    {
        if ($tahun == false) {
            $tahun = $this->request->getVar('tahun');
        }
        $data = [
            'tittle' => 'Pokja IV',
            'PagesAdmin' => 'pokja',
            'tahun' => $tahun,
            'pokjaIV' => $this->pokjaIVModel->getData($tahun),
            'wilayah' => $this->pokjaIVModel->getWilayah(),
            'total' => $this->pokjaIVModel->getTotal($tahun)
        ];
        return view('laporan/admin/pokjaIV/detail', $data);
    }

    public function create()
    {
        session();
        $data = [
            'tittle' => 'Pokja IV',
            'PagesAdmin' => 'pokja',
            'wilayah' => $this->pokjaIVModel->getWilayah(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/pokjaIV/create', $data);
    }

    public function save()
    {
        $tanggal = $this->request->getVar('tanggal');
        $tahun = substr($tanggal, 0, 4);
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'kd_wilayah' => [
                    'rules' => 'required[pokja4.kd_wilayah]',
                    'errors' => [
                        'required' => 'Nama desa/kelurahan harus diisi'
                    ]
                ],
                'tanggal' => [
                    'rules' => 'required[pokja4.tanggal]',
                    'errors' => [
                        'required' => 'Tanggal harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to('/pokjaiv/create')->withInput();
            }

            $data = [
                'tanggal' => $tanggal,
                'tahun' => $tahun,
                'kd_wilayah' => $this->request->getVar('kd_wilayah'),
                'jml_kader_posyandu' => $this->request->getVar('jml_kader_posyandu'),
                'jml_kader_gizi' => $this->request->getVar('jml_kader_gizi'),
                'jml_kader_kesling' => $this->request->getVar('jml_kader_kesling'),
                'jml_kader_narkoba' => $this->request->getVar('jml_kader_narkoba'),
                'jml_kader_phbs' => $this->request->getVar('jml_kader_phbs'),
                'jml_kader_kb' => $this->request->getVar('jml_kader_kb'),
                'jml_posyandu_ksht' => $this->request->getVar('jml_posyandu_ksht'),
                'jml_posyandu_integrasi' => $this->request->getVar('jml_posyandu_integrasi'),
                'jml_klp_lansia_posyandu' => $this->request->getVar('jml_klp_lansia_posyandu'),
                'jml_anggota_lansia_posyandu' => $this->request->getVar('jml_anggota_lansia_posyandu'),
                'jml_kartu_lansia_posyandu' => $this->request->getVar('jml_kartu_lansia_posyandu'),
                'jml_rmh_jamban_kshtlh' => $this->request->getVar('jml_rmh_jamban_kshtlh'),
                'jml_rmh_spal_kshtlh' => $this->request->getVar('jml_rmh_spal_kshtlh'),
                'jml_rmh_sampah_kshtlh' => $this->request->getVar('jml_rmh_sampah_kshtlh'),
                'jml_mck_kshtlh' => $this->request->getVar('jml_mck_kshtlh'),
                'jml_air_pdam_kshtlh' => $this->request->getVar('jml_air_pdam_kshtlh'),
                'jml_air_sumur_kshtlh' => $this->request->getVar('jml_air_sumur_kshtlh'),
                'jml_air_lain_kshtlh' => $this->request->getVar('jml_air_lain_kshtlh'),
                'jml_pus_rncnsehat' => $this->request->getVar('jml_pus_rncnsehat'),
                'jml_wus_rncnsehat' => $this->request->getVar('jml_wus_rncnsehat'),
                'jml_akseptorl_rncnsehat' => $this->request->getVar('jml_akseptorl_rncnsehat'),
                'jml_akseptorp_rncnsehat' => $this->request->getVar('jml_akseptorp_rncnsehat'),
                'jml_tabkel_rncnsehat' => $this->request->getVar('jml_tabkel_rncnsehat'),
                'keterangan' => $this->request->getVar('keterangan')
            ];
            $this->pokjaIVModel->save($data);
            session()->setFlashdata('pesan', "Data berhasil ditambahkan pada tahun $tahun.");
            return redirect()->to('/pokjaiv/index');
        } elseif ($btn == "batal") {
            return redirect()->to("/pokjaiv/index");
        }
    }

    public function delete($no)
    {
        $data = $this->pokjaIVModel->getPokjaIV($no);
        $tahun = $data['tahun'];
        $this->pokjaIVModel->where('no', $no)->delete();
        session()->setFlashdata('hapus', "Data berhasil dihapus pada tahun $tahun.");
        return redirect()->to('/pokjaiv/index');
    }

    public function edit($no)
    {
        $data = [
            'tittle' => 'Pokja IV',
            'PagesAdmin' => 'pokja',
            'validation' => \Config\Services::validation(),
            'wilayah' => $this->pokjaIVModel->getWilayah(),
            'pokjaIV' => $this->pokjaIVModel->getPokjaIV($no)
        ];
        return view('laporan/admin/pokjaIV/edit', $data);
    }

    public function update($no)
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            if (!$this->validate([
                'kd_wilayah' => [
                    'rules' => 'required[pokja4.kd_wilayah]',
                    'errors' => [
                        'required' => 'Nama desa/kelurahan harus diisi'
                    ]
                ],
                'tanggal' => [
                    'rules' => 'required[pokja4.tanggal]',
                    'errors' => [
                        'required' => 'Tanggal harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to("/pokjaIV/edit/$no")->withInput();
            }
            $tanggal = $this->request->getVar('tanggal');
            $tahun = substr($tanggal, 0, 4);
            $data = [
                'tanggal' => $tanggal,
                'tahun' => $tahun,
                'kd_wilayah' => $this->request->getVar('kd_wilayah'),
                'jml_kader_posyandu' => $this->request->getVar('jml_kader_posyandu'),
                'jml_kader_gizi' => $this->request->getVar('jml_kader_gizi'),
                'jml_kader_kesling' => $this->request->getVar('jml_kader_kesling'),
                'jml_kader_narkoba' => $this->request->getVar('jml_kader_narkoba'),
                'jml_kader_phbs' => $this->request->getVar('jml_kader_phbs'),
                'jml_kader_kb' => $this->request->getVar('jml_kader_kb'),
                'jml_posyandu_ksht' => $this->request->getVar('jml_posyandu_ksht'),
                'jml_posyandu_integrasi' => $this->request->getVar('jml_posyandu_integrasi'),
                'jml_klp_lansia_posyandu' => $this->request->getVar('jml_klp_lansia_posyandu'),
                'jml_anggota_lansia_posyandu' => $this->request->getVar('jml_anggota_lansia_posyandu'),
                'jml_kartu_lansia_posyandu' => $this->request->getVar('jml_kartu_lansia_posyandu'),
                'jml_rmh_jamban_kshtlh' => $this->request->getVar('jml_rmh_jamban_kshtlh'),
                'jml_rmh_spal_kshtlh' => $this->request->getVar('jml_rmh_spal_kshtlh'),
                'jml_rmh_sampah_kshtlh' => $this->request->getVar('jml_rmh_sampah_kshtlh'),
                'jml_mck_kshtlh' => $this->request->getVar('jml_mck_kshtlh'),
                'jml_air_pdam_kshtlh' => $this->request->getVar('jml_air_pdam_kshtlh'),
                'jml_air_sumur_kshtlh' => $this->request->getVar('jml_air_sumur_kshtlh'),
                'jml_air_lain_kshtlh' => $this->request->getVar('jml_air_lain_kshtlh'),
                'jml_pus_rncnsehat' => $this->request->getVar('jml_pus_rncnsehat'),
                'jml_wus_rncnsehat' => $this->request->getVar('jml_wus_rncnsehat'),
                'jml_akseptorl_rncnsehat' => $this->request->getVar('jml_akseptorl_rncnsehat'),
                'jml_akseptorp_rncnsehat' => $this->request->getVar('jml_akseptorp_rncnsehat'),
                'jml_tabkel_rncnsehat' => $this->request->getVar('jml_tabkel_rncnsehat'),
                'keterangan' => $this->request->getVar('keterangan')
            ];
            $this->pokjaIVModel->where('no', $no)->set($data)->update();
            session()->setFlashdata('pesan', "Data berhasil diubah pada tahun $tahun.");
            return redirect()->to('/pokjaiv/index');
        } elseif ($btn == "batal") {
            $pokjaIV = $this->pokjaIVModel->getPokjaIV($no);
            $tahun = $pokjaIV['tahun'];
            return redirect()->to("/PokjaIVCon/detail/$tahun");
        }
    }

    public function range()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'pokjaIV' => $this->pokjaIVModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/pokjaIV/range', $data);
    }

    public function lihatRange()
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $tahun1 = substr($awal, 0, 4);
        $tahun2 = substr($akhir, 0, 4);
        $btn = $this->request->getVar('aksi');
        if ($btn == "print") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'PagesAdmin' => 'laporan',
                'pokjaIV' => $this->pokjaIVModel->getRange($awal, $akhir),
                'wilayah' => $this->pokjaIVModel->getWilayah(),
                'total' => $this->pokjaIVModel->getTotalCetak($awal, $akhir),
                'tahun1' => $tahun1,
                'tahun2' => $tahun2,
                'awal' => $awal,
                'akhir' => $akhir
            ];
            return view('laporan/admin/pokjaIV/lihatrange', $data);
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
                'pokjaIV' => $this->pokjaIVModel->getRange($awal, $akhir),
                'wilayah' => $this->pokjaIVModel->getWilayah(),
                'total' => $this->pokjaIVModel->getTotalCetak($awal, $akhir),
                'tahun1' => $tahun1,
                'tahun2' => $tahun2
            ];
            return view('laporan/admin/pokjaIV/print', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/pokjaiv/range');
        }
    }
}
