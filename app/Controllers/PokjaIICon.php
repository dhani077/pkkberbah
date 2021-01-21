<?php

namespace App\Controllers;

use App\Models\PokjaIIModel;

class PokjaIICon extends BaseController
{
    protected $pokjaIIModel;

    public function __construct()
    {
        $this->pokjaIIModel = new PokjaIIModel();
    }

    public function index()
    {
        $pokjaII = $this->pokjaIIModel->getPokjaII();
        if ($pokjaII == null) {
            $nama = "";
            $th = "";

            $tot = ['total' => [
                'totalbuta' => '',
                'totalklpa' => '',
                'totalpaketA' => '',
                'totalklpB' => '',
                'totalpaketB' => '',
                'totalklpC' => '',
                'totalpaketC' => '',
                'totalklpKF' => '',
                'totalpaketKF' => '',
                'totalklppaud' => '',
                'totalperpus' => '',
                'totalklpbkb' => '',
                'totalpesertabkb' => '',
                'totalapebkb' => '',
                'totalsimulasibkb' => '',
                'totaltutoKF' => '',
                'totalpaudkader' => '',
                'totalbkbkader' => '',
                'totalkoperasikader' => '',
                'totalktrmpilankader' => '',
                'totallp3kader' => '',
                'totaltpk3kader' => '',
                'totaldamaskader' => '',
                'totalklppemula' => '',
                'totalpsrtpemula' => '',
                'totalklpmadya' => '',
                'totalpsrtmadya' => '',
                'totalklputama' => '',
                'totalpsrtutama' => '',
                'totalklpmandiri' => '',
                'totalpsrtmandiri' => '',
                'totalklphkm' => '',
                'totalanggotahkm' => ''
            ]];
            $total = $tot;
            $data = [
                'tittle' => 'Pokja II',
                'PagesAdmin' => 'pokja',
                'tingkat' => '',
                'tahun' => '',
                'pokjaII' => $this->pokjaIIModel->getData($nama, $th),
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
            return view('laporan/admin/pokjaII/detail', $data);
        } elseif ($pokjaII != null) {
            $data = [
                'tittle' => 'Pokja II',
                'PagesAdmin' => 'pokja',
                'tahun' => $this->pokjaIIModel->getTahun(),
            ];
            return view('laporan/admin/pokjaII/index', $data);
        }
    }


    public function detail($tahun = false)
    {
        if ($tahun == false) {
            $tahun = $this->request->getVar('tahun');
        }
        $data = [
            'tittle' => 'Pokja II',
            'PagesAdmin' => 'pokja',
            'tahun' => $tahun,
            'pokjaII' => $this->pokjaIIModel->getData($tahun),
            'wilayah' => $this->pokjaIIModel->getWilayah(),
            'total' => $this->pokjaIIModel->getTotal($tahun)
        ];

        return view('laporan/admin/pokjaII/detail', $data);
    }

    public function create()
    {
        session();
        $data = [
            'tittle' => 'Pokja II',
            'PagesAdmin' => 'pokja',
            'wilayah' => $this->pokjaIIModel->getWilayah(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/pokjaII/create', $data);
    }

    public function save()
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'kd_wilayah' => [
                    'rules' => 'required[pokjaII.kd_wilayah]',
                    'errors' => [
                        'required' => 'Nama desa/kelurahan harus diisi'
                    ]
                ],
                'tanggal' => [
                    'rules' => 'required[pokjaII.tanggal]',
                    'errors' => [
                        'required' => 'Tanggal harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to('/pokjaii/create')->withInput();
            }
            $tanggal = $this->request->getVar('tanggal');
            $tahun = substr($tanggal, 0, 4);
            $data = [
                'tanggal' => $tanggal,
                'tahun' => $tahun,
                'kd_wilayah' => $this->request->getVar('kd_wilayah'),
                'jml_wrg_tiga_buta' => $this->request->getVar('jml_wrg_tiga_buta'),
                'jml_klp_bljr_paketa' => $this->request->getVar('jml_klp_bljr_paketa'),
                'jml_wrg_bljr_paketa' => $this->request->getVar('jml_wrg_bljr_paketa'),
                'jml_klp_bljr_paketb' => $this->request->getVar('jml_klp_bljr_paketb'),
                'jml_wrg_bljr_paketb' => $this->request->getVar('jml_wrg_bljr_paketb'),
                'jml_klp_bljr_paketc' => $this->request->getVar('jml_klp_bljr_paketc'),
                'jml_wrg_bljr_paketc' => $this->request->getVar('jml_wrg_bljr_paketc'),
                'jml_klp_bljr_kf' => $this->request->getVar('jml_klp_bljr_kf'),
                'jml_klp_bljr_kf_wrgbljr' => $this->request->getVar('jml_klp_bljr_kf_wrgbljr'),
                'jml_klp_bljr_paud' => $this->request->getVar('jml_klp_bljr_paud'),
                'jml_perpus' => $this->request->getVar('jml_perpus'),
                'jml_klp_bkb' => $this->request->getVar('jml_klp_bkb'),
                'jml_ibu_peserta_bkb' => $this->request->getVar('jml_ibu_peserta_bkb'),
                'jml_ape_bkb' => $this->request->getVar('jml_ape_bkb'),
                'jml_klp_simulasi_bkb' => $this->request->getVar('jml_klp_simulasi_bkb'),
                'jml_tuto_kf' => $this->request->getVar('jml_tuto_kf'),
                'jml_tuto_paud_kader' => $this->request->getVar('jml_tuto_paud_kader'),
                'jml_bkb_kader' => $this->request->getVar('jml_bkb_kader'),
                'jml_koperasi_kader' => $this->request->getVar('jml_koperasi_kader'),
                'jml_ktrmpilan_kader' => $this->request->getVar('jml_ktrmpilan_kader'),
                'jml_lp3_kader_latih' => $this->request->getVar('jml_lp3_kader_latih'),
                'jml_tpk3_kader_latih' => $this->request->getVar('jml_tpk3_kader_latih'),
                'jml_damas_kader_latih' => $this->request->getVar('jml_damas_kader_latih'),
                'jml_klp_pemula_prakop' => $this->request->getVar('jml_klp_pemula_prakop'),
                'jml_psrt_pemula_prakop' => $this->request->getVar('jml_psrt_pemula_prakop'),
                'jml_klp_madya_prakop' => $this->request->getVar('jml_klp_madya_prakop'),
                'jml_psrt_madya_prakop' => $this->request->getVar('jml_psrt_madya_prakop'),
                'jml_klp_utama_prakop' => $this->request->getVar('jml_klp_utama_prakop'),
                'jml_psrt_utama_prakop' => $this->request->getVar('jml_psrt_utama_prakop'),
                'jml_klp_mandiri_prakop' => $this->request->getVar('jml_klp_mandiri_prakop'),
                'jml_psrt_mandiri_prakop' => $this->request->getVar('jml_psrt_mandiri_prakop'),
                'jml_klp_kophkm' => $this->request->getVar('jml_klp_kophkm'),
                'jml_anggota_kophkm' => $this->request->getVar('jml_anggota_kophkm'),
                'keterangan' => $this->request->getVar('keterangan')
            ];
            $this->pokjaIIModel->save($data);
            session()->setFlashdata('pesan', "Data berhasil ditambahkan pada tahun $tahun.");
            return redirect()->to('/pokjaii/index');
        } elseif ($btn == "batal") {
            return redirect()->to('/pokjaii/index');
        }
    }

    public function delete($num)
    {
        $data = $this->pokjaIIModel->getPokjaII($num);
        $tahun = $data['tahun'];
        $this->pokjaIIModel->where('no', $num)->delete();
        session()->setFlashdata('hapus', "Data berhasil dihapus pada tahun $tahun.");
        return redirect()->to('/pokjaii/index');
    }

    public function edit($num)
    {
        $data = [
            'tittle' => 'Pokja II',
            'PagesAdmin' => 'pokja',
            'validation' => \Config\Services::validation(),
            'wilayah' => $this->pokjaIIModel->getWilayah(),
            'pokjaII' => $this->pokjaIIModel->getPokjaII($num)
        ];
        return view('laporan/admin/pokjaII/edit', $data);
    }

    public function update($no)
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            if (!$this->validate([
                'kd_wilayah' => [
                    'rules' => 'required[pokjaII.kd_wilayah]',
                    'errors' => [
                        'required' => 'Nama wilayah harus diisi'
                    ]
                ],
                'tanggal' => [
                    'rules' => 'required[pokjaI.tanggal]',
                    'errors' => [
                        'required' => 'Tanggal harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to("/pokjaii/edit/$no")->withInput();
            }
            $tanggal = $this->request->getVar('tanggal');
            $tahun = substr($tanggal, 0, 4);
            $data = [
                'tanggal' => $tanggal,
                'tahun' => $tahun,
                'kd_wilayah' => $this->request->getVar('kd_wilayah'),
                'jml_wrg_tiga_buta' => $this->request->getVar('jml_wrg_tiga_buta'),
                'jml_klp_bljr_paketa' => $this->request->getVar('jml_klp_bljr_paketa'),
                'jml_wrg_bljr_paketa' => $this->request->getVar('jml_wrg_bljr_paketa'),
                'jml_klp_bljr_paketb' => $this->request->getVar('jml_klp_bljr_paketb'),
                'jml_wrg_bljr_paketb' => $this->request->getVar('jml_wrg_bljr_paketb'),
                'jml_klp_bljr_paketc' => $this->request->getVar('jml_klp_bljr_paketc'),
                'jml_wrg_bljr_paketc' => $this->request->getVar('jml_wrg_bljr_paketc'),
                'jml_klp_bljr_kf' => $this->request->getVar('jml_klp_bljr_kf'),
                'jml_klp_bljr_kf_wrgbljr' => $this->request->getVar('jml_klp_bljr_kf_wrgbljr'),
                'jml_klp_bljr_paud' => $this->request->getVar('jml_klp_bljr_paud'),
                'jml_perpus' => $this->request->getVar('jml_perpus'),
                'jml_klp_bkb' => $this->request->getVar('jml_klp_bkb'),
                'jml_ibu_peserta_bkb' => $this->request->getVar('jml_ibu_peserta_bkb'),
                'jml_ape_bkb' => $this->request->getVar('jml_ape_bkb'),
                'jml_klp_simulasi_bkb' => $this->request->getVar('jml_klp_simulasi_bkb'),
                'jml_tuto_kf' => $this->request->getVar('jml_tuto_kf'),
                'jml_tuto_paud_kader' => $this->request->getVar('jml_tuto_paud_kader'),
                'jml_bkb_kader' => $this->request->getVar('jml_bkb_kader'),
                'jml_koperasi_kader' => $this->request->getVar('jml_koperasi_kader'),
                'jml_ktrmpilan_kader' => $this->request->getVar('jml_ktrmpilan_kader'),
                'jml_lp3_kader_latih' => $this->request->getVar('jml_lp3_kader_latih'),
                'jml_tpk3_kader_latih' => $this->request->getVar('jml_tpk3_kader_latih'),
                'jml_damas_kader_latih' => $this->request->getVar('jml_damas_kader_latih'),
                'jml_klp_pemula_prakop' => $this->request->getVar('jml_klp_pemula_prakop'),
                'jml_psrt_pemula_prakop' => $this->request->getVar('jml_psrt_pemula_prakop'),
                'jml_klp_madya_prakop' => $this->request->getVar('jml_klp_madya_prakop'),
                'jml_psrt_madya_prakop' => $this->request->getVar('jml_psrt_madya_prakop'),
                'jml_klp_utama_prakop' => $this->request->getVar('jml_klp_utama_prakop'),
                'jml_psrt_utama_prakop' => $this->request->getVar('jml_psrt_utama_prakop'),
                'jml_klp_mandiri_prakop' => $this->request->getVar('jml_klp_mandiri_prakop'),
                'jml_psrt_mandiri_prakop' => $this->request->getVar('jml_psrt_mandiri_prakop'),
                'jml_klp_kophkm' => $this->request->getVar('jml_klp_kophkm'),
                'jml_anggota_kophkm' => $this->request->getVar('jml_anggota_kophkm'),
                'keterangan' => $this->request->getVar('keterangan')
            ];
            $this->pokjaIIModel->where('no', $no)->set($data)->update();
            session()->setFlashdata('pesan', "Data berhasil diubah pada tahun $tahun.");
            return redirect()->to('/pokjaii/index');
        } elseif ($btn == "batal") {
            $pokjaII = $this->pokjaIIModel->getPokjaII($no);
            $tahun = $pokjaII['tahun'];
            return redirect()->to("/PokjaIICon/detail/$tahun");
        }
    }

    public function range()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'pokjaII' => $this->pokjaIIModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];

        return view('laporan/admin/pokjaII/range', $data);
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
                'pokjaII' => $this->pokjaIIModel->getRange($awal, $akhir),
                'wilayah' => $this->pokjaIIModel->getWilayah(),
                'total' => $this->pokjaIIModel->getTotalCetak($awal, $akhir),
                'tahun1' => $tahun1,
                'tahun2' => $tahun2,
                'awal' => $awal,
                'akhir' => $akhir
            ];
            return view('laporan/admin/pokjaII/lihatrange', $data);
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
                'pokjaII' => $this->pokjaIIModel->getRange($awal, $akhir),
                'wilayah' => $this->pokjaIIModel->getWilayah(),
                'total' => $this->pokjaIIModel->getTotalCetak($awal, $akhir),
                'tahun1' => $tahun1,
                'tahun2' => $tahun2,
            ];
            return view('laporan/admin/pokjaII/print', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/pokjaii/range');
        }
    }
}
