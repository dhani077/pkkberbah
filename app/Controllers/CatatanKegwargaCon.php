<?php

namespace App\Controllers;

use App\Models\CatatanKegwargaModel;

class CatatanKegwargaCon extends BaseController
{
    protected $catatanKegwargaModel;

    public function __construct()
    {
        $this->catatanKegwargaModel = new CatatanKegwargaModel();
    }

    public function index()
    {
        $wilayah = $this->catatanKegwargaModel->getWilayah();
        foreach ($wilayah as $w) {
            $kecamatan = $w['kecamatan'];
            $kabupaten = $w['kabupaten'];
            $provinsi = $w['provinsi'];
        }
        $data = [
            'tittle' => 'Catatan Data & Kegiatan Warga',
            'PagesAdmin' => 'pendataan',
            'catatankegwarga' => $this->catatanKegwargaModel->getTahun(),
            'kecamatan' => $kecamatan,
            'kabupaten' => $kabupaten,
            'provinsi' => $provinsi
        ];
        if ($data['catatankegwarga'] == null) {
            $th = "";
            $tot = ['total' => [
                'totaldusun' => '',
                'totalrw' => '',
                'totalrt' => '',
                'totaldasawisma' => '',
                'totalkrt' => '',
                'totalkk' => '',
                'totallaki' => '',
                'totalperempuan' => '',
                'totalbalitaL' => '',
                'totalbalitaP' => '',
                'totalpus' => '',
                'totalwus' => '',
                'totalibuhml' => '',
                'totalibunyusu' => '',
                'totallansia' => '',
                'totalbutaL' => '',
                'totalbutaP' => '',
                'totalrmhsehat' => '',
                'totalrmhkrgsehat' => '',
                'totalrmhsampah' => '',
                'totalrmhspal' => '',
                'totalrmhp4k' => '',
                'totalpdam' => '',
                'totalsumur' => '',
                'totalsungai' => '',
                'totallain' => '',
                'totaljamban' => '',
                'totalberas' => '',
                'totalnonberas' => '',
                'totalup2k' => '',
                'totaltanah' => '',
                'totalindustri' => '',
                'totalkeslingk' => ''
            ]];
            $total = $tot;
            $data = [
                'tittle' => 'Catatan Data & Kegiatan Warga',
                'PagesAdmin' => 'pendataan',
                'catatankegwarga' => $this->catatanKegwargaModel->getTahun($th),
                'tahun' => $th,
                'kecamatan' => $kecamatan,
                'kabupaten' => $kabupaten,
                'provinsi' => $provinsi,
                'total' => $total
            ];
            return view('laporan/admin/catatankegwarga/detail', $data);
        } elseif ($data['catatankegwarga'] != null) {
            return view('laporan/admin/catatankegwarga/index', $data);
        }
    }

    public function detail($tahun = false)
    {
        $wilayah = $this->catatanKegwargaModel->getWilayah();
        foreach ($wilayah as $w) {
            $kecamatan = $w['kecamatan'];
            $kabupaten = $w['kabupaten'];
            $provinsi = $w['provinsi'];
        }
        if ($tahun == false) {
            $tahun = $this->request->getVar('tahun');
        }
        $catatanKegwarga = $this->catatanKegwargaModel->getData($tahun);
        if ($catatanKegwarga != null) {
            $data = [
                'tittle' => 'Catatan Data & Kegiatan Warga',
                'PagesAdmin' => 'pendataan',
                'catatankegwarga' => $catatanKegwarga,
                'total' => $this->catatanKegwargaModel->getTotal($tahun),
                'tahun' => $tahun,
                'kecamatan' => $kecamatan,
                'kabupaten' => $kabupaten,
                'provinsi' => $provinsi
            ];
            return view('laporan/admin/catatankegwarga/detail', $data);
        } elseif ($catatanKegwarga == null) {
            return redirect()->to('/catatankegwarga/index');
        }
    }

