<?php

namespace App\Controllers;

use App\Models\KegiatanposyanduAModel;
use App\Models\KegiatanposyanduBModel;
use App\Models\PosyanduModel;

class KegiatanposyanduCon extends BaseController
{
    protected $kegiatanAModel;
    protected $kegiatanBModel;
    protected $posyanduModel;

    public function __construct()
    {
        $this->kegiatanAModel = new KegiatanposyanduAModel();
        $this->kegiatanBModel = new KegiatanposyanduBModel();
        $this->posyanduModel = new PosyanduModel();
    }

    public function detail($kdPosyandu, $th = false)
    {
        if ($th == false) {
            $th = $this->request->getVar('tahun');
        }
        $no_keg = $this->kegiatanAModel->getA($kdPosyandu);
        foreach ($no_keg as $n) :
            if ($n != null) {
                $no = $n['no'];
            } elseif ($n == null) {
                $no = "";
            }
        endforeach;
        $count = $this->kegiatanAModel->hitung($kdPosyandu, $th);
        foreach ($count as $c) :
            $tahun = $c['jumlah'];
        endforeach;
        $posyandu = $this->posyanduModel->getData($kdPosyandu);
        $kdwil = $posyandu['kd_wilayah'];
        $wilayah = $this->posyanduModel->getWilayah($kdwil);
        $date = $this->kegiatanAModel->getWhereA($kdPosyandu, $th);
        $year = "";
        foreach ($date as $t) :
            $year = $t['tahun'];
        endforeach;

        if ($no_keg == null && $year == null) {
            return redirect()->to("/KegiatanposyanduCon/tahun/$kdPosyandu");
        } else {
            $data = [
                'tittle' => 'Kegiatan Posyandu',
                'PagesAdmin' => 'pendataan',
                'kegiatanA' => $this->kegiatanAModel->getWhereA($kdPosyandu, $th),
                'kegiatanB' => $this->kegiatanBModel->getWhereB($kdPosyandu, $th),
                'no' => $no,
                'kdPosyandu' => $kdPosyandu,
                'hitung' => $tahun,
                'wilayah' => $wilayah,
                'posyandu' => $posyandu,
                'tahun' => $year,
                'totalA' => $this->kegiatanAModel->getTotalA($kdPosyandu, $th),
                'totalB' => $this->kegiatanBModel->getTotalB($kdPosyandu, $th)
            ];

            return view('laporan/admin/kegiatanposyandu/detail', $data);
        }
    }
    public function tahun($kdposyandu)
    {
        $posyandu = $this->posyanduModel->getData($kdposyandu);
        $data = [
            'tittle' => 'Kegiatan Posyandu',
            'PagesAdmin' => 'pendataan',
            'kegiatanA' => $this->kegiatanAModel->getTahun($kdposyandu),
            'posyandu' => $posyandu,
            'kdposyandu' => $kdposyandu
        ];

        if ($data['kegiatanA'] == null) {
            $th = '';
            $kdwilayah = $posyandu['kd_wilayah'];
            $wilayah = $this->posyanduModel->getWilayah($kdwilayah);
            $totalA = ['totalA' => [
                'totalibuhamil' => '', 'totaldpriksa' => '', 'totalfetab' => '',
                'totalibunyusu' => '', 'totalkondom' => '', 'totalpi' => '',
                'totalimplant' => '', 'totalmop' => '', 'totalmow' => '',
                'totaliud' => '', 'totalsuntik' => '', 'totallain' => '',
                'totalbltsL' => '', 'totalbltsP' => '', 'totalbltkmsL' => '',
                'totalbltkmsP' => '', 'totalbltdL' => '', 'totalbltdP' => '',
                'totalbltNaikL' => '', 'totalbltNaikP' => '', 'totalbltvitaL' => '',
                'totalbltvitaP' => '', 'totalbltpmtL' => '', 'totalbltpmtP' => '',
                'totalibuI' => '', 'totalibuII' => ''
            ]];

            $totalB = ['totalB' => [
                'totalbcgL' => '', 'totalbcgP' => '', 'totaldptIL' => '',
                'totaldptIP' => '', 'totaldptIIL' => '', 'totaldptIIP' => '',
                'totaldptIIIL' => '', 'totaldptIIIP' => '', 'totalpolioIL' => '',
                'totalpolioIP' => '', 'totalpolioIIL' => '', 'totalpolioIIP' => '',
                'totalpolioIIIL' => '', 'totalpolioIIIP' => '', 'totalpolioIVL' => '',
                'totalpolioIVP' => '', 'totalcampakL' => '', 'totalcampakP' => '',
                'totalhepatIL' => '', 'totalhepatIP' => '', 'totalhepatIIL' => '',
                'totalhepatIIP' => '', 'totalhepatIIIL' => '', 'totalhepatIIIP' => '',
                'totaldiareL' => '', 'totaldiareP' => '', 'totaloralitL' => '',
                'totaloralitP' => ''
            ]];

            $data = [
                'tittle' => 'Kegiatan Posyandu',
                'PagesAdmin' => 'pendataan',
                'kegiatanA' => $this->kegiatanAModel->getKegiatanA($kdposyandu),
                'kegiatanB' => $this->kegiatanBModel->getKegiatanB(null),
                'no' => '',
                'kdPosyandu' => $kdposyandu,
                'hitung' => '',
                'wilayah' => $wilayah,
                'posyandu' => $posyandu,
                'tahun' => '',
                'totalA' => $totalA,
                'totalB' => $totalB
            ];
            return view('laporan/admin/kegiatanposyandu/detail', $data);
        } elseif ($data['kegiatanA'] != null) {
            return view('laporan/admin/kegiatanposyandu/tahun', $data);
        }
    }

