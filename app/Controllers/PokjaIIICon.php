<?php

namespace App\Controllers;

use App\Models\PokjaIIIModel;

class PokjaIIICon extends BaseController
{
    protected $pokjaIIIModel;

    public function __construct()
    {
        $this->pokjaIIIModel = new PokjaIIIModel();
    }

    public function index()
    {
        $pokjaIII = $this->pokjaIIIModel->getPokjaIII();
        if ($pokjaIII == null) {
            $nama = "";
            $th = "";
            $tot = ['total' => [
                'totalkaderpangan' => '',
                'totalkadersandang' => '',
                'totalkadertatart' => '',
                'totalmknberas' => '',
                'totalmknnonberas' => '',
                'totalternak' => '',
                'totalikan' => '',
                'totalwarung' => '',
                'totallumbung' => '',
                'totaltoga' => '',
                'totaltnmkeras' => '',
                'totalindpangan' => '',
                'totalindsandang' => '',
                'totalindjasa' => '',
                'totalrmhlayak' => '',
                'totalrmhtdklayak' => ''
            ]];
            $total = $tot;
            $data = [
                'tittle' => 'Pokja III',
                'PagesAdmin' => 'pokja',
                'tingkat' => '',
                'tahun' => '',
                'pokjaIII' => $this->pokjaIIIModel->getData($nama, $th),
                'pkbn' => $total,
                'pkdrt' => $total,
                'pola' => $total,
                'simulasipkbn' => $total,
                'anggotapkbn' => $total,
                'simulasipkdrt' => $total,
                'anggotapkdrt' => $total,
                'klppolaasuh' => $total,
                'anggotapolaasuh' => $total,
                'klplansia' => $total,
                'anggotalansia' => $total,
                'klpkerjabakti' => $total,
                'klprknmati' => $total,
                'klpkeagamaan' => $total,
                'klpjimpitan' => $total,
                'klparisan' => $total,
                'total' => $total
            ];
            return view('laporan/admin/pokjaIII/detail', $data);
        } elseif ($pokjaIII != null) {
            $data = [
                'tittle' => 'Pokja III',
                'PagesAdmin' => 'pokja',
                'tahun' => $this->pokjaIIIModel->getTahun()
            ];
            return view('laporan/admin/pokjaIII/index', $data);
        }
    }

    public function detail($tahun = false)
    {
        if ($tahun == false) {
            $tahun = $this->request->getVar('tahun');
        }
        $data = [
            'tittle' => 'Pokja III',
            'PagesAdmin' => 'pokja',
            'tahun' => $tahun,
            'pokjaIII' => $this->pokjaIIIModel->getData($tahun),
            'wilayah' => $this->pokjaIIIModel->getWilayah(),
            'total' => $this->pokjaIIIModel->getTotal($tahun)
        ];
        return view('laporan/admin/pokjaIII/detail', $data);
    }