    public function create()
    {
        session();
        $data = [
            'tittle' => 'Catatan Data & Kegiatan Warga',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'wilayah' => $this->catatanKegwargaModel->getWilayah()
        ];
        return view('laporan/admin/catatankegwarga/create', $data);
    }

    public function save()
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'nama_kelurahan' => [
                    'rules' => 'required[catatandatakegiatanwarga.nama_kelurahan]',
                    'errors' => [
                        'required' => 'Nama desa/kelurahan harus diisi'
                    ]
                ],
                'tanggal' => [
                    'rules' => 'required[catatandatakegiatanwarga.tanggal]',
                    'errors' => [
                        'required' => 'Tanggal harus diisi'
                    ]
                ],
                'jml_dusun' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_dusun]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_rw' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_rw]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_rt' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_rt]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_dasawisma' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_dasawisma]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_krt' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_krt]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_kk' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_kk]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_angt_keluarga_totL' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_angt_keluarga_totL]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_angt_keluarga_totP' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_angt_keluarga_totP]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_angt_keluarga_balitaL' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_angt_keluarga_balitaL]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_angt_keluarga_balitaP' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_angt_keluarga_balitaP]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_angt_keluarga_pus' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_angt_keluarga_pus]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_angt_keluarga_wus' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_angt_keluarga_wus]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_angt_keluarga_ibuhml' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_angt_keluarga_ibuhml]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_angt_keluarga_ibunyusu' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_angt_keluarga_ibunyusu]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_angt_keluarga_lansia' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_angt_keluarga_lansia]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_angt_keluarga_butaL' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_angt_keluarga_butaL]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_angt_keluarga_butaP' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_angt_keluarga_butaP]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_rmh_sehat' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_rmh_sehat]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_rmh_krgsehat' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_rmh_krgsehat]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_rmh_sampah' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_rmh_sampah]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_rmh_spal' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_rmh_spal]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_rmh_p4k' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_rmh_p4k]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_airkel_pdam' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_airkel_pdam]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_airkel_sumur' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_airkel_sumur]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_airkel_sungai' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_airkel_sungai]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_airkel_lain' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_airkel_lain]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_jamban_kel' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_jamban_kel]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_mknpokok_beras' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_mknpokok_beras]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_mknpokok_nonberas' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_mknpokok_nonberas]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_wrg_up2k' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_wrg_up2k]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_wrg_mnfaat_tanah' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_wrg_mnfaat_tanah]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_wrg_industrirt' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_wrg_industrirt]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_wrg_keslingk' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_wrg_keslingk]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to('/catatankegwarga/create')->withInput();
            }
            $tanggal = $this->request->getVar('tanggal');
            $tahun = substr($tanggal, 0, 4);
            $data = [
                'tahun' => $tahun,
                'tanggal' => $tanggal,
                'nama_kelurahan' => $this->request->getVar('nama_kelurahan'),
                'jml_dusun' => $this->request->getVar('jml_dusun'),
                'jml_rw' => $this->request->getVar('jml_rw'),
                'jml_rt' => $this->request->getVar('jml_rt'),
                'jml_dasawisma' => $this->request->getVar('jml_dasawisma'),
                'jml_krt' => $this->request->getVar('jml_krt'),
                'jml_kk' => $this->request->getVar('jml_kk'),
                'jml_angt_keluarga_totL' => $this->request->getVar('jml_angt_keluarga_totL'),
                'jml_angt_keluarga_totP' => $this->request->getVar('jml_angt_keluarga_totP'),
                'jml_angt_keluarga_balitaL' => $this->request->getVar('jml_angt_keluarga_balitaL'),
                'jml_angt_keluarga_balitaP' => $this->request->getVar('jml_angt_keluarga_balitaP'),
                'jml_angt_keluarga_pus' => $this->request->getVar('jml_angt_keluarga_pus'),
                'jml_angt_keluarga_wus' => $this->request->getVar('jml_angt_keluarga_wus'),
                'jml_angt_keluarga_ibuhml' => $this->request->getVar('jml_angt_keluarga_ibuhml'),
                'jml_angt_keluarga_ibunyusu' => $this->request->getVar('jml_angt_keluarga_ibunyusu'),
                'jml_angt_keluarga_lansia' => $this->request->getVar('jml_angt_keluarga_lansia'),
                'jml_angt_keluarga_butaL' => $this->request->getVar('jml_angt_keluarga_butaL'),
                'jml_angt_keluarga_butaP' => $this->request->getVar('jml_angt_keluarga_butaP'),
                'jml_rmh_sehat' => $this->request->getVar('jml_rmh_sehat'),
                'jml_rmh_krgsehat' => $this->request->getVar('jml_rmh_krgsehat'),
                'jml_rmh_sampah' => $this->request->getVar('jml_rmh_sampah'),
                'jml_rmh_spal' => $this->request->getVar('jml_rmh_spal'),
                'jml_rmh_p4k' => $this->request->getVar('jml_rmh_p4k'),
                'jml_airkel_pdam' => $this->request->getVar('jml_airkel_pdam'),
                'jml_airkel_sumur' => $this->request->getVar('jml_airkel_sumur'),
                'jml_airkel_sungai' => $this->request->getVar('jml_airkel_sungai'),
                'jml_airkel_lain' => $this->request->getVar('jml_airkel_lain'),
                'jml_jamban_kel' => $this->request->getVar('jml_jamban_kel'),
                'jml_mknpokok_beras' => $this->request->getVar('jml_mknpokok_beras'),
                'jml_mknpokok_nonberas' => $this->request->getVar('jml_mknpokok_nonberas'),
                'jml_wrg_up2k' => $this->request->getVar('jml_wrg_up2k'),
                'jml_wrg_mnfaat_tanah' => $this->request->getVar('jml_wrg_mnfaat_tanah'),
                'jml_wrg_industrirt' => $this->request->getVar('jml_wrg_industrirt'),
                'jml_wrg_keslingk' => $this->request->getVar('jml_wrg_keslingk'),
                'keterangan' => $this->request->getVar('keterangan')
            ];
            $this->catatanKegwargaModel->save($data);
            session()->setFlashdata('pesan', "Data berhasil ditambahkan pada tahun $tahun .");
            return redirect()->to("/catatankegwarga/index");
        } elseif ($btn == "batal") {
            return redirect()->to('/catatankegwarga/index');
        }
    }

    public function delete($num)
    {
        $tahun = $this->catatanKegwargaModel->getCatatanKegwarga($num);
        $th = $tahun['tahun'];
        $this->catatanKegwargaModel->where('no', $num)->delete();
        session()->setFlashdata('hapus', "Data berhasil dihapus pada tahun $th");
        return redirect()->to("/CatatanKegwargaCon/detail/$th");
    }

    public function edit($num)
    {
        $data = [
            'tittle' => 'Catatan Data & Kegiatan Warga',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'catatankegwarga' => $this->catatanKegwargaModel->getCatatanKegwarga($num),
            'wilayah' => $this->catatanKegwargaModel->getWilayah()
        ];
        return view('laporan/admin/catatankegwarga/edit', $data);
    }

    public function update($num)
    {
        $tahunLama = $this->request->getVar('tahunLama');
        $tanggal = $this->request->getVar('tanggal');
        $tahun = substr($tanggal, 0, 4);
        $btn = $this->request->getVar('aksi');
        if ($btn == "simpan") {
            if (!$this->validate([
                'nama_kelurahan' => [
                    'rules' => 'required[catatandatakegiatanwarga.nama_kelurahan]',
                    'errors' => [
                        'required' => 'Nama kelurahan harus diisi'
                    ]
                ],
                'tanggal' => [
                    'rules' => 'required[catatandatakegiatanwarga.tanggal]',
                    'errors' => [
                        'required' => 'Tanggal harus diisi'
                    ]
                ],
                'jml_dusun' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_dusun]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_rw' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_rw]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_rt' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_rt]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_dasawisma' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_dasawisma]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_krt' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_krt]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_kk' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_kk]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_angt_keluarga_totL' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_angt_keluarga_totL]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_angt_keluarga_totP' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_angt_keluarga_totP]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_angt_keluarga_balitaL' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_angt_keluarga_balitaL]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_angt_keluarga_balitaP' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_angt_keluarga_balitaP]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_angt_keluarga_pus' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_angt_keluarga_pus]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_angt_keluarga_wus' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_angt_keluarga_wus]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_angt_keluarga_ibuhml' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_angt_keluarga_ibuhml]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_angt_keluarga_ibunyusu' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_angt_keluarga_ibunyusu]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_angt_keluarga_lansia' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_angt_keluarga_lansia]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_angt_keluarga_butaL' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_angt_keluarga_butaL]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_angt_keluarga_butaP' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_angt_keluarga_butaP]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_rmh_sehat' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_rmh_sehat]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_rmh_krgsehat' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_rmh_krgsehat]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_rmh_sampah' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_rmh_sampah]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_rmh_spal' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_rmh_spal]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_rmh_p4k' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_rmh_p4k]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_airkel_pdam' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_airkel_pdam]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_airkel_sumur' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_airkel_sumur]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_airkel_sungai' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_airkel_sungai]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_airkel_lain' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_airkel_lain]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_jamban_kel' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_jamban_kel]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_mknpokok_beras' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_mknpokok_beras]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_mknpokok_nonberas' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_mknpokok_nonberas]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_wrg_up2k' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_wrg_up2k]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_wrg_mnfaat_tanah' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_wrg_mnfaat_tanah]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_wrg_industrirt' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_wrg_industrirt]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ],
                'jml_wrg_keslingk' => [
                    'rules' => 'required[catatandatakegiatanwarga.jml_wrg_keslingk]',
                    'errors' => [
                        'required' => 'harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to("/catatankegwarga/edit/$num")->withInput();
            }
            $data = [
                'tahun' => $tahun,
                'nama_kelurahan' => $this->request->getVar('nama_kelurahan'),
                'jml_dusun' => $this->request->getVar('jml_dusun'),
                'jml_rw' => $this->request->getVar('jml_rw'),
                'jml_rt' => $this->request->getVar('jml_rt'),
                'jml_dasawisma' => $this->request->getVar('jml_dasawisma'),
                'jml_krt' => $this->request->getVar('jml_krt'),
                'jml_kk' => $this->request->getVar('jml_kk'),
                'jml_angt_keluarga_totL' => $this->request->getVar('jml_angt_keluarga_totL'),
                'jml_angt_keluarga_totP' => $this->request->getVar('jml_angt_keluarga_totP'),
                'jml_angt_keluarga_balitaL' => $this->request->getVar('jml_angt_keluarga_balitaL'),
                'jml_angt_keluarga_balitaP' => $this->request->getVar('jml_angt_keluarga_balitaP'),
                'jml_angt_keluarga_pus' => $this->request->getVar('jml_angt_keluarga_pus'),
                'jml_angt_keluarga_wus' => $this->request->getVar('jml_angt_keluarga_wus'),
                'jml_angt_keluarga_ibuhml' => $this->request->getVar('jml_angt_keluarga_ibuhml'),
                'jml_angt_keluarga_ibunyusu' => $this->request->getVar('jml_angt_keluarga_ibunyusu'),
                'jml_angt_keluarga_lansia' => $this->request->getVar('jml_angt_keluarga_lansia'),
                'jml_angt_keluarga_butaL' => $this->request->getVar('jml_angt_keluarga_butaL'),
                'jml_angt_keluarga_butaP' => $this->request->getVar('jml_angt_keluarga_butaP'),
                'jml_rmh_sehat' => $this->request->getVar('jml_rmh_sehat'),
                'jml_rmh_krgsehat' => $this->request->getVar('jml_rmh_krgsehat'),
                'jml_rmh_sampah' => $this->request->getVar('jml_rmh_sampah'),
                'jml_rmh_spal' => $this->request->getVar('jml_rmh_spal'),
                'jml_rmh_p4k' => $this->request->getVar('jml_rmh_p4k'),
                'jml_airkel_pdam' => $this->request->getVar('jml_airkel_pdam'),
                'jml_airkel_sumur' => $this->request->getVar('jml_airkel_sumur'),
                'jml_airkel_sungai' => $this->request->getVar('jml_airkel_sungai'),
                'jml_airkel_lain' => $this->request->getVar('jml_airkel_lain'),
                'jml_jamban_kel' => $this->request->getVar('jml_jamban_kel'),
                'jml_mknpokok_beras' => $this->request->getVar('jml_mknpokok_beras'),
                'jml_mknpokok_nonberas' => $this->request->getVar('jml_mknpokok_nonberas'),
                'jml_wrg_up2k' => $this->request->getVar('jml_wrg_up2k'),
                'jml_wrg_mnfaat_tanah' => $this->request->getVar('jml_wrg_mnfaat_tanah'),
                'jml_wrg_industrirt' => $this->request->getVar('jml_wrg_industrirt'),
                'jml_wrg_keslingk' => $this->request->getVar('jml_wrg_keslingk'),
                'keterangan' => $this->request->getVar('keterangan')
            ];
            $this->catatanKegwargaModel->where('no', $num)->set($data)->update();
            session()->setFlashdata('pesan', "Data berhasil diubah pada tahun $tahun.");
            return redirect()->to("/CatatanKegwargaCon/detail/$tahun");
        } elseif ($btn == "batal") {
            return redirect()->to("/CatatanKegwargaCon/detail/$tahun");
        }
    }

    public function range()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'catatankegwarga' => $this->catatanKegwargaModel->getTanggal(),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/catatankegwarga/range', $data);
    }

    public function lihatRange()
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $tahun1 = substr($awal, 0, 4);
        $tahun2 = substr($akhir, 0, 4);
        $wilayah = $this->catatanKegwargaModel->getWilayah();
        foreach ($wilayah as $w) {
            $kecamatan = $w['kecamatan'];
            $kabupaten = $w['kabupaten'];
            $provinsi = $w['provinsi'];
        }
        $btn = $this->request->getVar('aksi');
        if ($btn == "lihat") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'PagesAdmin' => 'laporan',
                'awal' => $awal,
                'akhir' => $akhir,
                'catatankegwarga' => $this->catatanKegwargaModel->getRange($awal, $akhir),
                'total' => $this->catatanKegwargaModel->getTotalCetak($awal, $akhir),
                'tahun1' => $tahun1,
                'tahun2' => $tahun2,
                'kecamatan' => $kecamatan,
                'kabupaten' => $kabupaten,
                'provinsi' => $provinsi
            ];
            return view('laporan/admin/catatankegwarga/lihatrange', $data);
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
        $wilayah = $this->catatanKegwargaModel->getWilayah();
        foreach ($wilayah as $w) {
            $kecamatan = $w['kecamatan'];
            $kabupaten = $w['kabupaten'];
            $provinsi = $w['provinsi'];
        }
        if ($btn == "print") {
            $data = [
                'awal' => $awal,
                'akhir' => $akhir,
                'catatankegwarga' => $this->catatanKegwargaModel->getRange($awal, $akhir),
                'total' => $this->catatanKegwargaModel->getTotalCetak($awal, $akhir),
                'tahun1' => $tahun1,
                'tahun2' => $tahun2,
                'kecamatan' => $kecamatan,
                'kabupaten' => $kabupaten,
                'provinsi' => $provinsi
            ];
            return view('laporan/admin/catatankegwarga/print', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/catatankegwarga/range');
        }
    }
}
