<?php

namespace App\Controllers;

use App\Models\DatapengunjungposyanduModel;
use App\Models\PosyanduModel;

class DatapengunjungposyanduCon extends BaseController
{
    protected $datapengunjungModel;
    protected $posyanduModel;

    public function __construct()
    {
        $this->datapengunjungModel = new DatapengunjungposyanduModel();
        $this->posyanduModel = new PosyanduModel();
    }

    public function detail($kdposyandu, $tahun = false)
    {
        if ($tahun == false) {
            $tahun = $this->request->getVar('tahun');
        }
        $posyandu = $this->posyanduModel->getData($kdposyandu);
        $namapos = $posyandu['nama_posyandu'];
        $kdWilayah = $posyandu['kd_wilayah'];
        $wilayah = $this->posyanduModel->getWilayah($kdWilayah);
        $datapengunjung = $this->datapengunjungModel->getDatapengunjungposyandu($kdposyandu, $tahun);
        $data = [
            'tittle' => 'Pengunjung Posyandu',
            'PagesAdmin' => 'pendataan',
            'datapengunjung' => $datapengunjung,
            'kdposyandu' => $kdposyandu,
            'wilayah' => $wilayah,
            'namapos' => $namapos,
            'tahun' => $tahun,
            'total' => $this->datapengunjungModel->getTotal($kdposyandu, $tahun)
        ];

        return view('laporan/admin/pengunjungposyandu/detail', $data);
    }

    public function tahun($kdposyandu)
    {
        $posyandu = $this->posyanduModel->getData($kdposyandu);
        $namapos = $posyandu['nama_posyandu'];
        $kdWilayah = $posyandu['kd_wilayah'];
        $wilayah = $this->posyanduModel->getWilayah($kdWilayah);
        $th = $this->datapengunjungModel->getTahun($kdposyandu);
        $data = [
            'tittle' => 'Pengunjung Posyandu',
            'PagesAdmin' => 'pendataan',
            'tahun' => $th,
            'kdposyandu' => $kdposyandu,
            'namapos' => $namapos,
            'wilayah' => $wilayah
        ];
        if ($data['tahun'] == null) {
            $nodata = "";
            $total = ['total' => [
                'totalbarustL' => '',
                'totalbarustP' => '',
                'totallamastL' => '',
                'totallamastP' => '',
                'totalbarulmL' => '',
                'totalbarulmP' => '',
                'totallamalmL' => '',
                'totallamalmP' => '',
                'totalwus' => '',
                'totalpus' => '',
                'totalhamil' => '',
                'totalnyusu' => '',
                'totalkaderL' => '',
                'totalkaderP' => '',
                'totalplkbL' => '',
                'totalplkbP' => '',
                'totalmedisL' => '',
                'totalmedisP' => '',
                'totallahirL' => '',
                'totallahirP' => '',
                'totalmnglL' => '',
                'totalmnglP' => ''
            ]];
            $data = [
                'tittle' => 'Pengunjung Posyandu',
                'PagesAdmin' => 'pendataan',
                'datapengunjung' => $this->datapengunjungModel->getDatapengunjungposyandu($kdposyandu, $th),
                'wilayah' => $wilayah,
                'kdposyandu' => $kdposyandu,
                'tahun' => $nodata,
                'namapos' => $namapos,
                'total' => $total
            ];
            return view('laporan/admin/pengunjungposyandu/detail', $data);
        } elseif ($data['tahun'] != null) {
            return view('laporan/admin/pengunjungposyandu/tahun', $data);
        }
    }

