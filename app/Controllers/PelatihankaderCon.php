<?php

namespace App\Controllers;

use App\Models\DaftaranggotatppkkkaderModel;
use App\Models\DatapelatihankaderModel;

class PelatihankaderCon extends BaseController
{
    protected $daftarkaderModel;
    protected $datapelatihankaderModel;

    public function __construct()
    {
        $this->daftarkaderModel = new DaftaranggotatppkkkaderModel();
        $this->datapelatihankaderModel = new DatapelatihankaderModel();
    }

    public function index()
    {
        $data = [
            'tittle' => 'Pelatihan Kader',
            'PagesAdmin' => 'pendataan',
            'wilayah' => $this->daftarkaderModel->getWilayah()
        ];
        return view('laporan/admin/pelatihankader/index', $data);
    }

    public function dataPelatihan($noreg)
    {
        $pelkader = $this->daftarkaderModel->getData($noreg);
        $kdwilayah = $pelkader['kd_wilayah'];
        $wilayah = $this->daftarkaderModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Pelatihan Kader',
            'PagesAdmin' => 'pendataan',
            'pelatihan' => $this->daftarkaderModel->getData($noreg),
            'datapelatihan' => $this->datapelatihankaderModel->getPelatihan($noreg),
            'kelurahan' => $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi'],
            'noreg' => $noreg,
            'kdwilayah' => $kdwilayah
        ];
        return view('laporan/admin/pelatihankader/datapelatihan', $data);
    }

    public function detail($kdwilayah)
    {
        $wilayah = $this->daftarkaderModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Pelatihan Kader',
            'PagesAdmin' => 'pendataan',
            'kelurahan' => $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi'],
            'pelatihan' => $this->daftarkaderModel->getDaftaranggota($kdwilayah),
            'kdwilayah' => $kdwilayah
        ];
        return view('laporan/admin/pelatihankader/detail', $data);
    }

    public function createDatapelatihan($pos)
    {
        session();
        $data = [
            'tittle' => ' Data Pelatihan Kader',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'pos' => $pos
        ];
        return view('laporan/admin/pelatihankader/createdatapelatihan', $data);
    }

    public function saveDatapelatihan()
    {
        $noreg = $this->request->getVar('no_reg');
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'nama_pelatihan' => [
                    'rules' => 'required[datapelatihankader.nama_pelatihan]',
                    'errors' => [
                        'required' => 'nama pelatihan harus diisi'
                    ]
                ],
                'kriteria_kader' => [
                    'rules' => 'required[datapelatihankader.kriteria_kader]',
                    'errors' => [
                        'required' => 'Kriteria kader harus diisi'
                    ]
                ],
                'tanggal' => [
                    'rules' => 'required[datapelatihankader.tanggal]',
                    'errors' => [
                        'required' => 'Tanggal harus diisi'
                    ]
                ],
                'penyelenggara' => [
                    'rules' => 'required[datapelatihankader.penyelenggara]',
                    'errors' => [
                        'required' => 'Penyelenggara pelatihan harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to("/pelatihankader/createpelatihan/$noreg")->withInput();
            }
            $data = [
                'no_reg' => $noreg,
                'nama_pelatihan' => $this->request->getVar('nama_pelatihan'),
                'kriteria_kader' => $this->request->getVar('kriteria_kader'),
                'tanggal' => $this->request->getVar('tanggal'),
                'penyelenggara' => $this->request->getVar('penyelenggara'),
                'keterangan' => $this->request->getVar('keterangan')
            ];
            $this->datapelatihankaderModel->save($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
            return redirect()->to("/pelatihankader/datapelatihan/$noreg");
        } elseif ($btn == "batal") {
            return redirect()->to("/pelatihankader/datapelatihan/$noreg");
        }
    }

    public function deleteDatapelatihan($no)
    {
        $kd = $this->datapelatihankaderModel->getData($no);
        $noreg = $kd['no_reg'];
        $this->datapelatihankaderModel->where('no', $no)->delete();
        session()->setFlashdata('hapus', 'Data berhasil dihapus.');
        return redirect()->to("/pelatihankader/datapelatihan/$noreg");
    }

    public function editDatapelatihan($no)
    {
        $data = [
            'tittle' => 'Data Pelatihan Kader',
            'PagesAdmin' => 'pendataan',
            'validation' => \Config\Services::validation(),
            'datapelatihan' => $this->datapelatihankaderModel->getData($no)
        ];
        return view('laporan/admin/pelatihankader/editdatapelatihan', $data);
    }

    public function updateDatapelatihan($no)
    {
        $noreg = $this->request->getVar('no_reg');
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            if (!$this->validate([
                'nama_pelatihan' => [
                    'rules' => 'required[datapelatihankader.nama_pelatihan]',
                    'errors' => [
                        'required' => 'nama pelatihan harus diisi'
                    ]
                ],
                'kriteria_kader' => [
                    'rules' => 'required[datapelatihankader.kriteria_kader]',
                    'errors' => [
                        'required' => 'Kriteria kader harus diisi'
                    ]
                ],
                'tanggal' => [
                    'rules' => 'required[datapelatihankader.tanggal]',
                    'errors' => [
                        'required' => 'Tanggal harus diisi'
                    ]
                ],
                'penyelenggara' => [
                    'rules' => 'required[datapelatihankader.penyelenggara]',
                    'errors' => [
                        'required' => 'Penyelenggara pelatihan harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to("/pelatihankader/editdatapelatihan/$no")->withInput();
            }
            $data = [
                'no_reg' => $noreg,
                'nama_pelatihan' => $this->request->getVar('nama_pelatihan'),
                'kriteria_kader' => $this->request->getVar('kriteria_kader'),
                'tanggal' => $this->request->getVar('tanggal'),
                'penyelenggara' => $this->request->getVar('penyelenggara'),
                'keterangan' => $this->request->getVar('keterangan')
            ];
            $this->datapelatihankaderModel->where('no', $no)->set($data)->update();
            session()->setFlashdata('pesan', 'Data berhasil diubah.');
            return redirect()->to("/pelatihankader/datapelatihan/$noreg");
        } elseif ($btn == "batal") {
            return redirect()->to("/pelatihankader/datapelatihan/$noreg");
        }
    }

    public function wilayahRange()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'wilayah' => $this->daftarkaderModel->getWilayah()
        ];
        return view('laporan/admin/pelatihankader/wilayahrange', $data);
    }

    public function range($kdwilayah)
    {
        $wilayah = $this->daftarkaderModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'pelatihan' => $this->daftarkaderModel->getTanggal($kdwilayah),
            'kdwilayah' => $kdwilayah,
            'kelurahan' => $wilayah['kelurahan'],
            'validation' => \Config\Services::validation()
        ];
        return view('laporan/admin/pelatihankader/range', $data);
    }

    public function lihatRange($kdwilayah)
    {
        $wilayah = $this->daftarkaderModel->getWilayah($kdwilayah);
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $tahun1 = substr($awal, 0, 4);
        $tahun2 = substr($akhir, 0, 4);
        $btn = $this->request->getVar('aksi');
        if ($btn == "lihat") {
            $data = [
                'tittle' => 'Monitoring & Laporan',
                'PagesAdmin' => 'laporan',
                'pelatihan' => $this->daftarkaderModel->getRange($kdwilayah, $awal, $akhir),
                'kdwilayah' => $kdwilayah,
                'kelurahan' => $wilayah['kelurahan'],
                'kecamatan' => $wilayah['kecamatan'],
                'kabupaten' => $wilayah['kabupaten'],
                'provinsi' => $wilayah['provinsi'],
                'tahun1' => $tahun1,
                'tahun2' => $tahun2,
                'awal' => $awal,
                'akhir' => $akhir
            ];
            return view('laporan/admin/pelatihankader/lihatrange', $data);
        } elseif ($btn == "batal") {
            return redirect()->to('/pelatihankader/wilayahrange');
        }
    }

    public function detailRange($noreg)
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $pelkader = $this->daftarkaderModel->getData($noreg);
        $kdwilayah = $pelkader['kd_wilayah'];
        $wilayah = $this->daftarkaderModel->getWilayah($kdwilayah);
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan',
            'pelatihan' => $this->daftarkaderModel->getData($noreg),
            'datapelatihan' => $this->datapelatihankaderModel->getPelatihan($noreg),
            'kelurahan' => $wilayah['kelurahan'],
            'kecamatan' => $wilayah['kecamatan'],
            'kabupaten' => $wilayah['kabupaten'],
            'provinsi' => $wilayah['provinsi'],
            'noreg' => $noreg,
            'awal' => $awal,
            'akhir' => $akhir,
            'kdwilayah' => $kdwilayah
        ];
        return view('laporan/admin/pelatihankader/detailrange', $data);
    }

    public function print($noreg)
    {
        $pelkader = $this->daftarkaderModel->getData($noreg);
        $kdwilayah = $pelkader['kd_wilayah'];
        $wilayah = $this->daftarkaderModel->getWilayah($kdwilayah);
        $btn = $this->request->getVar('aksi');
        if ($btn == "print") {
            $data = [
                'pelatihan' => $this->daftarkaderModel->getData($noreg),
                'datapelatihan' => $this->datapelatihankaderModel->getPelatihan($noreg),
                'kelurahan' => $wilayah['kelurahan'],
                'kecamatan' => $wilayah['kecamatan'],
                'kabupaten' => $wilayah['kabupaten'],
                'provinsi' => $wilayah['provinsi'],
                'noreg' => $noreg,
                'kdwilayah' => $kdwilayah
            ];
            return view('laporan/admin/pelatihankader/print', $data);
        } elseif ($btn == "batal") {
            return redirect()->to("/pelatihankader/range/$kdwilayah");
        }
    }
}