    public function create($kdPos)
    {
        session();
        $data = [
            'tittle' => 'Kegiatan Posyandu',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'kdPosyandu' => $kdPos
        ];
        return view('laporan/admin/kegiatanposyandu/create', $data);
    }

    public function save($kdPosyandu)
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'tanggal' => [
                    'rules' => 'required[kegiatanposyandu.tanggal]',
                    'errors' => [
                        'required' => 'Tanggal harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to("/kegiatanposyandu/create/$kdPosyandu")->withInput();
            }
            $tanggal = $this->request->getVar('tanggal');
            $tahun = substr($tanggal, 0, 4);
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
            $dataA = [
                'kd_posyandu' => $this->request->getVar('kd_posyandu'),
                'tanggal' => $tanggal,
                'tahun' => $tahun,
                'bulan' => $bulan,
                'jml_ibu_hamil' => $this->request->getVar('jml_ibu_hamil'),
                'jml_diperiksa' => $this->request->getVar('jml_diperiksa'),
                'jml_fe_tab' => $this->request->getVar('jml_fe_tab'),
                'jml_ibu_nyusu' => $this->request->getVar('jml_ibu_nyusu'),
                'jml_aseptor_kondom' => $this->request->getVar('jml_aseptor_kondom'),
                'jml_aseptor_pi' => $this->request->getVar('jml_aseptor_pi'),
                'jml_aseptor_implant' => $this->request->getVar('jml_aseptor_implant'),
                'jml_aseptor_mop' => $this->request->getVar('jml_aseptor_mop'),
                'jml_aseptor_mow' => $this->request->getVar('jml_aseptor_mow'),
                'jml_aseptor_iud' => $this->request->getVar('jml_aseptor_iud'),
                'jml_aseptor_suntik' => $this->request->getVar('jml_aseptor_suntik'),
                'jml_aseptor_lain' => $this->request->getVar('jml_aseptor_lain'),
                'jml_balita_s_timbangL' => $this->request->getVar('jml_balita_s_timbangL'),
                'jml_balita_s_timbangP' => $this->request->getVar('jml_balita_s_timbangP'),
                'jml_balita_kms_timbangL' => $this->request->getVar('jml_balita_kms_timbangL'),
                'jml_balita_kms_timbangP' => $this->request->getVar('jml_balita_kms_timbangP'),
                'jml_balita_d_timbangL' => $this->request->getVar('jml_balita_d_timbangL'),
                'jml_balita_d_timbangP' => $this->request->getVar('jml_balita_d_timbangP'),
                'jml_balita_naik_timbangL' => $this->request->getVar('jml_balita_naik_timbangL'),
                'jml_balita_naik_timbangP' => $this->request->getVar('jml_balita_naik_timbangP'),
                'jml_balita_vita_timbangL' => $this->request->getVar('jml_balita_vita_timbangL'),
                'jml_balita_vita_timbangP' => $this->request->getVar('jml_balita_vita_timbangP'),
                'jml_balita_pmt_timbangL' => $this->request->getVar('jml_balita_pmt_timbangL'),
                'jml_balita_pmt_timbangP' => $this->request->getVar('jml_balita_pmt_timbangP'),
                'jml_imunisasi_ibu_I' => $this->request->getVar('jml_imunisasi_ibu_I'),
                'jml_imunisasi_ibu_II' => $this->request->getVar('jml_imunisasi_ibu_II')
            ];
            $this->kegiatanAModel->save($dataA);
            $no = $this->kegiatanAModel->getTerbaru();
            foreach ($no as $n) :
                $num = $n['no'];
            endforeach;
            $dataB = [
                'no' => $num,
                'kd_posyandu' => $kdPosyandu,
                'tanggal' => $tanggal,
                'tahun' => $tahun,
                'jml_imunbayi_bcgl' => $this->request->getVar('jml_imunbayi_bcgl'),
                'jml_imunbayi_bcgp' => $this->request->getVar('jml_imunbayi_bcgp'),
                'jml_imunbayi_dpt_IL' => $this->request->getVar('jml_imunbayi_dpt_IL'),
                'jml_imunbayi_dpt_IP' => $this->request->getVar('jml_imunbayi_dpt_IP'),
                'jml_imunbayi_dpt_IIL' => $this->request->getVar('jml_imunbayi_dpt_IIL'),
                'jml_imunbayi_dpt_IIP' => $this->request->getVar('jml_imunbayi_dpt_IIP'),
                'jml_imunbayi_dpt_IIIL' => $this->request->getVar('jml_imunbayi_dpt_IIIL'),
                'jml_imunbayi_dpt_IIIP' => $this->request->getVar('jml_imunbayi_dpt_IIIP'),
                'jml_imunbayi_polio_IL' => $this->request->getVar('jml_imunbayi_polio_IL'),
                'jml_imunbayi_polio_IP' => $this->request->getVar('jml_imunbayi_polio_IP'),
                'jml_imunbayi_polio_IIL' => $this->request->getVar('jml_imunbayi_polio_IIL'),
                'jml_imunbayi_polio_IIP' => $this->request->getVar('jml_imunbayi_polio_IIP'),
                'jml_imunbayi_polio_IIIL' => $this->request->getVar('jml_imunbayi_polio_IIIL'),
                'jml_imunbayi_polio_IIIP' => $this->request->getVar('jml_imunbayi_polio_IIIP'),
                'jml_imunbayi_polio_IVL' => $this->request->getVar('jml_imunbayi_polio_IVL'),
                'jml_imunbayi_polio_IVP' => $this->request->getVar('jml_imunbayi_polio_IVP'),
                'jml_imunbayi_campakL' => $this->request->getVar('jml_imunbayi_campakL'),
                'jml_imunbayi_campakP' => $this->request->getVar('jml_imunbayi_campakP'),
                'jml_imunbayi_hepat_IL' => $this->request->getVar('jml_imunbayi_hepat_IL'),
                'jml_imunbayi_hepat_IP' => $this->request->getVar('jml_imunbayi_hepat_IP'),
                'jml_imunbayi_hepat_IIL' => $this->request->getVar('jml_imunbayi_hepat_IIL'),
                'jml_imunbayi_hepat_IIP' => $this->request->getVar('jml_imunbayi_hepat_IIP'),
                'jml_imunbayi_hepat_IIIL' => $this->request->getVar('jml_imunbayi_hepat_IIIL'),
                'jml_imunbayi_hepat_IIIP' => $this->request->getVar('jml_imunbayi_hepat_IIIP'),
                'jml_bltdiare_jmL' => $this->request->getVar('jml_bltdiare_jmL'),
                'jml_bltdiare_jmP' => $this->request->getVar('jml_bltdiare_jmP'),
                'jml_bltdiare_oralitL' => $this->request->getVar('jml_bltdiare_oralitL'),
                'jml_bltdiare_oralitP' => $this->request->getVar('jml_bltdiare_oralitP'),
                'Keterangan' => $this->request->getVar('Keterangan')
            ];
            $this->kegiatanBModel->save($dataB);
            session()->setFlashdata('pesan', "Data berhasil ditambahkan pada tahun $tahun.");
            return redirect()->to("/kegiatanposyandu/tahun/$kdPosyandu");
        } elseif ($btn == "batal") {
            return redirect()->to("/kegiatanposyandu/tahun/$kdPosyandu");
        }
    }

    public function delete($no)
    {
        $kegiatan = $this->kegiatanAModel->getEditA($no);
        $kdposyandu = $kegiatan['kd_posyandu'];
        $th = $kegiatan['tahun'];
        $kegiatanA = $this->kegiatanAModel->getWhereA($kdposyandu, $th);
        $this->kegiatanBModel->where('no_keg', $no)->delete();
        $this->kegiatanAModel->where('no', $no)->delete();
        session()->setFlashdata('hapus', "Data berhasil dihapus pada tahun $th.");
        return redirect()->to("/kegiatanposyandu/tahun/$kdposyandu");
    }

    public function edit($num)
    {
        $no_keg = $this->kegiatanAModel->getEditA($num);
        if ($no_keg != null) {
            $no = $no_keg['no'];
        } else {
            $no = "";
        }
        $data = [
            'tittle' => 'Kegiatan Posyandu',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'kegiatanA' => $this->kegiatanAModel->getEditA($num),
            'kegiatanB' => $this->kegiatanBModel->getEditB($no)
        ];
        return view('laporan/admin/kegiatanposyandu/edit', $data);
    }

    public function update($no)
    {
        $tanggal = $this->request->getVar('tanggal');
        $tahun = substr($tanggal, 0, 4);
        $kegiatan = $this->kegiatanAModel->getEditA($no);
        $kdPosyandu = $kegiatan['kd_posyandu'];
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            if (!$this->validate([
                'tanggal' => [
                    'rules' => 'required[kegiatanposyandu.tanggal]',
                    'errors' => [
                        'required' => 'Tanggal harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to("/kegiatanposyandu/edit/$no")->withInput();
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
            $dataA = [
                'kd_posyandu' => $kdPosyandu,
                'tanggal' => $tanggal,
                'tahun' => $tahun,
                'bulan' => $bulan,
                'jml_ibu_hamil' => $this->request->getVar('jml_ibu_hamil'),
                'jml_diperiksa' => $this->request->getVar('jml_diperiksa'),
                'jml_fe_tab' => $this->request->getVar('jml_fe_tab'),
                'jml_ibu_nyusu' => $this->request->getVar('jml_ibu_nyusu'),
                'jml_aseptor_kondom' => $this->request->getVar('jml_aseptor_kondom'),
                'jml_aseptor_pi' => $this->request->getVar('jml_aseptor_pi'),
                'jml_aseptor_implant' => $this->request->getVar('jml_aseptor_implant'),
                'jml_aseptor_mop' => $this->request->getVar('jml_aseptor_mop'),
                'jml_aseptor_mow' => $this->request->getVar('jml_aseptor_mow'),
                'jml_aseptor_iud' => $this->request->getVar('jml_aseptor_iud'),
                'jml_aseptor_suntik' => $this->request->getVar('jml_aseptor_suntik'),
                'jml_aseptor_lain' => $this->request->getVar('jml_aseptor_lain'),
                'jml_balita_s_timbangL' => $this->request->getVar('jml_balita_s_timbangL'),
                'jml_balita_s_timbangP' => $this->request->getVar('jml_balita_s_timbangP'),
                'jml_balita_kms_timbangL' => $this->request->getVar('jml_balita_kms_timbangL'),
                'jml_balita_kms_timbangP' => $this->request->getVar('jml_balita_kms_timbangP'),
                'jml_balita_d_timbangL' => $this->request->getVar('jml_balita_d_timbangL'),
                'jml_balita_d_timbangP' => $this->request->getVar('jml_balita_d_timbangP'),
                'jml_balita_naik_timbangL' => $this->request->getVar('jml_balita_naik_timbangL'),
                'jml_balita_naik_timbangP' => $this->request->getVar('jml_balita_naik_timbangP'),
                'jml_balita_vita_timbangL' => $this->request->getVar('jml_balita_vita_timbangL'),
                'jml_balita_vita_timbangP' => $this->request->getVar('jml_balita_vita_timbangP'),
                'jml_balita_pmt_timbangL' => $this->request->getVar('jml_balita_pmt_timbangL'),
                'jml_balita_pmt_timbangP' => $this->request->getVar('jml_balita_pmt_timbangP'),
                'jml_imunisasi_ibu_I' => $this->request->getVar('jml_imunisasi_ibu_I'),
                'jml_imunisasi_ibu_II' => $this->request->getVar('jml_imunisasi_ibu_II')
            ];
            $dataB = [
                'no' => $this->request->getVar('no'),
                'kd_posyandu' => $kdPosyandu,
                'tanggal' => $tanggal,
                'tahun' => $tahun,
                'jml_imunbayi_bcgl' => $this->request->getVar('jml_imunbayi_bcgl'),
                'jml_imunbayi_bcgp' => $this->request->getVar('jml_imunbayi_bcgp'),
                'jml_imunbayi_dpt_IL' => $this->request->getVar('jml_imunbayi_dpt_IL'),
                'jml_imunbayi_dpt_IP' => $this->request->getVar('jml_imunbayi_dpt_IP'),
                'jml_imunbayi_dpt_IIL' => $this->request->getVar('jml_imunbayi_dpt_IIL'),
                'jml_imunbayi_dpt_IIP' => $this->request->getVar('jml_imunbayi_dpt_IIP'),
                'jml_imunbayi_dpt_IIIL' => $this->request->getVar('jml_imunbayi_dpt_IIIL'),
                'jml_imunbayi_dpt_IIIP' => $this->request->getVar('jml_imunbayi_dpt_IIIP'),
                'jml_imunbayi_polio_IL' => $this->request->getVar('jml_imunbayi_polio_IL'),
                'jml_imunbayi_polio_IP' => $this->request->getVar('jml_imunbayi_polio_IP'),
                'jml_imunbayi_polio_IIL' => $this->request->getVar('jml_imunbayi_polio_IIL'),
                'jml_imunbayi_polio_IIP' => $this->request->getVar('jml_imunbayi_polio_IIP'),
                'jml_imunbayi_polio_IIIL' => $this->request->getVar('jml_imunbayi_polio_IIIL'),
                'jml_imunbayi_polio_IIIP' => $this->request->getVar('jml_imunbayi_polio_IIIP'),
                'jml_imunbayi_polio_IVL' => $this->request->getVar('jml_imunbayi_polio_IVL'),
                'jml_imunbayi_polio_IVP' => $this->request->getVar('jml_imunbayi_polio_IVP'),
                'jml_imunbayi_campakL' => $this->request->getVar('jml_imunbayi_campakL'),
                'jml_imunbayi_campakP' => $this->request->getVar('jml_imunbayi_campakP'),
                'jml_imunbayi_hepat_IL' => $this->request->getVar('jml_imunbayi_hepat_IL'),
                'jml_imunbayi_hepat_IP' => $this->request->getVar('jml_imunbayi_hepat_IP'),
                'jml_imunbayi_hepat_IIL' => $this->request->getVar('jml_imunbayi_hepat_IIL'),
                'jml_imunbayi_hepat_IIP' => $this->request->getVar('jml_imunbayi_hepat_IIP'),
                'jml_imunbayi_hepat_IIIL' => $this->request->getVar('jml_imunbayi_hepat_IIIL'),
                'jml_imunbayi_hepat_IIIP' => $this->request->getVar('jml_imunbayi_hepat_IIIP'),
                'jml_bltdiare_jmL' => $this->request->getVar('jml_bltdiare_jmL'),
                'jml_bltdiare_jmP' => $this->request->getVar('jml_bltdiare_jmP'),
                'jml_bltdiare_oralitL' => $this->request->getVar('jml_bltdiare_oralitL'),
                'jml_bltdiare_oralitP' => $this->request->getVar('jml_bltdiare_oralitP'),
                'Keterangan' => $this->request->getVar('Keterangan')
            ];
            $this->kegiatanAModel->where('no', $no)->set($dataA)->update();
            $this->kegiatanBModel->where('no_keg', $no)->set($dataB)->update();
            session()->setFlashdata('pesan', "Data berhasil diubah pada tahun $tahun.");
            return redirect()->to("/kegiatanposyandu/tahun/$kdPosyandu");
        } elseif ($btn == "batal") {
            return redirect()->to("/KegiatanposyanduCon/detail/$kdPosyandu/$tahun");
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
            'kegiatanA' => $this->kegiatanAModel->getTanggal($kdposyandu),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/kegiatanposyandu/range', $data);
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
            $kdwilayah = $posyandu['kd_wilayah'];
            $wilayah = $this->posyanduModel->getWilayah($kdwilayah);
            $count = $this->kegiatanAModel->hitungLaporan($kdposyandu, $awal, $akhir);
            foreach ($count as $c) :
                $tahun = $c['jumlah'];
            endforeach;
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'PagesAdmin' => 'laporan',
                'namapos' => $namapos,
                'kdposyandu' => $kdposyandu,
                'wilayah' => $wilayah,
                'tahun1' => $tahun1,
                'tahun2' => $tahun2,
                'kdposyandu' => $kdposyandu,
                'hitung' => $tahun,
                'posyandu' => $posyandu,
                'awal' => $awal,
                'akhir' => $akhir,
                'kegiatanA' => $this->kegiatanAModel->getRange($kdposyandu, $awal, $akhir),
                'kegiatanB' => $this->kegiatanBModel->getRange($kdposyandu, $awal, $akhir),
                'totalA' => $this->kegiatanAModel->getTotalCetakA($kdposyandu, $awal, $akhir),
                'totalB' => $this->kegiatanBModel->getTotalCetakB($kdposyandu, $awal, $akhir)
            ];
            return view('laporan/admin/kegiatanposyandu/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to("/posyandu/posyandulaporan/$kdposyandu");
        }
    }

    public function print($kdposyandu)
    {
        $btn = $this->request->getVar('aksi');
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        if ($btn == "print") {
            $posyandu = $this->posyanduModel->getData($kdposyandu);
            $namapos = $posyandu['nama_posyandu'];
            $kdwilayah = $posyandu['kd_wilayah'];
            $wilayah = $this->posyanduModel->getWilayah($kdwilayah);
            $count = $this->kegiatanAModel->hitungLaporan($kdposyandu, $awal, $akhir);
            foreach ($count as $c) :
                $tahun = $c['jumlah'];
            endforeach;
            $data = [
                'namapos' => $namapos,
                'kdposyandu' => $kdposyandu,
                'wilayah' => $wilayah,
                'kdposyandu' => $kdposyandu,
                'hitung' => $tahun,
                'posyandu' => $posyandu,
                'awal' => $awal,
                'akhir' => $akhir,
                'kegiatanA' => $this->kegiatanAModel->getRange($kdposyandu, $awal, $akhir),
                'kegiatanB' => $this->kegiatanBModel->getRange($kdposyandu, $awal, $akhir),
                'totalA' => $this->kegiatanAModel->getTotalCetakA($kdposyandu, $awal, $akhir),
                'totalB' => $this->kegiatanBModel->getTotalCetakB($kdposyandu, $awal, $akhir)
            ];
            return view('laporan/admin/kegiatanposyandu/print', $data);
        } elseif ($btn == "batal") {
            return redirect()->to("/kegiatanposyandu/range/$kdposyandu");
        }
    }
}
