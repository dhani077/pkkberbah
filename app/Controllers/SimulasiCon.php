<?php

namespace App\Controllers;

use App\Models\SimulasiModel;

class SimulasiCon extends BaseController
{
    protected $simulasiModel;

    public function __construct()
    {
        $this->simulasiModel = new SimulasiModel();
    }

    public function index()
    {
        $data = [
            'tittle' => 'Simulasi Dan Penyuluhan',
            'PagesAdmin' => 'pendataan',
            'simulasi' => $this->simulasiModel->getWilayah()
        ];
        return view('laporan/admin/simulasi/index', $data);
    }

    public function detail($kdwilayah)
    {
        $wilayah = $this->simulasiModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Simulasi Dan Penyuluhan',
            'PagesAdmin' => 'pendataan',
            'kelurahan' => $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi'],
            'simulasi' => $this->simulasiModel->getSimulasi($kdwilayah),
            'kdwilayah' => $kdwilayah
        ];
        return view('laporan/admin/simulasi/detail', $data);
    }

    public function create($kdwilayah)
    {
        $wilayah = $this->simulasiModel->getWilayah($kdwilayah);
        $kelurahan = $wilayah['kelurahan'];
        session();
        $data = [
            'tittle' => 'Simulasi Dan Penyuluhan',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'kdwilayah' => $kdwilayah,
            'kelurahan' => $kelurahan
        ];
        return view('laporan/admin/simulasi/create', $data);
    }

    public function save()
    {
        $kd = $this->request->getVar('kd_wilayah');
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'nama_kegiatan' => [
                    'rules' => 'required[simulasipenyuluhan.nama_kegiatan]',
                    'errors' => [
                        'required' => 'Nama kegiatan harus diisi'
                    ]
                ],
                'jns_simulasi' => [
                    'rules' => 'required[simulasipenyuluhan.jns_simulasi]',
                    'errors' => [
                        'required' => 'Jenis simulasi/penyuluhan harus diisi'
                    ]
                ],
                'tanggal' => [
                    'rules' => 'required[simulasipenyuluhan.tanggal]',
                    'errors' => [
                        'required' => 'Tanggal harus diisi'
                    ]
                ],
                'jml_klp' => [
                    'rules' => 'required[simulasipenyuluhan.jml_klp]',
                    'errors' => [
                        'required' => 'harus diisi!'
                    ]
                ],
                'jml_sosialisasi' => [
                    'rules' => 'required[simulasipenyuluhan.jml_sosialisasi]',
                    'errors' => [
                        'required' => 'harus diisi!'
                    ]
                ],
                'jml_kader_L' => [
                    'rules' => 'required[simulasipenyuluhan.jml_kader_L]',
                    'errors' => [
                        'required' => 'harus diisi!'
                    ]
                ],
                'jml_kader_P' => [
                    'rules' => 'required[simulasipenyuluhan.jml_kader_P]',
                    'errors' => [
                        'required' => 'harus diisi!'
                    ]
                ]
            ])) {
                return redirect()->to("/simulasi/create/$kd")->withInput();
            }
            $data = [
                'kd_wilayah' => $kd,
                'nama_kegiatan' => $this->request->getVar('nama_kegiatan'),
                'jns_simulasi' => $this->request->getVar('jns_simulasi'),
                'tanggal' => $this->request->getVar('tanggal'),
                'jml_klp' => $this->request->getVar('jml_klp'),
                'jml_sosialisasi' => $this->request->getVar('jml_sosialisasi'),
                'jml_kader_L' => $this->request->getVar('jml_kader_L'),
                'jml_kader_P' => $this->request->getVar('jml_kader_P')
            ];
            $this->simulasiModel->save($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
            return redirect()->to("/simulasi/detail/$kd");
        } elseif ($btn == "batal") {
            return redirect()->to("/simulasi/detail/$kd");
        }
    }

    public function delete($no)
    {
        $simulasi = $this->simulasiModel->getData($no);
        $kdwilayah = $simulasi['kd_wilayah'];
        $this->simulasiModel->where('no', $no)->delete();
        session()->setFlashdata('hapus', 'Data berhasil dihapus.');
        return redirect()->to("/simulasi/detail/$kdwilayah");
    }

    public function edit($no)
    {
        $simulasi = $this->simulasiModel->getData($no);
        $kdwilayah = $simulasi['kd_wilayah'];
        $wilayah = $this->simulasiModel->getWilayah($kdwilayah);
        $kelurahan = $wilayah['kelurahan'];
        $data = [
            'tittle' => 'Simulasi Dan Penyuluhan',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'simulasi' => $simulasi,
            'kelurahan' => $kelurahan
        ];
        return view('laporan/admin/simulasi/edit', $data);
    }

    public function update($no)
    {
        $kdwilayah = $this->request->getVar('kd_wilayah');
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            if (!$this->validate([
                'nama_kegiatan' => [
                    'rules' => 'required[simulasipenyuluhan.nama_kegiatan]',
                    'errors' => [
                        'required' => 'Nama kegiatan harus diisi'
                    ]
                ],
                'jns_simulasi' => [
                    'rules' => 'required[simulasipenyuluhan.jns_simulasi]',
                    'errors' => [
                        'required' => 'Jenis simulasi/penyuluhan harus diisi'
                    ]
                ],
                'tanggal' => [
                    'rules' => 'required[simulasipenyuluhan.tanggal]',
                    'errors' => [
                        'required' => 'Tanggal harus diisi'
                    ]
                ],
                'jml_klp' => [
                    'rules' => 'required[simulasipenyuluhan.jml_klp]',
                    'errors' => [
                        'required' => 'harus diisi!'
                    ]
                ],
                'jml_sosialisasi' => [
                    'rules' => 'required[simulasipenyuluhan.jml_sosialisasi]',
                    'errors' => [
                        'required' => 'harus diisi!'
                    ]
                ],
                'jml_kader_L' => [
                    'rules' => 'required[simulasipenyuluhan.jml_kader_L]',
                    'errors' => [
                        'required' => 'harus diisi!'
                    ]
                ],
                'jml_kader_P' => [
                    'rules' => 'required[simulasipenyuluhan.jml_kader_P]',
                    'errors' => [
                        'required' => 'harus diisi!'
                    ]
                ]
            ])) {
                return redirect()->to("/simulasi/edit/$no")->withInput();
            }
            $data = [
                'kd_wilayah' => $kdwilayah,
                'nama_kegiatan' => $this->request->getVar('nama_kegiatan'),
                'jns_simulasi' => $this->request->getVar('jns_simulasi'),
                'tanggal' => $this->request->getVar('tanggal'),
                'jml_klp' => $this->request->getVar('jml_klp'),
                'jml_sosialisasi' => $this->request->getVar('jml_sosialisasi'),
                'jml_kader_L' => $this->request->getVar('jml_kader_L'),
                'jml_kader_P' => $this->request->getVar('jml_kader_P')
            ];
            $this->simulasiModel->where('no', $no)->set($data)->update();
            session()->setFlashdata('pesan', 'Data berhasil diubah.');
            return redirect()->to("/simulasi/detail/$kdwilayah");
        } elseif ($btn == "batal") {
            return redirect()->to("/simulasi/detail/$kdwilayah");
        }
    }

    public function wilayahRange()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'simulasi' => $this->simulasiModel->getWilayah()
        ];
        return view('laporan/admin/simulasi/wilayahrange', $data);
    }

    public function range($kdwilayah)
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'kdwilayah' => $kdwilayah,
            'simulasi' => $this->simulasiModel->getTanggal($kdwilayah),
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/simulasi/range', $data);
    }

    public function lihatRange($kdwilayah)
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $wilayah = $this->simulasiModel->getWilayah($kdwilayah);
        $btn = $this->request->getVar('aksi');
        if ($btn == "lihat") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'PagesAdmin' => 'laporan',
                'simulasi' => $this->simulasiModel->getRange($kdwilayah, $awal, $akhir),
                'awal' => $awal,
                'akhir' => $akhir,
                'kdwilayah' => $kdwilayah,
                'kelurahan' => $wilayah['kelurahan'],
                'kecamatan' => $wilayah['kecamatan'],
                'kabupaten' => $wilayah['kabupaten'],
                'provinsi' => $wilayah['provinsi']
            ];
            return view('laporan/admin/simulasi/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/simulasi/wilayahrange');
        }
    }

    public function print($kdwilayah)
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $wilayah = $this->simulasiModel->getWilayah($kdwilayah);
        $btn = $this->request->getVar('aksi');
        if ($btn == "print") {
            $data = [
                'kelurahan' => $wilayah['kelurahan'],
                'kecamatan' => $wilayah['kecamatan'],
                'kabupaten' => $wilayah['kabupaten'],
                'provinsi' => $wilayah['provinsi'],
                'simulasi' => $this->simulasiModel->getRange($kdwilayah, $awal, $akhir),
                'awal' => $awal,
                'akhir' => $akhir,
                'kdwilayah' => $kdwilayah
            ];
            return view('laporan/admin/simulasi/print', $data);
        } elseif ($btn == "batal") {
            return redirect()->to("/simulasi/range/$kdwilayah");
        }
    }
}