    public function create()
    {
        session();
        $data = [
            'tittle' => 'Pokja III',
            'PagesAdmin' => 'pokja',
            'wilayah' => $this->pokjaIIIModel->getWilayah(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/pokjaIII/create', $data);
    }

    public function save()
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'kd_wilayah' => [
                    'rules' => 'required[pokja3.kd_wilayah]',
                    'errors' => [
                        'required' => 'Nama desa/kelurahan harus diisi'
                    ]
                ],
                'tanggal' => [
                    'rules' => 'required[pokja3.tanggal]',
                    'errors' => [
                        'required' => 'Tanggal harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to('/pokjaiii/create')->withInput();
            }
            $tanggal = $this->request->getVar('tanggal');
            $tahun = substr($tanggal, 0, 4);
            $data = [
                'tanggal' => $tanggal,
                'tahun' => $tahun,
                'kd_wilayah' => $this->request->getVar('kd_wilayah'),
                'jml_kader_pangan' => $this->request->getVar('jml_kader_pangan'),
                'jml_kader_sandang' => $this->request->getVar('jml_kader_sandang'),
                'jml_kader_tatart' => $this->request->getVar('jml_kader_tatart'),
                'jml_mknpokok_beras' => $this->request->getVar('jml_mknpokok_beras'),
                'jml_mknpokok_nonberas' => $this->request->getVar('jml_mknpokok_nonberas'),
                'jml_pmnfaatn_ternak' => $this->request->getVar('jml_pmnfaatn_ternak'),
                'jml_pmnfaatn_ikan' => $this->request->getVar('jml_pmnfaatn_ikan'),
                'jml_pmnfaatn_warung' => $this->request->getVar('jml_pmnfaatn_warung'),
                'jml_pmnfaatn_lumbung' => $this->request->getVar('jml_pmnfaatn_lumbung'),
                'jml_pmnfaatn_toga' => $this->request->getVar('jml_pmnfaatn_toga'),
                'jml_pmnfaatn_tnmkeras' => $this->request->getVar('jml_pmnfaatn_tnmkeras'),
                'jml_ind_pangan' => $this->request->getVar('jml_ind_pangan'),
                'jml_ind_sandang' => $this->request->getVar('jml_ind_sandang'),
                'jml_ind_jasa' => $this->request->getVar('jml_ind_jasa'),
                'jml_rmh_layak' => $this->request->getVar('jml_rmh_layak'),
                'jml_rmh_tidaklayak' => $this->request->getVar('jml_rmh_tidaklayak'),
                'keterangan' => $this->request->getVar('keterangan')
            ];
            $this->pokjaIIIModel->save($data);
            session()->setFlashdata('pesan', "Data berhasil ditambahkan pada tahun $tahun.");
            return redirect()->to('/pokjaiii/index');
        } elseif ($btn == "batal") {
            return redirect()->to('/pokjaiii/index');
        }
    }

    public function delete($num)
    {
        $data = $this->pokjaIIIModel->getPokjaIII($num);
        $tahun = $data['tahun'];
        $this->pokjaIIIModel->where('no', $num)->delete();
        session()->setFlashdata('hapus', "Data berhasil dihapus pada tahun $tahun.");
        return redirect()->to('/pokjaiii/index');
    }

    public function edit($num)
    {
        $data = [
            'tittle' => 'Pokja III',
            'PagesAdmin' => 'pokja',
            'wilayah' => $this->pokjaIIIModel->getWilayah(),
            'validation' => \Config\Services::validation(),
            'pokjaIII' => $this->pokjaIIIModel->getPokjaIII($num)
        ];
        return view('laporan/admin/pokjaIII/edit', $data);
    }

    public function update($no)
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            if (!$this->validate([
                'kd_wilayah' => [
                    'rules' => 'required[pokja3.kd_wilayah]',
                    'errors' => [
                        'required' => 'Nama desa/kelurahan harus diisi'
                    ]
                ],
                'tanggal' => [
                    'rules' => 'required[pokja3.tanggal]',
                    'errors' => [
                        'required' => 'Tanggal harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to("/pokjaiii/edit/$no")->withInput();
            }
            $tanggal = $this->request->getVar('tanggal');
            $tahun = substr($tanggal, 0, 4);
            $data = [
                'tanggal' => $tanggal,
                'tahun' => $tahun,
                'kd_wilayah' => $this->request->getVar('kd_wilayah'),
                'jml_kader_pangan' => $this->request->getVar('jml_kader_pangan'),
                'jml_kader_sandang' => $this->request->getVar('jml_kader_sandang'),
                'jml_kader_tatart' => $this->request->getVar('jml_kader_tatart'),
                'jml_mknpokok_beras' => $this->request->getVar('jml_mknpokok_beras'),
                'jml_mknpokok_nonberas' => $this->request->getVar('jml_mknpokok_nonberas'),
                'jml_pmnfaatn_ternak' => $this->request->getVar('jml_pmnfaatn_ternak'),
                'jml_pmnfaatn_ikan' => $this->request->getVar('jml_pmnfaatn_ikan'),
                'jml_pmnfaatn_warung' => $this->request->getVar('jml_pmnfaatn_warung'),
                'jml_pmnfaatn_lumbung' => $this->request->getVar('jml_pmnfaatn_lumbung'),
                'jml_pmnfaatn_toga' => $this->request->getVar('jml_pmnfaatn_toga'),
                'jml_pmnfaatn_tnmkeras' => $this->request->getVar('jml_pmnfaatn_tnmkeras'),
                'jml_ind_pangan' => $this->request->getVar('jml_ind_pangan'),
                'jml_ind_sandang' => $this->request->getVar('jml_ind_sandang'),
                'jml_ind_jasa' => $this->request->getVar('jml_ind_jasa'),
                'jml_rmh_layak' => $this->request->getVar('jml_rmh_layak'),
                'jml_rmh_tidaklayak' => $this->request->getVar('jml_rmh_tidaklayak'),
                'keterangan' => $this->request->getVar('keterangan')
            ];
            $this->pokjaIIIModel->where('no', $no)->set($data)->update();
            session()->setFlashdata('pesan', "Data berhasil diubah pada tahun $tahun.");
            return redirect()->to('/pokjaiii/index');
        } elseif ($btn == "batal") {
            $pokjaIII = $this->pokjaIIIModel->getPokjaIII($no);
            $tahun = $pokjaIII['tahun'];
            return redirect()->to("/PokjaIIICon/detail/$tahun");
        }
    }

    public function range()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'pokjaIII' => $this->pokjaIIIModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];

        return view('laporan/admin/pokjaIII/range', $data);
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
                'pokjaIII' => $this->pokjaIIIModel->getRange($awal, $akhir),
                'wilayah' => $this->pokjaIIIModel->getWilayah(),
                'total' => $this->pokjaIIIModel->getTotalCetak($awal, $akhir),
                'tahun1' => $tahun1,
                'tahun2' => $tahun2,
                'awal' => $awal,
                'akhir' => $akhir
            ];
            return view('laporan/admin/pokjaIII/lihatrange', $data);
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
                'pokjaIII' => $this->pokjaIIIModel->getRange($awal, $akhir),
                'wilayah' => $this->pokjaIIIModel->getWilayah(),
                'total' => $this->pokjaIIIModel->getTotalCetak($awal, $akhir),
                'tahun1' => $tahun1,
                'tahun2' => $tahun2
            ];
            return view('laporan/admin/pokjaIII/print', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/pokjaiii/range');
        }
    }
}