    public function create($kdPosyandu)
    {
        $posyandu = $this->posyanduModel->getData($kdPosyandu);
        session();
        $data = [
            'tittle' => 'Pengunjung Posyandu',
            'PagesAdmin' => 'pendataan',
            'posyandu' => $posyandu,
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/pengunjungposyandu/create', $data);
    }

    public function save()
    {
        $kdposyandu = $this->request->getVar('kd_posyandu');
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'tanggal' => [
                    'rules' => 'required[datapengunjungposyandu.tanggal]',
                    'errors' => [
                        'required' => 'Tanggal harus diisi'
                    ]
                ],
                'harus1' => [
                    'rules' => 'required[datapengunjungposyandu.harus1]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'harus2' => [
                    'rules' => 'required[datapengunjungposyandu.harus2]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'harus3' => [
                    'rules' => 'required[datapengunjungposyandu.harus3]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'harus4' => [
                    'rules' => 'required[datapengunjungposyandu.harus4]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'harus5' => [
                    'rules' => 'required[datapengunjungposyandu.harus5]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'harus6' => [
                    'rules' => 'required[datapengunjungposyandu.harus6]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'harus7' => [
                    'rules' => 'required[datapengunjungposyandu.harus7]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'harus8' => [
                    'rules' => 'required[datapengunjungposyandu.harus8]',
                    'errors' => [
                        'required' => 'Tharus diisi'
                    ]
                ],
                'harus9' => [
                    'rules' => 'required[datapengunjungposyandu.harus9]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'harus10' => [
                    'rules' => 'required[datapengunjungposyandu.harus10]',
                    'errors' => [
                        'required' => 'Tharus diisi'
                    ]
                ],
                'harus11' => [
                    'rules' => 'required[datapengunjungposyandu.harus11]',
                    'errors' => [
                        'required' => 'Tharus diisi'
                    ]
                ],
                'harus12' => [
                    'rules' => 'required[datapengunjungposyandu.harus12]',
                    'errors' => [
                        'required' => 'Tharus diisi'
                    ]
                ],
                'harus13' => [
                    'rules' => 'required[datapengunjungposyandu.harus13]',
                    'errors' => [
                        'required' => 'Tharus diisi'
                    ]
                ],
                'harus14' => [
                    'rules' => 'required[datapengunjungposyandu.harus14]',
                    'errors' => [
                        'required' => 'Tharus diisi'
                    ]
                ],
                'harus15' => [
                    'rules' => 'required[datapengunjungposyandu.harus15]',
                    'errors' => [
                        'required' => 'Tharus diisi'
                    ]
                ],
                'harus16' => [
                    'rules' => 'required[datapengunjungposyandu.harus16]',
                    'errors' => [
                        'required' => 'Tharus diisi'
                    ]
                ],
                'harus17' => [
                    'rules' => 'required[datapengunjungposyandu.harus17]',
                    'errors' => [
                        'required' => 'Tharus diisi'
                    ]
                ],
                'harus18' => [
                    'rules' => 'required[datapengunjungposyandu.harus18]',
                    'errors' => [
                        'required' => 'Tharus diisi'
                    ]
                ],
                'harus19' => [
                    'rules' => 'required[datapengunjungposyandu.harus19]',
                    'errors' => [
                        'required' => 'Tharus diisi'
                    ]
                ],
                'harus20' => [
                    'rules' => 'required[datapengunjungposyandu.harus20]',
                    'errors' => [
                        'required' => 'Tharus diisi'
                    ]
                ],
                'harus21' => [
                    'rules' => 'required[datapengunjungposyandu.harus21]',
                    'errors' => [
                        'required' => 'Tharus diisi'
                    ]
                ],
                'harus22' => [
                    'rules' => 'required[datapengunjungposyandu.harus22]',
                    'errors' => [
                        'required' => 'Tharus diisi'
                    ]
                ]
            ])) {
                return redirect()->to("/pengunjungposyandu/create/$kdposyandu")->withInput();
            }
            $tanggal = $this->request->getVar('tanggal');
            $bl = substr($tanggal, 5, 2);
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
            $tahun = substr($tanggal, 0, 4);
            $data = [
                'kd_posyandu' => $kdposyandu,
                'tanggal' => $tanggal,
                'tahun' => $tahun,
                'bulan' => $bulan,
                'jml_pengunjung_sthun_baruL' => $this->request->getVar('jml_pengunjung_sthun_baruL'),
                'jml_pengunjung_sthun_baruP' => $this->request->getVar('jml_pengunjung_sthun_baruP'),
                'jml_pengunjung_sthun_lamaL' => $this->request->getVar('jml_pengunjung_sthun_lamaL'),
                'jml_pengunjung_sthun_lamaP' => $this->request->getVar('jml_pengunjung_sthun_lamaP'),
                'jml_pengunjung_limath_baruL' => $this->request->getVar('jml_pengunjung_limath_baruL'),
                'jml_pengunjung_limath_baruP' => $this->request->getVar('jml_pengunjung_limath_baruP'),
                'jml_pengunjung_limath_lamaL' => $this->request->getVar('jml_pengunjung_limath_lamaL'),
                'jml_pengunjung_limath_lamaP' => $this->request->getVar('jml_pengunjung_limath_lamaP'),
                'jml_pengunjung_wus' => $this->request->getVar('jml_pengunjung_wus'),
                'jml_pengunjung_pus_ibu' => $this->request->getVar('jml_pengunjung_pus_ibu'),
                'jml_pengunjung_hamil_ibu' => $this->request->getVar('jml_pengunjung_hamil_ibu'),
                'jml_pengunjung_nyusu_ibu' => $this->request->getVar('jml_pengunjung_nyusu_ibu'),
                'jml_hadir_kader_l' => $this->request->getVar('jml_hadir_kader_l'),
                'jml_hadir_kader_p' => $this->request->getVar('jml_hadir_kader_p'),
                'jml_hadir_plkb_l' => $this->request->getVar('jml_hadir_plkb_l'),
                'jml_hadir_plkb_p' => $this->request->getVar('jml_hadir_plkb_p'),
                'jml_hadir_medis_l' => $this->request->getVar('jml_hadir_medis_l'),
                'jml_hadir_medis_p' => $this->request->getVar('jml_hadir_medis_p'),
                'jml_bayi_lahirL' => $this->request->getVar('jml_bayi_lahirL'),
                'jml_bayi_lahirP' => $this->request->getVar('jml_bayi_lahirP'),
                'jml_bayi_mnglL' => $this->request->getVar('jml_bayi_mnglL'),
                'jml_bayi_mnglP' => $this->request->getVar('jml_bayi_mnglP'),
                'keterangan' => $this->request->getVar('keterangan')
            ];
            $this->datapengunjungModel->save($data);
            session()->setFlashdata('pesan', "Data berhasil ditambahkan pada tahun $tahun.");
            return redirect()->to("/pengunjungposyandu/tahun/$kdposyandu");
        } elseif ($btn == "batal") {
            return redirect()->to("/pengunjungposyandu/tahun/$kdposyandu");
        }
    }

    public function delete($num)
    {
        $pengunjung = $this->datapengunjungModel->getDataNo($num);
        $kdpos = $pengunjung['kd_posyandu'];
        $tahun = $pengunjung['tahun'];
        $this->datapengunjungModel->where('no', $num)->delete();
        session()->setFlashdata('hapus', "Data berhasil dihapus pada tahun $tahun.");
        return redirect()->to("/pengunjungposyandu/tahun/$kdpos");
    }

    public function edit($num)
    {
        $data = [
            'tittle' => 'Pengunjung Posyandu',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'datapengunjung' => $this->datapengunjungModel->getDataNo($num)
        ];
        return view('laporan/admin/pengunjungposyandu/edit', $data);
    }

    public function update($num)
    {
        $kdposyandu = $this->request->getVar('kd_posyandu');
        $tanggal = $this->request->getVar('tanggal');
        $tahun = substr($tanggal, 0, 4);
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            if (!$this->validate([
                'tanggal' => [
                    'rules' => 'required[datapengunjungposyandu.tanggal]',
                    'errors' => [
                        'required' => 'Tanggal harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to("/pengunjungposyandu/edit/$num")->withInput();
            }
            $bl = substr($tanggal, 5, 2);
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
            $jml_pengunjung_sthun_baruL = $this->request->getVar('jml_pengunjung_sthun_baruL');
            if (empty($jml_pengunjung_sthun_baruL)) {
                $jml_pengunjung_sthun_baruL = 0;
            }
            $jml_pengunjung_sthun_baruP = $this->request->getVar('jml_pengunjung_sthun_baruP');
            if (empty($jml_pengunjung_sthun_baruP)) {
                $jml_pengunjung_sthun_baruP = 0;
            }
            $jml_pengunjung_sthun_lamaL = $this->request->getVar('jml_pengunjung_sthun_lamaL');
            if (empty($jml_pengunjung_sthun_lamaL)) {
                $jml_pengunjung_sthun_lamaL = 0;
            }
            $jml_pengunjung_sthun_lamaP = $this->request->getVar('jml_pengunjung_sthun_lamaP');
            if (empty($jml_pengunjung_sthun_lamaP)) {
                $jml_pengunjung_sthun_lamaP = 0;
            }
            $jml_pengunjung_limath_baruL = $this->request->getVar('jml_pengunjung_limath_baruL');
            if (empty($jml_pengunjung_limath_baruL)) {
                $jml_pengunjung_limath_baruL = 0;
            }
            $jml_pengunjung_limath_baruP = $this->request->getVar('jml_pengunjung_limath_baruP');
            if (empty($jml_pengunjung_limath_baruP)) {
                $jml_pengunjung_limath_baruP = 0;
            }
            $jml_pengunjung_limath_lamaL = $this->request->getVar('jml_pengunjung_limath_lamaL');
            if (empty($jml_pengunjung_limath_lamaL)) {
                $jml_pengunjung_limath_lamaL = 0;
            }
            $jml_pengunjung_limath_lamaP = $this->request->getVar('jml_pengunjung_limath_lamaP');
            if (empty($jml_pengunjung_limath_lamaP)) {
                $jml_pengunjung_limath_lamaP = 0;
            }
            $jml_pengunjung_wus = $this->request->getVar('jml_pengunjung_wus');
            if (empty($jml_pengunjung_wus)) {
                $jml_pengunjung_wus = 0;
            }
            $jml_pengunjung_pus_ibu = $this->request->getVar('jml_pengunjung_pus_ibu');
            if (empty($jml_pengunjung_pus_ibu)) {
                $jml_pengunjung_pus_ibu = 0;
            }
            $jml_pengunjung_hamil_ibu = $this->request->getVar('jml_pengunjung_hamil_ibu');
            if (empty($jml_pengunjung_hamil_ibu)) {
                $jml_pengunjung_hamil_ibu = 0;
            }
            $jml_pengunjung_nyusu_ibu = $this->request->getVar('jml_pengunjung_nyusu_ibu');
            if (empty($jml_pengunjung_nyusu_ibu)) {
                $jml_pengunjung_nyusu_ibu = 0;
            }
            $jml_hadir_kader_l = $this->request->getVar('jml_hadir_kader_l');
            if (empty($jml_hadir_kader_l)) {
                $jml_hadir_kader_l = 0;
            }
            $jml_hadir_kader_p = $this->request->getVar('jml_hadir_kader_p');
            if (empty($jml_hadir_kader_p)) {
                $jml_hadir_kader_p = 0;
            }
            $jml_hadir_plkb_l = $this->request->getVar('jml_hadir_plkb_l');
            if (empty($jml_hadir_plkb_l)) {
                $jml_hadir_plkb_l = 0;
            }
            $jml_hadir_plkb_p = $this->request->getVar('jml_hadir_plkb_p');
            if (empty($jml_hadir_plkb_p)) {
                $jml_hadir_plkb_p = 0;
            }
            $jml_hadir_medis_l = $this->request->getVar('jml_hadir_medis_l');
            if (empty($jml_hadir_medis_l)) {
                $jml_hadir_medis_l = 0;
            }
            $jml_hadir_medis_p = $this->request->getVar('jml_hadir_medis_p');
            if (empty($jml_hadir_medis_p)) {
                $jml_hadir_medis_p = 0;
            }
            $jml_bayi_lahirL = $this->request->getVar('jml_bayi_lahirL');
            if (empty($jml_bayi_lahirL)) {
                $jml_bayi_lahirL = 0;
            }
            $jml_bayi_lahirP = $this->request->getVar('jml_bayi_lahirP');
            if (empty($jml_bayi_lahirP)) {
                $jml_bayi_lahirP = 0;
            }
            $jml_bayi_mnglL = $this->request->getVar('jml_bayi_mnglL');
            if (empty($jml_bayi_mnglL)) {
                $jml_bayi_mnglL = 0;
            }
            $jml_bayi_mnglP = $this->request->getVar('jml_bayi_mnglP');
            if (empty($jml_bayi_mnglP)) {
                $jml_bayi_mnglP = 0;
            }
            $data = [
                'kd_posyandu' => $kdposyandu,
                'tanggal' => $tanggal,
                'tahun' => $tahun,
                'bulan' => $bulan,
                'jml_pengunjung_sthun_baruL' => $jml_pengunjung_sthun_baruL,
                'jml_pengunjung_sthun_baruP' => $jml_pengunjung_sthun_baruP,
                'jml_pengunjung_sthun_lamaL' => $jml_pengunjung_sthun_lamaL,
                'jml_pengunjung_sthun_lamaP' => $jml_pengunjung_sthun_lamaP,
                'jml_pengunjung_limath_baruL' => $jml_pengunjung_limath_baruL,
                'jml_pengunjung_limath_baruP' => $jml_pengunjung_limath_baruP,
                'jml_pengunjung_limath_lamaL' => $jml_pengunjung_limath_lamaL,
                'jml_pengunjung_limath_lamaP' => $jml_pengunjung_limath_lamaP,
                'jml_pengunjung_wus' => $jml_pengunjung_wus,
                'jml_pengunjung_pus_ibu' => $jml_pengunjung_pus_ibu,
                'jml_pengunjung_hamil_ibu' => $jml_pengunjung_hamil_ibu,
                'jml_pengunjung_nyusu_ibu' => $jml_pengunjung_nyusu_ibu,
                'jml_hadir_kader_l' => $jml_hadir_kader_l,
                'jml_hadir_kader_p' => $jml_hadir_kader_p,
                'jml_hadir_plkb_l' => $jml_hadir_plkb_l,
                'jml_hadir_plkb_p' => $jml_hadir_plkb_p,
                'jml_hadir_medis_l' => $jml_hadir_medis_l,
                'jml_hadir_medis_p' => $jml_hadir_medis_p,
                'jml_bayi_lahirL' => $jml_bayi_lahirL,
                'jml_bayi_lahirP' => $jml_bayi_lahirP,
                'jml_bayi_mnglL' => $jml_bayi_mnglL,
                'jml_bayi_mnglP' => $jml_bayi_mnglP,
                'keterangan' => $this->request->getVar('keterangan')
            ];
            $this->datapengunjungModel->where('no', $num)->set($data)->update();
            session()->setFlashdata('pesan', "Data berhasil diubah pada tahun $tahun.");
            return redirect()->to("/DatapengunjungposyanduCon/detail/$kdposyandu/$tahun");
        } elseif ($btn == "batal") {
            return redirect()->to("/DatapengunjungposyanduCon/detail/$kdposyandu/$tahun");
        }
    }

    public function range($kdposyandu)
    {
        $posyandu = $this->posyanduModel->getData($kdposyandu);
        $namapos = $posyandu['nama_posyandu'];
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'kdposyandu' => $kdposyandu,
            'namapos' => $namapos,
            'datapengunjung' => $this->datapengunjungModel->getTanggal($kdposyandu),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/pengunjungposyandu/range', $data);
    }

    public function lihatRange($kdposyandu)
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $tahun1 = substr($awal, 0, 4);
        $tahun2 = substr($akhir, 0, 4);
        $btn = $this->request->getVar('aksi');
        if ($btn == "lihat") {
            $posyandu = $this->posyanduModel->getData($kdposyandu);
            $namapos = $posyandu['nama_posyandu'];
            $kdWilayah = $posyandu['kd_wilayah'];
            $wilayah = $this->posyanduModel->getWilayah($kdWilayah);;
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'PagesAdmin' => 'laporan',
                'awal' => $awal,
                'akhir' => $akhir,
                'kdposyandu' => $kdposyandu,
                'wilayah' => $wilayah,
                'namapos' => $namapos,
                'datapengunjung' => $this->datapengunjungModel->getRange($kdposyandu, $awal, $akhir),
                'total' => $this->datapengunjungModel->getTotalCetak($kdposyandu, $awal, $akhir),
                'tahun1' => $tahun1,
                'tahun2' => $tahun2
            ];
            return view('laporan/admin/pengunjungposyandu/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to("/posyandu/posyandulaporan/$kdposyandu");
        }
    }

    public function print($kdposyandu)
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $posyandu = $this->posyanduModel->getData($kdposyandu);
        $namapos = $posyandu['nama_posyandu'];
        $kdWilayah = $posyandu['kd_wilayah'];
        $wilayah = $this->posyanduModel->getWilayah($kdWilayah);
        $datapengunjung = $this->datapengunjungModel->getRange($kdposyandu, $awal, $akhir);
        $btn = $this->request->getVar('aksi');
        if ($btn == "print") {
            $data = [
                'datapengunjung' => $datapengunjung,
                'kdposyandu' => $kdposyandu,
                'wilayah' => $wilayah,
                'namapos' => $namapos,
                'tahun' => $awal,
                'total' => $this->datapengunjungModel->getTotal($kdposyandu, $awal)
            ];
            return view('laporan/admin/pengunjungposyandu/print', $data);
        } elseif ($btn == "batal") {
            return redirect()->to("/pengunjungposyandu/range/$kdposyandu");
        }
    }
}
